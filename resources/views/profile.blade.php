@extends('layouts.master')

@push('styles')

@endpush

@section('content')

<div class="page-heading">
    <h1 class="page-title">Profile</h1>
</div>

<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-md-12">

            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Update</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                    <form class="form-horizontal" action="{{ route('user.profile.update') }}" method="POST">
                            @csrf
                            @method('POST')
                        <div class="row">
                            @include('.layouts.ui.input',[
                                'type' => 'text',
                                'name' => 'name',
                                'lebel' => 'Name',
                                'is_required' => true,
                                'value' => Auth::user()->name,
                                'placeholder' =>'Enter Name',
                                'colsize' => 6
                            ])

                            @include('.layouts.ui.input',[
                                'type' => 'text',
                                'name' => 'email',
                                'lebel' => 'Email',
                                'is_required' => true,
                                'value' => Auth::user()->email,
                                'placeholder' =>'Enter Email',
                                'colsize' => 6
                            ])

                           @include('.layouts.ui.input',[
                                'type' => 'text',
                                'name' => 'phone',
                                'lebel' => 'Mobile',
                                'is_required' => true,
                                'value' => Auth::user()->phone,
                                'placeholder' =>'Enter Mobile',
                                'colsize' => 6
                            ])

                            @include('.layouts.ui.input',[
                                'type' => 'text',
                                'name' => 'address',
                                'lebel' => 'Address',
                                'is_required' => false,
                                'value' => Auth::user()->address,
                                'placeholder' =>'Enter Address',
                                'colsize' => 6
                            ])

                            @include('.layouts.ui.input',[
                                'type' => 'text',
                                'name' => 'password',
                                'lebel' => 'Password',
                                'is_required' => false,
                                'value' =>"",
                                'placeholder' =>'Enter Password',
                                'colsize' => 6
                            ])

                            @include('.layouts.ui.input',[
                                'type' => 'text',
                                'name' => 'password_confirmation',
                                'lebel' => 'Password Confirmation',
                                'is_required' => false,
                                'value' =>"",
                                'placeholder' =>'Confirm Password',
                                'colsize' => 6
                            ])


                        </div>

                        <div class="form-group row justify-content-md-center">
                            <div class="col-sm-2">
                                <button class="btn btn-warning btn-block pointer" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@push('scripts')
@endpush
