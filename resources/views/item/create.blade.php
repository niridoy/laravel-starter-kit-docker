@extends('layouts.master')

@section('title', 'Bondstein || Slot Create')

@push('styles')

@endpush

@section('content')

<div class="page-heading row">
    <div class="col-md-6">  <h1 class="page-title">Item</h1></div>
    <div class="col-md-6"><a class="btn btn-default float-right mt-4" href="{{ route('items.index') }}" > <i class="fa fa-arrow-left"></i> Back</a></div>
</div>

<div class="page-content pt-2 fade-in-up">
    <div class="row">
        <div class="col-md-12">

            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Create</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                    <form class="form-horizontal" action="{{ route('items.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                        <div class="row">

                            @include('.layouts.ui.input',[
                                'type' => 'text',
                                'name' => 'name',
                                'lebel' => 'Name',
                                'is_required' => true,
                                'value' => null,
                                'placeholder' =>'Enter Name',
                                'colsize' => 6
                            ])

                            <div class="form-group col-md-6 row @error('image') has-error @enderror ">
                                <label class="col-sm-4 col-form-label">Image <span class="text-danger">*</span> </label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="file" name="image" placeholder="image" autocomplete="off">
                                    @error('image')
                                        <span class="help-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="form-group row justify-content-md-center">
                            <div class="col-sm-2">
                                <button class="btn btn-info btn-block pointer" type="submit">Create</button>
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
