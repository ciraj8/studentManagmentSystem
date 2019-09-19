@extends('admin.layout.master')

@section('content')

    <div id="main-wrapper">

        @include('admin.includes.sidebar')

        <div class="page-wrapper">

        <div class="card uper">
  <div class="card-header">
    Edit Courses
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{route('campuses.update',$campus->id)}}">
          <div class="form-group">
              @csrf
              @method('POST')
              <label for="name">Campus name:</label>
              <input type="text" class="form-control" name="campus_name" value="{{$campus->campus_name}}"/>
          </div>
          
          <button type="submit" class="btn btn-primary">Update Campus</button>
      </form>
  </div>
</div>
    </div>

    @endsection









    