@extends('layouts.master')

@section('title', 'Bondstein || Slot Create')

@push('styles')

@endpush

@section('content')

<div class="page-heading row">
    <div class="col-md-6">  <h1 class="page-title">Slot</h1></div>
    <div class="col-md-6"><a class="btn btn-default float-right mt-4" href="{{ route('slots.index') }}" > <i class="fa fa-arrow-left"></i> Back</a></div>
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
                    <form class="form-horizontal" action="{{ route('slots.store') }}" method="POST">
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

                            @include('.layouts.ui.input',[
                                'type' => 'text',
                                'name' => 'code',
                                'lebel' => 'Code',
                                'is_required' => true,
                                'value' => null,
                                'placeholder' =>'Enter Code',
                                'colsize' => 6
                            ])

                            <div class="form-group col-md-6 row">
                                <label class="col-sm-4 col-form-label">Project</label>
                                <div class="col-sm-8">
                                    <select name="project_id" class="form-control select_item_list" id="terminalId">
                                        <option value="">Select one</option>
                                        @foreach ($projects as $project)
                                            <option value="{{ $project->id }}"  {{ $project->id == old('project_id') ? 'selected' : '' }} >{{ $project->name }} ({{ $project->code }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            @include('.layouts.ui.radio', [
                                'type' => 'text',
                                'name' => 'is_active',
                                'lebel' => 'Is Active',
                                'is_required' => true,
                                'options' => ['Active', 'Inactive'],
                                'values' => [1, 0],
                                'selected_value' => 1,
                                'colsize' => 6
                            ])

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
