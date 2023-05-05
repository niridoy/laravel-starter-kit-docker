<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use Toastr;

class ItemController extends Controller
{
    public function index()
    {
        $slots = Item::get();

        return view('item.index',[
            'slots' => $slots
        ]);
    }

    public function create()
    {
        return view('item.create',[
            'projects' => Item::isActive()->select('id','name','code')->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required','unique:slots,code',
            'project_id' => 'required',
            'is_active' => 'required'
        ]);
        try {
            $data = $request->all();
            $data['created_user_id'] = auth()->id();
            Slot::create($data);
            Toastr::success('Slot has been created successfully!', 'Success', ["positionClass" => "toast-top-right"]);
        } catch (\Throwable $th) {
            Toastr::error('Something wrong, please contact with admin!', 'Error', ["positionClass" => "toast-top-right"]);
        }
        return redirect()->back();
    }

    public function edit(Slot $slot)
    {
        return view('item.edit',[
            'slot' => $slot,
            'projects' => Project::isActive()->select('id','name','code')->get()
        ]);
    }

    public function update(Request $request, Slot $slot)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required','unique:slots,code,' . $slot->id ,
            'project_id' => 'required',
            'is_active' => 'required'
        ]);
        try {
            $slot->update($request->all());
            Toastr::success('Slot has been updated successfully!', 'Success', ["positionClass" => "toast-top-right"]);
        } catch (\Throwable $th) {
            Toastr::error('Something wrong, please contact with admin!', 'Error', ["positionClass" => "toast-top-right"]);
        }
        return redirect()->back();
    }

    public function destroy(Slot $slot)
    {
        try {
            $slot->delete();
            Toastr::success('Slot has been deleted successfully!', 'Success', ["positionClass" => "toast-top-right"]);
        } catch (\Throwable $th) {
            DB::rollBack();
            Toastr::error('Something wrong, please contact with admin!', 'Error', ["positionClass" => "toast-top-right"]);
        }
        return redirect()->back();
    }
}
