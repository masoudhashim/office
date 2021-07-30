@extends('templates.main')

@section('content')
 <div class="row">
   <div class="col-12">
    <h1 class="float-start">client</h1>
    <a href="{{ route('admin.users.create')}}" class="btn btn-sm btn-success float-end" role="button">Create</a> 
 </div>
</div>

@endsection