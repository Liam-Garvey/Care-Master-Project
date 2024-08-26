<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Mail\CompanyPosted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\File;


class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::latest()->simplePaginate(10);

        return view('companies.index', [
            'companies' => $companies
        ]);
    }

    public function create()
    {
        $companies = Company::All();
        return view('companies.create', ['companies' => $companies]);
    }

    public function show(Company $company)
    {
        dd($company->logo);
        return view('companies.show', ['company' => $company]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'logo' => ['required', File::types(['png', 'jpg', 'webp'])],
            'website' => ['required'/*, 'url'*/]
        ]);

        $logoPath = $request->logo->store('logos');
        $company = Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $logoPath,
            'website' => $request->website,
        ]);
        Mail::to($company->email)->queue(
            new CompanyPosted($company)
        );

        return redirect('/companies');
    }

    public function edit(Company $company)
    {
        $companies = Company::All();
        return view('companies.edit', ['company' => $company, 'clogo' => $company->logo]);
    }

    public function update(Company $company)
    {
        $attributes = request()->validate([
            'name' => ['required'],
            'email' => ['required'],
            'logo' => ['required', File::types(['png', 'jpg', 'webp'])],
            'website' => ['required'/*, 'url'*/]
        ]);

        $logoPath = $attributes['logo']->store('logos');
        $company->update([
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'logo' => $logoPath,
            'website' => $attributes['website'],
        ]);

        return redirect('/companies/' . $company->id);
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return redirect('/companies');
    }
}
