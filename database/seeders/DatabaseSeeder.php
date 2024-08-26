<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'admin@admin.com',
            'password' => 'password',
        ]);

        $this->call(EmployeeSeeder::class);
        $this->call(CompanySeeder::class);
    }
}
