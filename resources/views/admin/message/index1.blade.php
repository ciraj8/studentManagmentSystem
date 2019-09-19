@extends('admin.layout.master')

@section('content')

    <div id="main-wrapper">

        @include('admin.includes.sidebar')

        <div class="page-wrapper ">

        <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left ml-2">
                <h2>Messages list</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success float-right mr-2 mb-2" href="{{ route('message.create') }}"> <i class="fas fa-envelope"></i> New Message</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
  
       
        @foreach ($adminmessages as $adminmessage)
       
        <div class="col-md-10 offset-1">
        @if($adminmessage->user->role == 'admin')
        <div class="col-md-6" style="margin-left:500px;">
        @else
        <div class="col-md-6 " style="margin-left:50px;">
        @endif
       
          
            <div class="card ">
                 @if($adminmessage->user->role == 'admin')
                    <div class="card-header bg-danger text-white">
                @else
                    <div class="card-header bg-info text-white">
                @endif
                @if($adminmessage->user->role == 'admin')
                <strong>From :{{$adminmessage->user->username}}-(Admin)</strong>
                @else
                <strong>From :{{$adminmessage->user->username}}-(Student)</strong>
                @endif
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                    <p style="font-size:15px;">{{ $adminmessage->message}}</p>
                    <footer class="blockquote-footer float-right"><cite>{{ $adminmessage->created_at->diffForHumans() }}</cite></footer>
                    </blockquote>
                </div>
            </div>
            </div>
        @endforeach

       </div>
        </div>
        </div>
    </div>

    @endsection