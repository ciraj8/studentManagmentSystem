@extends('admin.layout.master')

@section('content')

    <div id="main-wrapper">

        @include('admin.includes.sidebar')

        <div class="page-wrapper ">

        <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left ml-2">
                <h4>Uploaded Document list</h4>
            </div>
            <div class="pull-right">
                <a class="btn btn-outline-success float-right mr-2 mb-2" href="{{ route('documents.create') }}"  style="box-shadow:1px 1px black;"> <i class="fas fa-file"></i> Upload Document </a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-striped ml-2" style="box-shadow:1px 1px black;">
        <tr class="bg-dark text-white">
            <th>No</th>
            <th>User name</th>
            <th>Document name</th>
            <th>Document </th>
            <th>Date</th>
            <th width="280px">Action</th>
        </tr>
       
        @foreach ($admindocs as $admindoc)
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{$admindoc->user->username}}</td>
            <td>{{ $admindoc->document_type }}</td>
            <td><a href="{{ asset('uploads/gallery/' . $admindoc->document) }}"><i class="fas fa-download"></i></a> </td>
           
            <td>{{ $admindoc->created_at }}</td>
            
            <td>
                <form action="{{ route('documents.delete',$admindoc->id) }}" method="POST">
   
                    <!-- <a class="btn btn-primary btn-sm" href="{{ route('documents.edit',$admindoc->id) }}"><i class="fas fa-edit"></i></a> -->
   
                    @csrf
                    @method('GET')
      
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

        </div>
        </div>
    </div>

    @endsection