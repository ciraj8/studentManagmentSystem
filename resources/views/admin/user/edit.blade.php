@extends('admin.layout.master')

@section('content')

    @include('admin.includes.sidebar')

    <div class="page-wrapper" style="background-image: url('{{asset('admin-panel/assets/images/background/bg1.jpg')}}');background-repeat: no-repeat; background-attachment:fixed;">
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
                    <h4 class="page-title text-white">Update</h4>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7">
                    <div class="card"  style="background:black ; color:white">
                        <form action="{{route('user.update',$user->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            {{--@method('PUT')--}}
                            <div class="card-body">
                                
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Username</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="username" class="form-control" id="username" value="{{$user->username}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Photo Upload</label>
                                    <div class="col-md-9">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" value="{{$user->image}}">
                                            <label class="custom-file-label">{{$user->image}}</label>
                                            {{--<div class="invalid-feedback">Example invalid custom file feedback</div>--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">First name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="fname" class="form-control" id="fname" value="{{$user->first_name}}" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Last name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="lname" class="form-control" id="lname" value="{{$user->last_name}}">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Role</label>
                                    <div class="col-sm-9">
                                        {{--<select type="text" name="role" class="form-control" id="lname" value="{{$user->role}}">--}}
                                       
                                        <select type="text" name="role" class="form-control" id="lname">
                                           
                                            <option>{{$user->role}}</option>
                                            @if(Auth::user()->role == 'admin')
                                            <option>admin</option>
                                            @endif
                                            <option>student</option>
                                        </select>
                                        
                                    </div>
                                </div>
                                

                               

                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="email" class="form-control" id="lname" value="{{$user->email}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone" class="col-sm-3 text-right control-label col-form-label">Phone number</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="phone" class="form-control" id="phone" value="{{$user->phone}}">
                                    </div>
                                </div>
                                @can('isStudent')
                                <div class="form-group row">
                                    <label for="course" class="col-sm-3 text-right control-label col-form-label">course </label>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="course_name">
                                    <option>choose course</option>
                                    @foreach($courses as $course)
                                    
                                    <option value="{{$course->course_name}}">{{$course->course_name}}</option>
                                    @endforeach
                                    </select>
                                        <!-- <input type="number" name="phone" class="form-control" id="phone" value="{{$user->phone}}"> -->
                                    </div>
                                </div>
                                @endcan
                                @can('isStudent')
                                <div class="form-group row">
                                    <label for="campus" class="col-sm-3 text-right control-label col-form-label">campus </label>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="campus_name">
                                    <option>choose campus</option>
                                    @foreach($campuses as $campus)
                                    
                                    <option value="{{$campus->campus_name}}">{{$campus->campus_name}}</option>
                                    @endforeach
                                    </select>
                                        <!-- <input type="number" name="phone" class="form-control" id="phone" value="{{$user->phone}}"> -->
                                    </div>
                                </div>
                                @endcan
                                <div class="form-group row">
                                    <label for="address" class="col-sm-3 text-right control-label col-form-label">Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="address" class="form-control" id="address" value="{{$user->address}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="gender" class="col-sm-3 text-right control-label col-form-label">Gender</label>
                                    <div class="col-sm-9">
                                        <select type="text" name="gender" class="form-control" id="gender" value="{{$user->gender}}">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Date of Birth</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="dob" class="form-control" id="dob" value="{{$user->dob}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="joindate" class="col-sm-3 text-right control-label col-form-label">Join date</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="join_date" class="form-control" id="join_date" value="{{$user->join_date}}">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="city" class="col-sm-3 text-right control-label col-form-label">City</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="city" class="form-control" id="city" value="{{$user->city}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="age" class="col-sm-3 text-right control-label col-form-label">Age</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="age" class="form-control" id="lname" value="{{$user->age}}">
                                    </div>
                                </div>

                               

                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-danger btn-block">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
       
    </div>

@endsection