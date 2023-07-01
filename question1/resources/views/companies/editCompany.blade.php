@extends('companies.layout')
@section('content')
 
<div class="container mt-5">
  <h2>Edit Company Page</h2>
  <div class="card-body">
      
      <form action="{{ url('company/' .$companies->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$companies->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="companies" id="companies" value="{{$companies->name}}" class="form-control"></br>
        <label>Email</label></br>
        <input type="text" name="email" id="email" value="{{$companies->email}}" class="form-control"></br>
        <label>WebSite</label></br>
        <input type="text" name="website" id="website" value="{{$companies->website}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success float-end mt-5"></br>
    </form>
   
  </div>
</div>
 
@stop