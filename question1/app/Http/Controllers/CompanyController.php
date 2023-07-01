<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Company;
use Illuminate\Contracts\View\View;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index(): View
    {
        $companies = Company::paginate(10);
        return view ('companies.index')->with('companies', $companies);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('companies.createCompany');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'website' => 'required',
           
        ];
    
        $requestData = $request->validate($rules);
    
        if ($request->hasFile('logo')) {
            $fileName = time() . $request->file('logo')->getClientOriginalName();
            $path = $request->file('logo')->storeAs('public', $fileName);
            $requestData['logo'] = 'storage/' . $fileName;
        } else {
            $requestData['logo'] = '';
        }
    
        Company::create($requestData);
    
        return redirect('company')->with('flash_message', 'Company Added!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $company = Company::find($id);
        return view('companies.showCompany')->with('companies', $company);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $company = Company::find($id);
        return view('companies.editCompany')->with('companies', $company);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
       
        $company = Company::find($id);
        $input = $request->all();
        $company->update($input);
        return redirect('company')->with('flash_message', 'Company Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Company::destroy($id);
        return redirect('company')->with('flash_message', 'Company deleted!'); 
    }
}
