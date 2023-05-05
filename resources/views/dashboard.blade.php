@extends('layouts.master')

@section('content')
    <div class="page-content fade-in-up">
        <div class="row">
            {{-- <div class="col-lg-8">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Slot List & Current Status</div>
                    </div>
                    <div class="ibox-body">                        <div class="row">
                            @foreach ($slots as $slot)
                                @if ($slot->status)
                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                        <div class="ibox bg-danger color-white widget-stat">
                                            <div class="ibox-body">
                                                <h2 class="m-b-5 font-strong">OCCUPIED</h2>
                                                <div class="m-b-5">{{ $slot->code }} | {{ $slot->name }} </div><i class="fa fa-minus widget-stat-icon"></i>
                                                <div>{{ showDateTime($slot->changed_at) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                        <div class="ibox bg-success color-white widget-stat">
                                            <div class="ibox-body">
                                                <h2 class="m-b-5 font-strong">VACANT</h2>
                                                <div class="m-b-5">{{ $slot->code }} | {{ $slot->name }} </div><i class="fa fa-check widget-stat-icon"></i>
                                                <div>{{ showDateTime($slot->changed_at) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Vehicle In/Out Log</div>
                    </div>
                    <div class="ibox-body">
                        <ul class="media-list media-list-divider m-0">
                            @foreach ($vehicle_logs as $vehicle_log)
                                <li class="media">
                                    <a class="media-img" href="javascript:;">
                                        <img src="./assets/img/image.jpg" width="50px;">
                                    </a>
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <a href="javascript:;">{{$vehicle_log->reg_number}}</a>
                                            <span class="font-16 float-right">{{$vehicle_log->status ? 'In' : 'Out'}}</span>
                                        </div>
                                        <div class="font-13">{{showDateTime($vehicle_log->time)}}</div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="ibox-footer text-center">
                        <a href="{{route('vehicle-logs.index')}}">View All</a>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
    </script>
@endpush

