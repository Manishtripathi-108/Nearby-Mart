<x-app-layout>
<div class="container mx-auto py-8">
        <div class="bg-white rounded shadow-md p-8">
            <h1 class="text-2xl font-semibold mb-4">{{ $store->name }}</h1>
            <p class="mb-4">{{ $store->address }}</p>
            <p class="mb-4">Phone: {{ $store->phone }}</p>
            <p class="mb-8">Email: {{ $store->email }}</p>
            
            <h2 class="text-lg font-semibold mb-4">Products</h2>
            <ul>
                @foreach ($store->products as $product)
                    <li class="mb-4">
                        <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                        <p>{{ $product->description }}</p>
                        <p class="text-gray-700">{{ $product->price }}</p>
                    </li>
                @endforeach
            </ul></div></div>
</x-app-layout>