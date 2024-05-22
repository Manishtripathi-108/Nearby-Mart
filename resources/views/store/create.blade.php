<x-app-layout>
    <div class="flex w-full justify-normal gap-5">
        {{-- Sidebar --}}
        @include('store.partials.sidenav')

        {{-- Content --}}
        <div class="flex w-full flex-col flex-wrap gap-x-6 gap-y-10 py-10 pr-6">

            <x-neomorphic-form method="POST" action="{{ route('store.store') }}">
                @csrf

                <h2 class="mb-6 text-center text-2xl font-bold">Add New Store</h2>

                <!-- Store Name -->
                <div class="mb-4">
                    <label class="mb-2 block text-sm font-medium text-gray-700" for="store_name">Store Name</label>
                    <x-neomorphic-form.input class="w-full" id="store_name" name="store_name" type="text" value="{{ old('store_name') }}"  placeholder="Store Name" required />
                    @error('store_name')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4 flex justify-between gap-5">
                    <!-- Email -->
                    <div class="w-full">
                        <label class="mb-2 block text-sm font-medium text-gray-700" for="email">Email</label>
                        <x-neomorphic-form.input class="w-full" id="email" name="email" type="email" value="{{ old('email') }}"  placeholder="Store Email" required />
                        @error('email')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Phone Number -->
                    <div class="w-full">
                        <label class="mb-2 block text-sm font-medium text-gray-700" for="phone">Phone Number</label>
                        <x-neomorphic-form.input class="w-full" id="phone" name="phone" type="text" value="{{ old('phone') }}" placeholder="Store Phone Number" required />
                        @error('phone')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Address -->
                <div class="mb-4">
                    <label class="mb-2 block text-sm font-medium text-gray-700" for="address_id">Address</label>
                    <x-neomorphic-form.select class="w-full" id="address_id" name="address_id" >
                        <option value="">Select Address</option>
                        @foreach ($addresses as $address)
                            <option value="{{ $address['id'] }}" @if (old('address_id') == $address['id']) selected @endif>
                                {{ $address['full_address'] }}
                            </option>
                        @endforeach
                    </x-neomorphic-form.select>
                    @error('address_id')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Business Hours -->
                @include('store.partials.business-hours-form', [
                    'oldBusinessHours' => old('days', []),
                    'oldStartTimes' => old(),
                    'oldEndTimes' => old(),
                ])

                <!-- Submit Button -->
                <x-primary-button class="w-full" type="submit" buttonAttributes='w-full mt-6'>Add Store</x-primary-button>
            </x-neomorphic-form>

        </div>
    </div>
</x-app-layout>
