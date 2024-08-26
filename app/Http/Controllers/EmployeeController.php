<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\Employee;

use function PHPUnit\Framework\isNull;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('company')->latest()->simplePaginate(10);

        return view('employees.index', [
            'employees' => $employees
        ]);
    }

    public function create()
    {
        $companies = Company::All();
        return view('employees.create', ['companies' => $companies]);
    }

    public function show(Employee $employee)
    {
        return view('employees.show', ['employee' => $employee, 'company' => $employee->company]);
    }

    public function store()
    {
        request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
            'company_id' => ['required', 'gt:0'],
        ]);
        $employee = Employee::create([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'company_id' => request('company_id')
        ]);
        return redirect('/employees');
    }

    public function edit(Employee $employee)
    {
        $companies = Company::All();
        return view('employees.edit', ['employee' => $employee, 'companies' => $companies]);
    }

    public function update(Employee $employee)
    {

        $attributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
            'company_id' => ['required', 'gt:0'],
        ]);



        $employee->update([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'company_id' => request('company_id')
        ]);

        return redirect('/employees/' . $employee->id);
    }

    public function destroy(User $user, Employee $employee)
    {
        $employee->delete();
        if ($employee->attributes){ return 'xdd'; }

        return redirect('/employees');
    }
}
