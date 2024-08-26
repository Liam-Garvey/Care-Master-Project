<?php

use App\Models\Company;

test ('logos are real', function () // Determining why user-input images from the create and edit company views were different from the factory created ones
{
    $company = Company::factory()->create();

    expect(is_string($company->logo))->tobeTrue();

});
