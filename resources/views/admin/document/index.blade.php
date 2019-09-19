@extends('admin.layout.master')

@section('content')

    <div id="main-wrapper">

        @include('admin.includes.sidebar')

        <div class="page-wrapper ">

        <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left ml-2">
                <h2>Uploaed Document list</h2>
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
   
    <table class="table table-striped ml-2"  style="box-shadow:1px 1px black;">
        <tr class="bg-dark text-white">
            <th>No</th>
            <th>User name</th>
            <th>Document name</th>
            <th>Document </th>
            <th>Date</th>
            <th width="280px">Action</th>
        </tr>
        @if(!Auth::guest())
       
        @foreach ($docs as $doc)
        @if(Auth::user()->id == $doc->user_id)
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{$doc->user->username}}</td>
            <td>{{ $doc->document_type }}</td>
            <td><a href="{{ asset('uploads/gallery/' . $doc->document) }}"><i class="fas fa-download"></i></a> </td>
           
            <td>{{ $doc->created_at }}</td>
            
            <td>
                <form action="{{ route('documents.delete',$doc->id) }}" method="POST">
   
                  
   
                    @csrf
                    @method('GET')
      
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endif
        @endforeach
       
        @endif
    </table>
  
   {{-- {!! $docs->links() !!}--}}
        </div>
        </div>
    </div>

    @endsection