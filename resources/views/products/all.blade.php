<x-app-layout>
    <div class="flex w-full justify-normal gap-5">
        {{-- Sidebar --}}
        @include('store.partials.sidenav')

        {{-- Content --}}
        <div class="flex w-full flex-col flex-wrap gap-x-6 gap-y-10 py-10 pr-6">
            <x-product title="Your Products" :gridCols="'sm:grid-cols-2 lg:grid-cols-3'" :products="$products" :paginationEnabled="true" />
        </div>
    </div>
</x-app-layout>
