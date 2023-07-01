<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Company;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $employees = Employee::with('company')->paginate(3);
        $companies = Company::all();
    
        return view('employees.index', compact('employees', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $companies = Company::pluck('name', 'id');
        return view('employees.createEmployee', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
       
        $input = $request->all();
        Employee::create($input);
        return redirect('employee')->with('flash_message', 'Employee Addedd!');
    
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $employee = Employee::find($id);
        return view('employees.showEmployee')->with('employees', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $employee = Employee::find($id);
        $companies = Company::all();
        
        return view('employees.editEmployee', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
       
        $employee = Employee::find($id);
        $input = $request->all();
        $employee->update($input);
        return redirect('employee')->with('flash_message', 'Employee Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Employee::destroy($id);
        return redirect('employee')->with('flash_message', 'Employee deleted!'); 
    }
}
