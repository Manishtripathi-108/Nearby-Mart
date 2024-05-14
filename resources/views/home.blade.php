<x-app-layout>

    @include('components.carousel')
    <!-- Product categories -->
    <div class="item-center m-10 flex">
        <h1 class="text-2xl font-bold">Categories</h1>
    </div>

    @include('components.products-category')

    <div class="item-center m-10 flex">
        <h1 class="text-2xl font-bold">Recent Added Products</h1>
    </div>

</x-app-layout>
