@extends('admin.layout.master')

@section('content')

    <div id="main-wrapper">

        @include('admin.includes.sidebar')

        <div class="page-wrapper "style="background-image: url('{{asset('admin-panel/assets/images/background/bg2.jpg')}}');background-repeat: no-repeat; background-attachment:fixed;">

        <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left ml-2">
                <h3 class="text-white">Chat with admin</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-outline-warning float-right mr-0 mb-0" href="{{ route('message.create') }}" style="position:fixed;right:0;box-shadow:3px 3px black;"> <i class="fas fa-envelope"></i> new Message </a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
   
        @if(!Auth::guest())
       
        @foreach ($messages as $message)
        <div class="col-md-10 offset-1 mt-5">
        @if($message->user->role == 'admin')
        <div class="col-md-6" style="margin-left:500px;">
        @else
        <div class="col-md-6 " style="margin-left:50px;">
        @endif
       
          
       <div class="card" style="border-radius:15px;box-shadow: 9px 10px 19px -1px rgba(72,92,90,1);">
       @if($message->user->role == 'admin')
           <div class="card-header bg-warning text-white" style="border-top-left-radius:15px;border-top-right-radius:15px;"><img src="/uploads/gallery/{{$message->user->image,$message->id}}" alt="user" class="rounded-circle" width="25">
        @else
        <div class="card-header bg-info text-white" style="border-top-left-radius:15px;border-top-right-radius:15px;"><img src="/uploads/gallery/{{$message->user->image,$message->id}}" alt="user" class="rounded-circle" width="25">
        @endif

           @if($message->user->role == 'admin')
           <strong style="text-shadow: 1px 1px white;color:black">{{$message->user->username}}-(Admin)</strong>
           @else
           <strong  style="text-shadow: 1px 1px white;color:black" >{{$message->user->username}}-(Student)</strong>
           @endif
           </div>
           <div class="card-body">
               <blockquote class="blockquote mb-0">
               <p style="font-size:15px;" class="text-justify">{{ $message->message}}</p>
               <footer class="blockquote-footer float-right"><cite>{{ $message->created_at->diffForHumans() }}</cite></footer>
               </blockquote>
           </div>
       </div>
       </div>
       </div>
        @endforeach
       
        @endif
   

        </div>

    </div>

    @endsection