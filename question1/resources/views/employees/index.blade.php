@extends('companies.layout')

@section('content')

<div class="container mt-5">
    <div class="row">
        <h2>Employee Page</h2>
        <div class="card-body">
            <a href="{{ url('/employee/create') }}" class="btn btn-success btn-sm" title="Add New Employee">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>
            <br/><br/>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Company</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                        <tr>
                            <td></td>
                            <td>{{ $employee->first_name }}</td>
                            <td>{{ $employee->last_name }}</td>
                            <td>{{ $employee->company->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#viewModal{{ $employee->id }}">
                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                </button>
                                <a href="{{ url('/employee/' . $employee->id . '/edit') }}" title="Edit Employee">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                    </button>
                                </a>
                                <form method="POST" action="{{ url('/employee/' . $employee->id) }}" accept-charset="UTF-8" style="display:inline">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Employee" onclick="return confirm('Confirm delete?')">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination justify-content-center">
                    <nav aria-label="...">
                        <ul class="pagination float-endf">
                            <li class="page-item {{ $employees->currentPage() == 1 ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $employees->previousPageUrl() }}" tabindex="-1" aria-disabled="{{ $employees->currentPage() == 1 ? 'true' : 'false' }}">Previous</a>
                            </li>
                            @foreach ($employees->getUrlRange($employees->currentPage() - 1, $employees->currentPage() + 1) as $page => $url)
                            <li class="page-item {{ $page == $employees->currentPage() ? 'active' : '' }}" aria-current="page">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                            @endforeach
                            <li class="page-item {{ !$employees->hasMorePages() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $employees->nextPageUrl() }}">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach($employees as $employee)
<div class="modal fade" id="viewModal{{ $employee->id }}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel{{ $employee->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel{{ $employee->id }}">View Employee</h5>
            </div>
            <div class="modal-body">
                <p>Employee ID: {{ $employee->id }}</p>
                <p>First Name: {{ $employee->first_name }}</p>
                <p>Last Name: {{ $employee->last_name }}</p>
                <p>Company: {{ $employee->company->name }}</p>
                <p>Email: {{ $employee->email }}</p>
                <p>Phone: {{ $employee->phone }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
