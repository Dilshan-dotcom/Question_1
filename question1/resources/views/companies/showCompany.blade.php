@extends('companies.layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Students Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Name : {{ $companies->name }}</h5>
        <p class="card-text">Email : {{ $companies->email }}</p>
        <p class="card-text">Website : {{ $companies->website }}</p>
  </div>
       
    </hr>
  
  </div>
</div>