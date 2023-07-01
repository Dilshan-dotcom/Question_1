@extends('companies.layout')

@section('content')

<div class="container mt-5">
    <div class="row">
        <h2>Mini-CRM</h2>
        <div class="card-body">
            <a href="{{ url('/company/create') }}" class="btn btn-success btn-sm" title="Add New Company">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>
            <br/><br/>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Web Site</th>
                            <th>Logo</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)
                        <tr>
                        <td>{{ ($companies->currentPage()-1) * $companies->perPage() + $loop->iteration }}</td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->website }}</td>
                            <td>
                            <img src="{{ asset($company->logo) }}" width="50" height="50" class="img img-responsive" />


 
 
                            </td>
                            <td>
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#viewModal{{ $company->id }}">
                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                </button>
                                <a href="{{ url('/company/' . $company->id . '/edit') }}" title="Edit Com">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                    </button>
                                </a>
                                <form method="POST" action="{{ url('/company/' . $company->id) }}" accept-charset="UTF-8" style="display:inline">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Company" onclick="return confirm('Confirm delete?')">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    @include('pagination.custom', ['paginator' => $companies])
                </table>
            </div>
        </div>
    </div>
</div>

@foreach($companies as $company)
<div class="modal fade" id="viewModal{{ $company->id }}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel{{ $company->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal content goes here -->
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel{{ $company->id }}">View Company</h5>

            </div>
            <div class="modal-body">
                
                <p>Company ID: {{ $company->id }}</p>
                <p>Company Name: {{ $company->name }}</p>
                <p>Company Web: {{ $company->website }}</p>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
