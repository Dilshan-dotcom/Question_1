@extends('companies.layout')

@section('content')
<div class="container mt-5">
  <h2>Add a Company</h2>
  <div class="">
    <form action="{{ url('company') }}" method="post" enctype="multipart/form-data">
      {!! csrf_field() !!}
      <label>Name</label><br>
      <input type="text" name="name" id="name" class="form-control">
      @error('name')
          <span class="text-danger">{{ $message }}</span>
      @enderror<br>

      <label>Email</label><br>
      <input type="text" name="email" id="email" class="form-control">
      @error('email')
          <span class="text-danger">{{ $message }}</span>
      @enderror<br>

      <label>Website</label><br>
      <input type="text" name="website" id="website" class="form-control">
      @error('website')
          <span class="text-danger">{{ $message }}</span>
      @enderror<br>

      <input type="file" name="logo" id="logo" class="form-control"><br>


      <input type="submit" value="Save" class="btn btn-success"><br>
    </form>
  </div>
</div>
@endsection
