<x-app-layout>

    @include('components.carousel')

    <!-- Product categories -->
    @include('components.products-category')

    <!-- Trending Products -->
    <x-product title="Trending Products" :products="$products"></x-product>

    <!-- Featured Products -->
    <x-product title="Featured Products" :products="$products"></x-product>

    <!-- Best Selling Products -->
    <x-product title="Best Selling Products" :products="$products"></x-product>

</x-app-layout>
