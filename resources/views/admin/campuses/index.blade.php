@extends('admin.layout.master')

@section('content')

    <div id="main-wrapper">

        @include('admin.includes.sidebar')

        <div class="page-wrapper ">

        <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left ml-2">
                <h2>Campus list</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success float-right mr-2 mb-2" href="{{ route('campuses.create') }}"  style="box-shadow:1px 1px black;"> <i class="fas fa-university"></i> Add Campus </a>
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
            <th>Campus name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($campuses as $campus)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $campus->campus_name }}</td>
            
            <td>
                <form action="{{ route('campuses.delete',$campus->id) }}" method="POST">
   
                    <a class="btn btn-primary btn-sm" href="{{ route('campuses.edit',$campus->id) }}"><i class="fas fa-edit"></i></a>
   
                    @csrf
                    @method('GET')
      
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $campuses->links() !!}
        </div>
        </div>
    </div>

    @endsection