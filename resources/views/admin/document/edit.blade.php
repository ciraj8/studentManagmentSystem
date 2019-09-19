@extends('admin.layout.master')

@section('content')

    <div id="main-wrapper">

        @include('admin.includes.sidebar')

        <div class="page-wrapper">

        <div class="card uper">
  <div class="card-header">
    Edit Document
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
      <form method="post" action="{{route('documents.update',$document->id)}}">
          <div class="form-group">
              @csrf
              @method('POST')
              <label for="name">Document name:</label>
              <input type="text" class="form-control" name="document_type" value="{{$document->document_type}}"/>
          </div>
          <div class="form-group row">
               
                        <div class="col-sm-9">
                            <input type="file" name="document" class="form-control" id="document">
                        </div>
           </div>
          
          <button type="submit" class="btn btn-primary">Update Document</button>
      </form>
  </div>
</div>
    </div>

    @endsection









    