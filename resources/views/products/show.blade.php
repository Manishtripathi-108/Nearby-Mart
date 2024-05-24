<x-app-layout>
    @if (!$product)
        <x-not-found>
            Sorry, Product not found!
        </x-not-found>
    @else
        <div class="bg-white py-6 sm:py-8 lg:py-12">

            {{-- Product --}}
            <div class="mx-auto max-w-screen-xl px-4 md:px-8">
                <div class="grid gap-8 md:grid-cols-2">
                    <!-- images - start -->
                    <div class="grid gap-4 lg:grid-cols-5">
                        <div class="order-last flex gap-4 lg:order-none lg:flex-col">
                            <div class="overflow-hidden rounded-lg bg-gray-100">
                                <img class="h-full w-full object-cover object-center" src="{{ asset('images/products/' . $product->photo_main) }}" alt="{{ $product->name }}" loading="lazy" />
                            </div>

                            <div class="overflow-hidden rounded-lg bg-gray-100">
                                <img class="h-full w-full object-cover object-center" src="{{ asset('images/products/' . $product->photo_1) }}" alt="{{ $product->name }}" loading="lazy" />
                            </div>

                            <div class="overflow-hidden rounded-lg bg-gray-100">
                                <img class="h-full w-full object-cover object-center" src="{{ asset('images/products/' . $product->photo_2) }}" alt="{{ $product->name }}" loading="lazy" />
                            </div>
                        </div>

                        <div class="relative overflow-hidden rounded-lg bg-gray-100 lg:col-span-4">
                            <img class="h-full w-full object-cover object-center" src="{{ asset('images/products/' . $product->photo_main) }}" alt="{{ $product->name }}" loading="lazy" />

                            @if ($product->discount)
                                @if ($product->discount_type == 'Fixed')
                                    <span class="absolute left-0 top-0 rounded-br-lg bg-red-500 px-3 py-1.5 text-sm uppercase tracking-wider text-white">
                                        -₹{{ $product->discount }}
                                    </span>
                                @elseif ($product->discount_type == 'Percentage')
                                    <span class="absolute left-0 top-0 rounded-br-lg bg-red-500 px-3 py-1.5 text-sm uppercase tracking-wider text-white">
                                        -{{ $product->discount }}%
                                    </span>
                                @endif
                            @endif

                            <a class="absolute right-4 top-4 inline-block rounded-lg border bg-white px-3.5 py-3 text-center text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 hover:bg-gray-100 focus-visible:ring active:text-gray-700 md:text-base" href="#">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <!-- images - end -->

                    <!-- content - start -->
                    <div class="md:py-8">
                        <!-- name - start -->
                        <div class="mb-2 md:mb-3">
                            <span class="mb-0.5 inline-block text-gray-500">{{ $product->category->name }}</span>
                            <h2 class="text-2xl font-bold text-gray-800 lg:text-3xl">{{ $product->name }}</h2>
                        </div>
                        <!-- name - end -->

                        <!-- rating - start -->
                        <div class="mb-6 flex items-center gap-3 md:mb-10">
                            <div class="flex h-7 items-center gap-1 rounded-full bg-indigo-500 px-2 text-white">
                                <span class="text-sm">
                                    {{ $product->rating }}
                                </span>

                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </div>

                            <span class="text-sm text-gray-500 transition duration-100">{{ $reviews->count() }} ratings</span>
                        </div>
                        <!-- rating - end -->

                        <!-- price - start -->
                        <div class="mb-4">
                            <div class="flex items-end gap-2">
                                @if ($product->discount)
                                    @if ($product->discount_type == 'Fixed')
                                        <span class="text-xl font-bold text-gray-800 md:text-2xl">₹{{ number_format($product->price - $product->discount, 2) }}</span>
                                        <span class="mb-0.5 text-red-500 line-through">₹{{ number_format($product->price, 2) }}</span>
                                    @elseif ($product->discount_type == 'Percentage')
                                        <span class="text-xl font-bold text-gray-800 md:text-2xl">₹{{ number_format($product->price - ($product->price * $product->discount) / 100, 2) }}</span>
                                        <span class="mb-0.5 text-red-500 line-through">₹{{ number_format($product->price, 2) }}</span>
                                    @endif
                                @else
                                    <span class="text-xl font-bold text-gray-800 md:text-2xl">₹{{ number_format($product->price, 2) }}</span>
                                @endif
                            </div>
                        </div>
                        <!-- price - end -->

                        <!-- stock and sold info - start -->
                        <div class="mb-4">
                            <div class="flex flex-col gap-2">
                                <span class="text-sm text-gray-500">Stock: {{ $product->stock }}</span>
                                <span class="text-sm text-gray-500">Units Sold: {{ $product->units_sold }}</span>
                            </div>
                        </div>
                        <!-- stock and sold info - end -->

                        <!-- shipping notice - start -->
                        <div class="mb-6 flex items-center gap-2 text-gray-500">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0M9 17a2 2 0 104 0" />
                            </svg>
                            <span class="text-sm">Shipping available across India</span>
                        </div>
                        <!-- shipping notice - end -->

                        <!-- product description - start -->
                        <div class="mb-6">
                            <div class="flex items-center gap-2 text-gray-500">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v16m16-16v16M4 8h16M4 12h16M4 16h16" />
                                </svg>
                                <h3 class="text-lg font-semibold">Product Description:</h3>
                            </div>
                            <p class="mt-2 text-gray-500">{{ $product->description }}</p>
                        </div>
                        <!-- product description - end -->

                        <!-- product technical details - start -->
                        <div class="mb-6">
                            <div class="flex items-center gap-2 text-gray-500">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.5v15m0-15l4 4m-4-4l-4 4m8 6v5m0 0l4-4m-4 4l-4-4" />
                                </svg>
                                <h3 class="text-lg font-semibold">Technical Details:</h3>
                            </div>
                            <ul class="mt-2 list-inside list-disc text-gray-500">
                                <li>Weight: {{ $product->weight }} kg</li>
                                <li>Dimensions: {{ $product->dimensions }}</li>
                                <li>Model Number: {{ $product->model_number }}</li>
                                <li>Material: {{ $product->material }}</li>
                                <li>Color: {{ $product->color }}</li>
                                <li>Warranty: {{ $product->warranty }} months</li>
                            </ul>
                        </div>
                        <!-- product technical details - end -->

                        <!-- edit and delete buttons - start -->
                        <div class="flex gap-4">
                            <a class="inline-block rounded-lg bg-blue-600 px-6 py-3 text-center text-white transition duration-100 hover:bg-blue-700 focus-visible:ring focus-visible:ring-blue-500 active:bg-blue-800" href="{{ route('products.edit', $product->id) }}">
                                Edit Product
                            </a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="inline-block rounded-lg bg-red-600 px-6 py-3 text-center text-white transition duration-100 hover:bg-red-700 focus-visible:ring focus-visible:ring-red-500 active:bg-red-800" type="submit">
                                    Delete Product
                                </button>
                            </form>
                        </div>
                        <!-- edit and delete buttons - end -->

                    </div>
                    <!-- content - end -->
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
