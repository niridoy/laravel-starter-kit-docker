<?php

namespace App\Services;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    public function store($location, $image, $previous_path = null)
    {
        if($previous_path) {
            if(Storage::exists($location . "/" . $previous_path)) Storage::delete($location . "/" . $previous_path);
        }

        if (File::exists($image)) {
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->resize(120, 120, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->stream(); // <-- Key point

            Storage::disk('local')->put( $location . '/'. $fileName, $img, 'public');
        } else {
            $fileName = 'default.png';
        }

        return $fileName;
    }

    public function delete($path)
    {
        if(Storage::exists($path)) Storage::delete($path);
    }
}
