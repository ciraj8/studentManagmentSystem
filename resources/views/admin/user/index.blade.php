@extends('admin.layout.master')

@section('content')

    <div id="main-wrapper">

        @include('admin.includes.sidebar')

        <div class="page-wrapper">

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
                    <div class="col-md-12">
                        <div class="card" style="box-shadow:1px 1px black;border-radius:15px;">
                            <form action="{{route('user.search')}}" method="GET" class="form-horizontal">
                                <div class="card-body">
                                    <h4 class="card-title">Search</h4>
                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <input type="text" name="search" class="form-control" id="fname" placeholder="Enter student name" style="border-radius:20px;">

                                        </div>
                                        <div class="col-sm-3">
                                        <button type="submit" class="btn btn-success">Search</button>
                                        <a href="{{route('user')}}" class="btn btn-md btn-danger">Clear</a>
                                        </div>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-12">
                        <div class="card"  style="box-shadow:1px 1px black;border-radius:1px;">
                            
                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped ">
                                <thead class="bg-dark text-white">
                                <tr>
                                    <th>S.N</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>phone</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <th>{{$loop->index+1}}</th>
                                        <td>{{$user->username}}</td>
                                        <td><img src="{{ asset('uploads/gallery/' . $user->image) }}" width="80px" height="80px" alt="Image"  class="rounded-circle"> </td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->email}}</td>
                                        
                                        <td>
                                            <button type="button"
                                                    username="{{$user->username}}"
                                                    role="{{$user->role}}"
                                                    email="{{$user->email}}"
                                                    salary="{{$user->salary}}"
                                                    phone="{{$user->phone}}"
                                                    address="{{$user->address}}"
                                                    gender="{{$user->gender}}"
                                                    dob="{{$user->dob}}"
                                                    join_date="{{$user->join_date}}"
                                                    job_type="{{$user->job_type}}"
                                                    city="{{$user->city}}"
                                                    age="{{$user->age}}"
                                                    class="view-data btn btn-sm btn-success float-left mr-1"> <i class="fas fa-eye"></i></button>
                                            <a href="{{route('user.edit',$user->id)}}" class="btn btn-sm btn-primary float-left mr-1"> <i class="fas fa-edit"></i></a>
                                           
                                            <form id="delete-form-{{ $user->id }}" action="{{route('user.delete',$user->id)}}" method="put">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="deletePost({{ $user->id }})" class="btn btn-sm btn-danger float-left"> <i class="fas fa-trash"></i></button>
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

                <script>
                    $('.view-data').click(function(){
                        var username=$(this).attr('username');
                        
                        var email=$(this).attr('email');
                       
                        var phone=$(this).attr('phone');
                        var address=$(this).attr('address');
                        var gender=$(this).attr('gender');
                        var dob=$(this).attr('dob');
                        var join_date=$(this).attr('join_date');
                        
                        var city=$(this).attr('city');
                        var age=$(this).attr('age');
                        $('#username').text(username);
                       
                        $('#email').text(email);
                       
                        $('#phone').text(phone);
                        $('#address').text(address);
                        $('#gender').text(gender);
                        $('#dob').text(dob);
                        $('#join_date').text(join_date);
                      
                        $('#city').text(city);
                        $('#age').text(age);
                        $('#show-data').modal();
                    })
                </script>

                {{--sweetalert box for deleting start--}}
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.8/dist/sweetalert2.all.min.js"></script>

                <script type="text/javascript">
                    function deletePost(id)

                    {
                        const swalWithBootstrapButtons = swal.mixin({
                            confirmButtonClass: 'btn btn-success',
                            cancelButtonClass: 'btn btn-danger',
                            buttonsStyling: false,
                        })

                        swalWithBootstrapButtons({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Yes, delete it!',
                            cancelButtonText: 'No, cancel!',
                            reverseButtons: true
                        }).then((result) => {
                            if (result.value) {
                                event.preventDefault();
                                document.getElementById('delete-form-'+id).submit();
                            } else if (
                                // Read more about handling dismissals
                                result.dismiss === swal.DismissReason.cancel
                            ) {
                                swalWithBootstrapButtons(
                                    'Cancelled',
                                    'Your file is safe :)',
                                    'error'
                                )
                            }
                        })
                    }

                </script>
                {{--sweetalert box for deleting end--}}

                <div id="show-data" class="modal fade" id="view-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Details of the Student</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="background:#B6F3F7;">
                                <p><b>Name:</b>  <span id="username"></span></p>
                               
                                <p><b>Email:</b>  <span  id="email"></span></p>
                               
                                <p><b>Phone:</b> <span  id="phone"></span></p>
                                <p><b>Address:</b>  <span  id="address"></span></p>
                                <p><b>Gender:</b>  <span  id="gender"></span></p>
                                <p><b>Date Of Birth:</b>  <span  id="dob"></span></p>
                                <p><b>Date Of Join:</b>  <span  id="join_date"></span></p>
                               
                                <p><b>City:</b>  <span  id="city"></span></p>
                                <p><b>Age:</b>  <span  id="age"></span></p>
                            </div>
                        </div>
                    </div>
                </div>

                {{--@section('js')--}}
                    {{--@endsection--}}

        </div>
        </div>
    </div>

    @endsection