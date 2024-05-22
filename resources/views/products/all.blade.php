<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('All Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="border-b border-gray-200 bg-white p-6 sm:px-20">
                    <div class="text-2xl">
                        All Products
                    </div>
                    <div class="mt-6">
                        <div class="flex justify-end">
                            {{-- <a class="rounded bg-green-500 px-4 py-2 font-bold text-white hover:bg-green-700" href="{{ route('store.products.create', $product->store_id) }}">
                                Add New
                            </a> --}}
                        </div>
                        <div class="mt-6">
                            <table class="w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-200 text-sm uppercase leading-normal text-gray-600">
                                        <th class="px-6 py-3 text-left">Name</th>
                                        <th class="px-6 py-3 text-left">Description</th>
                                        <th class="px-6 py-3 text-center">Price</th>
                                        <th class="px-6 py-3 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm font-light text-gray-600">

                                    @foreach ($products as $product)
                                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                                            <td class="whitespace-nowrap px-6 py-3 text-left">
                                                <div class="flex items-center">
                                                    <span class="font-medium">{{ $product->name }}</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-3 text-left">
                                                <div class="items -center flex">
                                                    <span>{{ $product->description }}</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-3 text-center">
                                                <span class="rounded-full bg-purple-200 px-3 py-1 text-xs text-purple-600">{{ $product->price }}</span>
                                            </td>
                                            <td class="px-6 py-3 text-center">
                                                <div class="item-center flex justify-center">
                                                    <a class="mr-2 w-4 transform hover:scale-110 hover:text-purple-500" href="{{ route('store.products.edit', [$product->store_id, $product->id]) }}">
                                                        <svg class="w-4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                                                        </svg>
                                                    </a>
                                                    <form action="{{ route('store.products.destroy', [$product->store_id, $product->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="mr-2 w-4 transform hover:scale-110 hover:text-purple-500" type="submit">
                                                            <svg class="w-4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                                                <path d="M6 18L18 6M6 6l12 12"></path>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
