<x-app-layout>

    @include('components.carousel')

    <!-- Product categories -->
    @include('components.products-category')

    <!-- Trending Products -->
    <h2 class="text-3xl font-bold text-gray-800 mt-8 ml-10 mb-4">Trending Products</h2>
    <div class="flex flex-row flex-wrap justify-center items-center">
        @foreach($products as $product)
        @include('product.product-card', ['product' => $product])
        @endforeach
    </div>

    <!-- Featured Products -->
    <h2 class="text-3xl font-bold text-gray-800 mt-8 ml-10 mb-4">Featured Products</h2>
    <div class="flex flex-row flex-wrap justify-center items-center">
        @foreach($products as $product)
        @include('product.product-card', ['product' => $product])
        @endforeach
    </div>
    
    <!-- Best Selling Products -->
    <h2 class="text-3xl font-bold text-gray-800 mt-8 ml-10 mb-4">Best Selling Products</h2>
    <div class="flex flex-row flex-wrap justify-center items-center">
        @foreach($products as $product)
        @include('product.product-card', ['product' => $product])
        @endforeach
    </div>
</x-app-layout>