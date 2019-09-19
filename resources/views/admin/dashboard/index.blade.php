@extends('admin.layout.master')

@section('content')

    <div class="page-wrapper">

        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Dashboard</h4>
                    <div class="ml-auto text-right">
                       
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">

            <div class="row">
                <!-- Column -->
                <div class="col-md-6 col-lg-4 col-xlg-3" >
                    <div class="card card-hover" style=" box-shadow: 2px 3px 9px 1px #888888;">
                        <div class="box bg-success text-center">
                            <h1 class="font-light text-white"><i class="fas fa-users"></i></h1>
                            <h5 class="m-b-0 m-t-5 text-white">{{ $users->total() }}</h5>
                            <h6 class="text-white">Number of Students</h6>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <div class="card card-hover" style=" box-shadow: 2px 3px 9px 1px #888888;">
                        <div class="box bg-warning text-center">
                            <h1 class="font-light text-white"><i class="fas fa-university"></i></h1>
                            <h5 class="m-b-0 m-t-5 text-white">{{ $courses->count() }}</h5>
                            <h6 class="text-white">Number of Courses</h6>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <div class="card card-hover" style=" box-shadow: 2px 3px 9px 1px #888888;">
                        <div class="box bg-danger text-center">
                            <h1 class="font-light text-white"><i class="fas fa-graduation-cap"></i></h1>
                            <h5 class="m-b-0 m-t-5 text-white">{{$campuses->count()}}</h5>
                            <h6 class="text-white">Number of Campus</h6>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <div class="card card-hover" style=" box-shadow: 2px 3px 9px 1px #888888;">
                        <div class="box bg-cyan text-center">
                            <h1 class="font-light text-white"><i class="fas fa-file"></i></h1>
                            <h5 class="m-b-0 m-t-5 text-white">{{ $documents->count() }}</h5>
                            <h6 class="text-white">Documents</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-md-flex align-items-center">
                            <div class="panel-body">
                                {!! $chart->html() !!}
                            </div>
                            </div>
                            <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card-body b-l calender-sidebar">
                                            <div id="calendar"></div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
    {!! Charts::scripts() !!}
    {!! $chart->script() !!}
@endsection

@section('js')

    <script src="{{asset('admin-panel/assets/libs/flot/excanvas.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/flot/jquery.flot.time.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/flot/jquery.flot.crosshair.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('admin-panel/dist/js/pages/chart/chart-page-init.js')}}"></script>

    <script src="{{asset('admin-panel/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('admin-panel/dist/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin-panel/dist/js/custom.min.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('admin-panel/assets/libs/fullcalendar/dist/fullcalendar.min.js')}}"></script>
    <script src="{{asset('admin-panel/dist/js/pages/calendar/cal-init.js')}}"></script>

    @endsection
