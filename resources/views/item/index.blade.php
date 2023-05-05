@extends('layouts.master')

@push('styles')
    <link href="{{asset('js/DataTables/datatables.min.css')}}" rel="stylesheet" />
@endpush

@section('content')


<div class="page-heading row">
        <div class="col-md-6">  <h1 class="page-title">Item</h1></div>
        <div class="col-md-6"><a class="btn btn-info float-right mt-4" href="{{ route('items.create') }}" > <i class="fa fa-plus"></i> Create</a></div>
</div>

<div class="page-content pt-2 fade-in-up">
    <div class="row">
        <div class="col-md-12">

            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">List</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td >
                                        <img src="{{ asset('storage/' . $item->image)  }}" style="max-width:60px!important" alt="">
                                    </td>
                                    <td >{{ $item->name  }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('items.edit', $item->id)}}" class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil font-14"></i></a>
                                        <form action="{{ route('items.destroy',$item->id) }}" method="post" class="d-inline-block" onsubmit="return confirm('Do you really want to delete ?');" >
                                            <button class="btn btn-default btn-xs" data-toggle="tooltip" type="submit" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>
                                            <input type="hidden" name="_method" value="delete" />
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@push('scripts')
<script src="{{asset('js\DataTables\datatables.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
        $('#table').DataTable({
            pageLength: 10,
            //"ajax": './assets/demo/data/table_data.json',
            /*"columns": [
                { "data": "name" },
                { "data": "office" },
                { "data": "extn" },
                { "data": "start_date" },
                { "data": "salary" }
            ]*/
        });
    })
</script>
@endpush
