<x-app-layout>
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold mb-4">Add a new address</h2>

        <button class="bg-blue-500 text-white px-4 py-2 rounded mb-6">
            Autofill your current location
        </button>

        <form action="{{ route('addresses.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="country" class="block text-gray-700">Country/Region</label>
                <select id="country" name="country" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm">
                    <option>India</option>
                </select>
            </div>

            <div>
                <label for="full_name" class="block text-gray-700">Full name (First and Last name)</label>
                <input type="text" id="full_name" name="full_name" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div>
                <label for="phone" class="block text-gray-700">Mobile number</label>
                <input type="text" id="phone" name="phone" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div>
                <label for="pincode" class="block text-gray-700">Pincode</label>
                <input type="text" id="pincode" name="pincode" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div>
                <label for="address_line_one" class="block text-gray-700">Flat, House no., Building, Company, Apartment</label>
                <input type="text" id="address_line_one" name="address_line_one" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div>
                <label for="address_line_two" class="block text-gray-700">Area, Street, Sector, Village</label>
                <input type="text" id="address_line_two" name="address_line_two" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm">
            </div>

            <div>
                <label for="city" class="block text-gray-700">Town/City</label>
                <input type="text" id="city" name="city" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div class="flex items-center">
                <input type="checkbox" id="is_default" name="is_default" class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                <label for="is_default" class="ml-2 block text-gray-700">Set as default address</label>
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded shadow">Save Address</button>
            </div>
        </form>
    </div>
</x-app-layout>
