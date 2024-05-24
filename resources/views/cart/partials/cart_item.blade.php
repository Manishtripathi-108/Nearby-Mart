<!-- product - start -->
<div class="flex flex-wrap gap-x-4 overflow-hidden rounded-lg border sm:gap-y-4 lg:gap-6">
    <a class="group relative block h-48 w-32 overflow-hidden bg-gray-100 sm:h-56 sm:w-40" href="{{ route('products.details', $item->product->id) }}">
        <img class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" src="{{ asset('products/' . $item->product->photo_main) }}" alt="{{ $item->product->name }}" loading="lazy" />
    </a>

    <div class="flex flex-1 flex-col justify-between py-4">
        <div>
            <a class="mb-1 inline-block text-lg font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-xl" href="{{ route('products.details', $item->product->id) }}">{{ $item->product->name }}</a>

            <span class="block text-gray-500">
                Category: {{ $item->product->category->name }}
            </span>
        </div>

        <div>
            @if ($item->product->discount)
                @if ($item->product->discount_type === 'Fixed')
                    <span class="mb-1 block font-bold text-gray-800 md:text-lg">₹{{ number_format($item->product->price - $item->product->discount, 2) }}</span>
                @elseif ($item->product->discount_type === 'Percentage')
                    <span class="mb-1 block font-bold text-gray-800 md:text-lg">₹{{ number_format($item->product->price - ($item->product->price * $item->product->discount) / 100, 2) }}</span>
                @endif
            @endif

            <span class="flex items-center gap-1 text-sm text-gray-500">

                @if ($item->product->stock === 0)
                    <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span class="text-red-500">Out of stock</span>
                @else
                    <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="text-green-500">In stock</span>
                @endif
            </span>
        </div>
    </div>

    <div class="flex w-full justify-between border-t p-4 sm:w-auto sm:border-none sm:pl-0 lg:p-6 lg:pl-0">
        <div class="flex flex-col items-start gap-2">
            <div class="flex h-12 w-24 overflow-hidden rounded border">
                <input class="w-full px-4 py-2 outline-none ring-inset ring-indigo-300 transition duration-100 focus:ring" type="number" value="{{ $item->quantity }}" />

                <div class="flex flex-col divide-y border-l">
                    <button class="flex w-6 flex-1 select-none items-center justify-center bg-white leading-none transition duration-100 hover:bg-gray-100 active:bg-gray-200">+</button>
                    <button class="flex w-6 flex-1 select-none items-center justify-center bg-white leading-none transition duration-100 hover:bg-gray-100 active:bg-gray-200">-</button>
                </div>
            </div>

            <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="select-none text-sm font-semibold text-indigo-500 transition duration-100 hover:text-indigo-600 active:text-indigo-700" type="submit">Delete</button>
            </form>
        </div>

        <div class="ml-4 pt-3 md:ml-8 md:pt-2 lg:ml-16">
            <span class="block font-bold text-gray-800 md:text-lg">
                @if ($item->product->discount)
                    @if ($item->product->discount_type === 'Fixed')
                        ₹{{ number_format(($item->product->price - $item->product->discount) * $item->quantity, 2) }}
                    @elseif ($item->product->discount_type === 'Percentage')
                        ₹{{ number_format(($item->product->price - ($item->product->price * $item->product->discount) / 100) * $item->quantity, 2) }}
                    @endif
                @else
                    ₹{{ number_format($item->product->price * $item->quantity, 2) }}
                @endif
            </span>
        </div>
    </div>
</div>
<!-- product - end -->
