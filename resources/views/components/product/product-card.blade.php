<div>
    <a class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100" href="{{ route('products.show', $product->id) }}">
        <img class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" src="{{ asset('images/products/' . $product->photo_main) }}" loading="lazy" />

        @if ($discountLabel)
            <span class="absolute left-0 top-3 rounded-r-lg bg-red-500 px-3 py-1.5 text-sm font-semibold uppercase tracking-wider text-white">
                {{ $discountLabel }}
            </span>
        @endif
    </a>
    <div class="flex items-start justify-between gap-2 rounded-b-lg bg-gray-100 p-4">
        <div class="flex flex-col">
            <a class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg" href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
            <span class="text-sm text-gray-500 lg:text-base">{{ $product->category->name }}</span>
        </div>
        <div class="flex flex-col items-end">
            @if ($discountLabel)
                <span class="font-bold text-gray-600 lg:text-lg">₹{{ $finalPrice }}</span>
                <span class="text-sm text-red-500 line-through">₹{{ number_format($product->price, 2) }}</span>
            @else
                <span class="font-bold text-gray-600 lg:text-lg">₹{{ $finalPrice }}</span>
            @endif
        </div>
    </div>
</div>
