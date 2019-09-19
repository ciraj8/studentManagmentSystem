@extends('admin.layout.master')

@section('content')

    @include('admin.includes.sidebar')

    <div class="page-wrapper">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif

        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <div class="ml-auto text-right">
                       
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <form action="{{route('campuses.store')}}" method="post" class="form-horizontal"">
                            @csrf
                            <div class="card-body">
                                <h4 class="card-title">Add Campus</h4>
                                <div class="form-group row">
                                    <label for="collge_name" class="col-sm-3 text-right control-label col-form-label">Campus name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="campus_name" class="form-control" id="campus_name" placeholder="Enter a campud name">
                                    </div>
                                </div>
                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @endsection