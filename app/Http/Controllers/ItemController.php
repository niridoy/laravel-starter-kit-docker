<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use App\Services\ImageService;
use Toastr;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ItemController extends Controller
{
    public function index()
    {
        return view('item.index',[
            'items' => Item::get()
        ]);
    }

    public function create()
    {
        return view('item.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
        ]);

        try {
            $fileName = (new ImageService)->store('public/images/items', $request->image);
            Item::create([
                'name' => $request['name'],
                'image' => $fileName
            ]);
            Toastr::success('Item has been created successfully!', 'Success', ["positionClass" => "toast-top-right"]);
        } catch (\Throwable $th) { //dd($th);
            Toastr::error('Something wrong, please contact with admin!', 'Error', ["positionClass" => "toast-top-right"]);
        }
        return redirect()->back();
    }

    public function edit(Item $item)
    {
        return view('item.edit',[
            'item' => $item
        ]);
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|nullable|max:10000'
        ]);

        try {
            $item->name = $request->name;
            if ($request->has('image')) $item->image = (new ImageService)->store('public/images/items', $request->image, $item->image);
            $item->save();
            Toastr::success('Item has been updated successfully!', 'Success', ["positionClass" => "toast-top-right"]);
        } catch (\Throwable $th) {
            Toastr::error('Something wrong, please contact with admin!', 'Error', ["positionClass" => "toast-top-right"]);
        }
        return redirect()->back();
    }

    public function destroy(Item $item)
    {
        try {
            (new ImageService)->delete('images/items/' . $item->image);
            $item->delete();
            Toastr::success('Item has been deleted successfully!', 'Success', ["positionClass" => "toast-top-right"]);
        } catch (\Throwable $th) {
            DB::rollBack();
            Toastr::error('Something wrong, please contact with admin!', 'Error', ["positionClass" => "toast-top-right"]);
        }
        return redirect()->back();
    }
}
