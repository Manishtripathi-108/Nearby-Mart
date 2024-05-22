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
        <div class="bg-white py-6 sm:py-8 lg:py-12">
            <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach ($products as $product)
                        <div>
                            <a class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100" href="
                            {{ route('products.show', $product->id) }}
                            ">
                                <img class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" src="{{ asset('images/products/' . $product->photo_main) }}" loading="lazy" />

                                @if ($product->discount)
                                    @if ($product->discount_type == 'Fixed')
                                        <span class="absolute left-0 top-3 rounded-r-lg bg-red-500 px-3 py-1.5 text-sm font-semibold uppercase tracking-wider text-white">
                                            -₹{{ $product->discount }}
                                        </span>
                                    @elseif ($product->discount_type == 'Percentage')
                                        <span class="absolute left-0 top-3 rounded-r-lg bg-red-500 px-3 py-1.5 text-sm font-semibold uppercase tracking-wider text-white">
                                            -{{ $product->discount }}%
                                        </span>
                                    @endif
                                @endif
                            </a>
                            <div class="flex items-start justify-between gap-2 rounded-b-lg bg-gray-100 p-4">
                                <div class="flex flex-col">
                                    <a class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg" href="#">{{ $product->name }}</a>
                                    <span class="text-sm text-gray-500 lg:text-base">{{ $product->category->name }}</span>
                                </div>
                                <div class="flex flex-col items-end">
                                    @if ($product->discount)
                                        @if ($product->discount_type == 'Fixed')
                                            <span class="font-bold text-gray-600 lg:text-lg">₹{{ number_format($product->price - $product->discount, 2) }}</span>
                                            <span class="text-sm text-red-500 line-through">₹{{ number_format($product->price, 2) }}</span>
                                        @elseif ($product->discount_type == 'Percentage')
                                            <span class="font-bold text-gray-600 lg:text-lg">₹{{ number_format($product->price - ($product->price * $product->discount) / 100, 2) }}</span>
                                            <span class="text-sm text-red-500 line-through">₹{{ number_format($product->price, 2) }}</span>
                                        @endif
                                    @else
                                        <span class="font-bold text-gray-600 lg:text-lg">₹{{ number_format($product->price, 2) }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $products->links() }}
            </div>
        </div>
    @endif
</x-app-layout>
