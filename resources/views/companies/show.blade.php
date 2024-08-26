<x-layout>
    <x-slot:heading>
        Employee
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $company->name }}</h2>

    <div class="flex-1 flex-center flex-col mt-2 space-y-4">
        <p class="space-y-6">
            Email: {{ $company->email }} <br>
            <a href="{{ $company->website }}">Website: {{ $company->website }}</a> <br>
        </p>
        <img src="{{ asset($company->logo) }}" alt="" class="rounded-xl" width="100">
    </div>

    <p class="mt-6">
        <x-button href="/companies/{{ $company->id }}/edit">Update Company Information</x-button>
    </p>
</x-layout>
