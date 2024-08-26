<x-layout>
    <x-slot:heading>
        Employee
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $employee->first_name }} {{ $employee->last_name }}</h2>

    <p>
        Email: {{ $employee->email }} <br>
        Phone: {{ $employee->phone }} <br>
        Company: {{ $company->name }}
    </p>

    <p class="mt-6">
        <x-button href="/employees/{{ $employee->id }}/edit">Update Employee Information</x-button>
    </p>
</x-layout>
