@extends('admin.layout.master')

@section('content')

    <div id="main-wrapper">
    @include('admin.includes.sidebar')
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h5 class="page-title ml-5">My profile</h5>
                        
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-5">
                        <div class="box box-success">
                            <div class="panel">

                                <div class="panel-heading">
                                    <span class="panel-title"></span>
                                </div>
                                <div class="panel-body pn pb5">
                                    <hr class="short br-lighter">


                                    <div class="box-body no-padding">

                                        <table class="table table-hover">
                                            <tbody>
                                            {{--@foreach($users as $user)--}}
                                            <tr>
                                                <td></td>
                                                <td ><img class="rounded-circle"  src="{{ asset('uploads/gallery/' . $user->image) }}"  width="80px" height="80px" alt="Image"> </td>
                                            </tr>

                                                <tr>
                                                    <td style="width: 10px" class="text-center"><i class="fa fa-user"></i>
                                                    </td>
                                                    <td><strong>Username</strong></td>
                                                    <td>{{$user->username}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 10px" class="text-center"><i class="fa fa-birthday-cake"></i>
                                                    </td>
                                                    <td><strong>Birthday</strong></td>
                                                    <td>{{$user->dob}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 10px" class="text-center"><i class="fa fa-genderless"></i>
                                                    </td>
                                                    <td><strong>Gender</strong></td>
                                                    <td>{{$user->gender}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 10px" class="text-center"><i class="fa fa-mobile-alt"></i>
                                                    </td>
                                                    <td><strong>Phone number</strong></td>
                                                    <td>{{$user->phone}}</td>
                                                </tr>
                                                
                                                <tr>
                                                    <td style="width: 10px" class="text-center"><i class="fa fa-at"></i>
                                                    </td>
                                                    <td><strong>Email</strong></td>
                                                    <td>{{$user->email}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 10px" class="text-center"><i class="fa fa-calendar-times"></i>
                                                    </td>
                                                    <td><strong>Join date</strong></td>
                                                    <td>{{$user->join_date}}</td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 10px" class="text-center"><i class="fa fa-map-marker"></i>
                                                    </td>
                                                    <td><strong>Address</strong></td>
                                                    <td>{{$user->address}}</td>
                                                </tr>
                                                @can('isStudent')
                                                <tr>
                                                    <td style="width: 10px" class="text-center"><i class="fas  fa-graduation-cap"></i>
                                                    </td>
                                                    <td><strong>Course</strong></td>
                                                    <td>{{$user->course_name}}</td>
                                                </tr>
                                                @endcan
                                                @can('isStudent')
                                                <tr>
                                                    <td style="width: 10px" class="text-center"><i class="fas  fa-university"></i>
                                                    </td>
                                                    <td><strong>Campus</strong></td>
                                                    <td>{{$user->campus_name}}</td>
                                                </tr>
                                                @endcan
                                            {{--@endforeach--}}
                                            </tbody>
                                        </table>
                                        {{--{{ $users->links() }}--}}
                                        <a  class="btn btn-outline-primary ml-5" href="{{route('user.edit',$user->id)}}"  style="box-shadow:1px 1px black;">Update Profile</a>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                
                    <div class="col-md-6">
                    <div class="box box-success">
                        <div class="panel">
                        <img src="{{asset('admin-panel/assets/images/profile.png')}}"  width="600" height="550" class="rounded-circle" alt="user">
                            
                        </div>
                       
                    </div>
                    </div>

                </div>
            </div>
            

        </div>
    </div>
    
@endsection