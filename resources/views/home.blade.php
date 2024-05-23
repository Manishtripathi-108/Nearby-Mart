<x-app-layout>

    @include('components.carousel')

    <!-- Product categories -->
    @include('components.products-category')

    <!-- Trending Products -->
    <h2 class="mb-4 ml-10 mt-8 text-3xl font-bold text-gray-800">Trending Products</h2>
    <div class="flex flex-row flex-wrap items-center justify-center">
        @foreach ($products as $product)
            @include('product.product-card', ['product' => $product])
        @endforeach
    </div>

    <!-- Featured Products -->
    <h2 class="mb-4 ml-10 mt-8 text-3xl font-bold text-gray-800">Featured Products</h2>
    <div class="flex flex-row flex-wrap items-center justify-center">
        @foreach ($products as $product)
            @include('product.product-card', ['product' => $product])
        @endforeach
    </div>

    <!-- Best Selling Products -->
    <h2 class="mb-4 ml-10 mt-8 text-3xl font-bold text-gray-800">Best Selling Products</h2>
    <div class="flex flex-row flex-wrap items-center justify-center">
        @foreach ($products as $product)
            @include('product.product-card', ['product' => $product])
        @endforeach
    </div>
</x-app-layout>
