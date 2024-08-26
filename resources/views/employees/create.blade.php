<x-layout>
    <x-slot:heading>
        Add Employee
    </x-slot:heading>

    <form method="POST" action="/employees">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Add a New Employee</h2>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="first_name">First Name</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="first_name" id="first_name" placeholder="John" />

                            <x-form-error name="first_name" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="last_name">Last Name</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="last_name" id="last_name" placeholder="Doe" />

                            <x-form-error name="last_name" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="email" id="email" placeholder="Email"  type="email" />

                            <x-form-error name="email" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="phone">Phone Number</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="phone" id="phone" placeholder="Phone Number" type="phoneNumber" />

                            <x-form-error name="phone" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="company_id">Company</x-form-label>

                        <div class="mt-2">
                            <select class="form-control" name="company_id" value="{{ old('company_id') }}">
                                <option value="0">Select Company</option>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}" {{ (old("company_id") == $company->id ? "selected": "") }}>{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <x-form-button>Save</x-form-button>
        </div>
    </form>
</x-layout>
