<x-layout>
    <x-slot:heading>
        Employee List
    </x-slot:heading>

    <div class="space-y-4">
        @foreach ($companies as $company)
            <a href="/companies/{{ $company->id }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <img src="{{ asset($company->logo) }}" alt="" class="rounded-xl" width="100" height="100">
                <div class="font-bold text-blue-500 text-xl">{{ $company->name }}</div>

                <div>
                    <strong class="font-bold">{{ $company->website }}
                </div>
            </a>
        @endforeach

        <div>
            {{ $companies->links() }}
        </div>
    </div>
</x-layout>
