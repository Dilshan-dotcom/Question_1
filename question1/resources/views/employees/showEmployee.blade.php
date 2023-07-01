@extends('companies.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Employee Page</div>
  <div class="card-body">
   
    <div class="card-body">
        <h5 class="card-title">First Name: {{ $employee->first_name }}</h5>
        <p class="card-text">Last Name: {{ $employee->last_name }}</p>
        <p class="card-text">Company: {{ $employee->company->name }}</p>
        <p class="card-text">Email: {{ $employee->email }}</p>
        <p class="card-text">Phone: {{ $employee->phone }}</p>
    </div>
       
    </hr>
  
  </div>
</div>
@endsection
