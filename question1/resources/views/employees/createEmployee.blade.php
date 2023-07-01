@extends('employees.layout')

@section('content')

<div class="card mt-5">
    <div class="card-header">Employee Page</div>
    <div class="card-body">
        <form action="{{ url('employee') }}" method="post">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control">
            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control">
            </div>

            <div class="form-group">
    <label for="company_id">Company</label>
    <select name="company_id" id="company_id" class="form-control">
        <option value="">Select Company</option>
        @foreach($companies as $companyId => $companyName)
            <option value="{{ $companyId }}">{{ $companyName }}</option>
        @endforeach
    </select>
</div>


            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control">
            </div>

            <input type="submit" value="Save" class="btn btn-success mt-5">
        </form>
    </div>
</div>

@stop
