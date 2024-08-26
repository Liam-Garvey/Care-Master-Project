<?php

use App\Models\Company;
use App\Models\Employee;

test('employees belongs to a company', function () { // Double-checking that employees and companies were properly linked
    $company = Company::factory()->create();
    $employee = Employee::factory()->create([
        'company_id' => $company->id,
    ]);

    expect($employee->company->is($company))->toBeTrue();

});

test('employees go down with the company', function () { // Troubleshooting the cascadeonDelete() function between companies and employers
    $company = Company::factory()->create();
    $employee = Employee::factory()->create([
        'company_id' => $company->id,
    ]);
    $company->delete();

    expect(empty($employee->attributes))->tobeTrue();

});
