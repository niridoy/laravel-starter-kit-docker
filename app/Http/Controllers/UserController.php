<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use Toastr;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.user.list',[
            'users' => User::latest()->get()
        ]);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(StoreUserRequest $request)
    {
        try {
            User::create(array_merge($request->validated(),[
                'password' => Hash::make($request->password)
            ]));
            Toastr::success('User has benn created successfully!', 'Success', ["positionClass" => "toast-top-right"]);
        } catch (\Throwable $th) { DB::rollBack();dd($th);
            Toastr::error('Something wrong, please contact with admin!', 'Error', ["positionClass" => "toast-top-right"]);
        }
        return redirect()->back();
    }

    public function edit(User $user)
    {
        return view('admin.user.edit',[
            'user' => $user
        ]);
    }


    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            if($request->has('password') && $request['password']){
                $data = array_merge($request->validated(),[
                    'password' => Hash::make($request['password'])
                ]);
            }else{
                $data = $request->validated();
                unset($data['password']);
            }
            $user->update($data);
            Toastr::success('User has been updated successfully!', 'Success', ["positionClass" => "toast-top-right"]);
        } catch (\Throwable $th) { dd($th);
            Toastr::error('Something wrong, please contact with admin!', 'Error', ["positionClass" => "toast-top-right"]);
        }
        return redirect()->back();
    }

    public function destroy(User $user)
    {
        if($user->id == 1) abort(403);
        try {
            $user->delete();
            Toastr::success('User has been deleted successfully!', 'Success', ["positionClass" => "toast-top-right"]);
        } catch (\Throwable $th) {
            Toastr::error('Something wrong, please contact with admin!', 'Error', ["positionClass" => "toast-top-right"]);
        }
        return redirect()->back();
    }
}
