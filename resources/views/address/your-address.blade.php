<x-app-layout>
    <div class="flex h-auto w-full flex-col items-center justify-center">
        <!-- Header -->
        <div class="m-10 flex h-auto w-full flex-col items-center justify-center md:w-1/2 md:flex-row">
            <h1 class="w-full justify-center text-3xl font-bold text-gray-900 md:justify-start">Your Addresses</h1>
        </div>

        <!-- Addresses -->
        <div class="mt-4 flex h-auto w-full flex-row flex-wrap items-center justify-center gap-3">
            <!-- Add New Address -->
            <a href="{{ route('addresses.create') }}">
                <div
                    class="flex h-96 w-80 flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300">
                    <div class="flex w-full justify-center p-2 text-gray-500">
                        <svg class="h-16 w-16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </div>
                    <h2 class="flex w-full items-center justify-center">Add New Address</h2>
                </div>
            </a>

            @if($addresses->count() > 0)
            <!-- Default Address -->
            @foreach($addresses as $address)
            @if($address->is_default)
            <div class="relative flex h-96 w-80 flex-col justify-start rounded-lg border-2 border-gray-300">
                <div
                    class="absolute top-0 left-0 w-full flex flex-row justify-start rounded-t-lg border-2 border-gray-300 p-2">
                    <p class="text-md font-semibold">Default: </p>
                    <p class="text-lg font-semibold text-blue-600 ml-2">{{ $address->name }}</p>
                </div>
                <div class="m-1 flex h-auto w-full flex-col justify-center p-2">
                    <h1 class="text-2xl font-bold">{{ $address->name }}</h1>
                    <p class="text-lg">{{ $address->address_line_one }}</p>
                    <p class="text-lg">{{ $address->address_line_two }}</p>
                    <p class="text-lg">{{ $address->city }}</p>
                    <p class="text-lg">{{ $address->state }}</p>
                    <p class="text-lg">{{ $address->district }}</p>
                    <p class="text-lg">Phone: {{ $address->phone }}</p>
                    <a class="text-lg text-blue-600 underline" href="#">Add Delivery Instruction</a>
                </div>
                <!-- Bottom Buttons -->
                <div class="absolute bottom-0 inset-x-0 flex h-16 w-full flex-row space-x-4 p-2 justify-end">
                    <a href="{{ route('addresses.edit', $address->id) }}">
                        <p class="text-lg text-blue-600">Edit</p>
                    </a>
                    <form action="{{ route('addresses.destroy', $address->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-lg text-blue-600">Remove</button>
                    </form>
                </div>
            </div>
            @endif
            @endforeach

            <!-- Other Addresses -->
            @foreach($addresses as $address)
            @if(!$address->is_default)
            <div class="relative flex h-96 w-80 flex-col justify-start rounded-lg border-2 border-gray-300">
                <div class="m-1 flex h-auto w-full flex-col justify-center p-2">
                    <h1 class="text-2xl font-bold">{{ $address->name }}</h1>
                    <p class="text-lg">{{ $address->address_line_one }}</p>
                    <p class="text-lg">{{ $address->address_line_two }}</p>
                    <p class="text-lg">{{ $address->city }}</p>
                    <p class="text-lg">{{ $address->state }}</p>
                    <p class="text-lg">{{ $address->country }}</p>
                    <p class="text-lg">Phone: {{ $address->phone }}</p>
                    <a class="text-lg text-blue-600 underline" href="#">Add Delivery Instruction</a>
                </div>
                <!-- Bottom Buttons -->
                <div class="absolute bottom-0 inset-x-0 flex h-16 w-full flex-row space-x-4 p-2 justify-end">
                    <a href="{{ route('addresses.edit', $address->id) }}">
                        <p class="text-lg text-blue-600">Edit</p>
                    </a>
                    <form action="{{ route('addresses.destroy', $address->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-lg text-blue-600">Remove</button>
                    </form>


                    <a href="{{ route('addresses.setDefault', $address->id) }}">
                        <p class="text-lg text-blue-600">Set It Default</p>
                    </a>
                </div>
            </div>
            @endif
            @endforeach

            <!-- No Address Found -->
            @else
            <div class="flex h-auto w-full flex-col items-center justify-center">
                <h1 class="text-2xl font-bold text-gray-900">No Address Found</h1>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>