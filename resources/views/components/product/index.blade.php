<div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">

        {{-- Title --}}
        @isset($title)
            <div class="mb-10 md:mb-16">
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">{{ $title }}</h2>

                {{-- <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">This is a section of some simple filler text, also known as placeholder text. It shares some characteristics of a real written text but is random or otherwise generated.</p> --}}
            </div>
        @endisset
        <div class="{{ $gridCols ?? 'sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4' }} grid gap-4">

            {{-- Products --}}
            @if ($slot->isEmpty())
                @foreach ($products as $product)
                    <x-product.product-card :product="$product" />
                @endforeach
            @else
                {{ $slot }}
            @endif
        </div>

        {{-- Pagination --}}
        @isset($paginationEnabled)
            {{ $products->links() }}
        @endisset
    </div>
</div>
