<x-layout>
    <x-slot:heading>
        Employee List
    </x-slot:heading>

    <div class="space-y-4">
        @foreach ($employees as $employee)
            <a href="/employees/{{ $employee->id }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div class="font-bold text-blue-500 text-xl">{{ $employee->first_name }} {{ $employee->last_name }}</div>

                <div>
                    <strong class="font-bold">{{ $employee->company->name }}
                </div>
            </a>
        @endforeach

        <div>
            {{ $employees->links() }}
        </div>
    </div>
</x-layout>
