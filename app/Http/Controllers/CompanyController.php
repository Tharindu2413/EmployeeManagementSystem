<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:company-list|company-create|company-edit|company-delete', ['only' => ['index','store']]);
         $this->middleware('permission:company-create', ['only' => ['create','store']]);
         $this->middleware('permission:company-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:company-delete', ['only' => ['destroy']]);
    }
    

    public function index()
    {
       $user = Auth::user();
       $companies = $user->companies;
       return view('companies.index', compact('user', 'companies'));
    }


    public function create()
    {
        return view('companies.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required'
        ]);
    

        $company = new Company([
            'user_id' => auth()->user()->id,
            'name' => $data['name'],
            'description' => $data['description'],
        ]);
    
        $company->save();
    

        return redirect()->route('companies.index');
    }

  
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

  
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }


    public function update(Request $request, Company $company)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $company->update($data);

        return redirect()->route('companies.index')->with('success', 'Company Details Updated successfully.');
    }

 
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
