@extends('employees.layout')

@section('content')

<div class="container mt-5">
  <h2>Edit Employee Page</h2>
  <div class="card-body">

    <form action="{{ url('employee/' . $employee->id) }}" method="post">
      {!! csrf_field() !!}
      @method("PATCH")
      <input type="hidden" name="id" value="{{ $employee->id }}">
      <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" id="first_name" value="{{ $employee->first_name }}" class="form-control">
      </div>

      <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" id="last_name" value="{{ $employee->last_name }}" class="form-control">
      </div>

      <div class="form-group">
        <label for="company">Company</label>
        <select name="company" id="company" class="form-control">
          @foreach ($companies as $company)
          <option value="{{ $company->id }}" {{ $employee->company_id == $company->id ? 'selected' : '' }}>
            {{ $company->name }}
          </option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="{{ $employee->email }}" class="form-control">
      </div>

      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" value="{{ $employee->phone }}" class="form-control">
      </div>

      <input type="submit" value="Update" class="btn btn-success mt-5 float-end">
    </form>

  </div>
</div>

@stop
