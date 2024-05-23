<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Search Results for: ') . $query }}
        </h2>
    </x-slot>

    @if ($products->isEmpty())
        <x-not-found>
            Sorry, We couldn't find what you are looking for!
        </x-not-found>
    @else
        <x-product :products="$products" :paginationEnabled="true"></x-product>
    @endif
</x-app-layout>
