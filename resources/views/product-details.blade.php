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
                                <img class="h-full w-full object-cover object-center" src="{{ asset('products/' . $product->photo_main) }}" alt="{{ $product->name }}" loading="lazy" />
                            </div>

                            @if ($product->photo_1)
                                <div class="overflow-hidden rounded-lg bg-gray-100">
                                    <img class="h-full w-full object-cover object-center" src="{{ asset('products/' . $product->photo_1) }}" alt="{{ $product->name }}" loading="lazy" />
                                </div>
                            @endif

                            @if ($product->photo_2)
                                <div class="overflow-hidden rounded-lg bg-gray-100">
                                    <img class="h-full w-full object-cover object-center" src="{{ asset('products/' . $product->photo_2) }}" alt="{{ $product->name }}" loading="lazy" />
                                </div>
                            @endif
                        </div>

                        <div class="relative overflow-hidden rounded-lg bg-gray-100 lg:col-span-4">
                            <img class="h-full w-full object-cover object-center" src="{{ asset('products/' . $product->photo_main) }}" alt="{{ $product->name }}" loading="lazy" />

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
                        <div class="mb-4 flex items-center gap-3">
                            <div class="flex h-7 items-center gap-1 rounded-full bg-indigo-500 px-2 text-white">
                                <span class="text-sm">{{ $product->rating }}</span>
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </div>
                            <span class="text-sm text-gray-500 transition duration-100">{{ $reviews->count() }} ratings</span>
                        </div>
                        <!-- rating - end -->

                        <!-- sold_by - start -->
                        <div class="mb-4 flex items-center gap-2 text-gray-500">
                            <span class="text-sm">Sold by: </span>
                            <a class="text-indigo-500">{{ $product->store->name }}</a>
                        </div>
                        <!-- sold_by - end -->

                        <!-- per Unit - start -->
                        <div class="mb-4 flex items-center gap-2 text-gray-500">
                            <span class="font-semibold text-gray-800">Per Unit: </span>
                            <span class="text-sm">{{ $product->measure }}/{{ $product->sold_by }}</span>
                        </div>
                        <!-- per Unit - end -->

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
                                @endif
                            </div>
                        </div>
                        <!-- price - end -->

                        <!-- shipping notice - start -->
                        <div class="mb-6 flex items-center gap-2 text-gray-500">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                            </svg>
                            <span class="text-sm">1-2 Hour shipping</span>
                        </div>
                        <!-- shipping notice - end -->

                        <!-- buttons - start -->
                        <div class="flex gap-2.5">
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <button class="inline-block flex-1 rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 sm:flex-none md:text-base" type="submit">
                                    Add to cart
                                </button>
                            </form>
                            <a class="inline-block rounded-lg bg-gray-200 px-8 py-3 text-center text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 hover:bg-gray-300 focus-visible:ring active:text-gray-700 md:text-base" href="#">
                                Buy now
                            </a>
                        </div>
                        <!-- buttons - end -->
                    </div>
                    <!-- content - end -->

                </div>
            </div>

            {{-- Description --}}
            @if ($product->description)
                <div class="mx-auto mt-10 max-w-screen-xl px-4 md:px-8">
                    <div class="border-b pb-4 md:pb-6">
                        <h2 class="text-lg font-bold text-gray-800 lg:text-xl">Description</h2>
                    </div>

                    <div class="py-8">
                        <p class="text-gray-600">
                            {{ $product->description }}
                        </p>
                    </div>
                </div>
            @endif

            {{-- Reviews --}}
            @if ($reviews->isNotEmpty())
                <div class="mx-auto mt-10 max-w-screen-xl px-4 md:px-8">
                    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 lg:gap-12">
                        <!-- overview - start -->
                        <div>
                            <div class="rounded-lg border p-4">
                                <h2 class="mb-3 text-lg font-bold text-gray-800 lg:text-xl">Customer Reviews</h2>

                                <div class="mb-0.5 flex items-center gap-2">
                                    <!-- stars - start -->
                                    <div class="-ml-1 flex gap-0.5">
                                        @foreach (range(1, 5) as $index)
                                            @if ($index <= $product->rating)
                                                <svg class="h-6 w-6 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            @else
                                                <svg class="h-6 w-6 text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            @endif
                                        @endforeach
                                    </div>
                                    <!-- stars - end -->

                                    <span class="text-sm font-semibold">{{ $product->rating }}/5</span>
                                </div>

                                <span class="block text-sm text-gray-500">Based on {{ $reviews->count() }} reviews</span>

                                <div class="my-5 flex flex-col gap-2 border-b border-t py-5">
                                    <!-- Loop over each rating -->
                                    @for ($i = 5; $i >= 1; $i--)
                                        @php
                                            $ratingCount = $reviews->where('rating', $i)->count();
                                        @endphp
                                        <!-- star - start -->
                                        <div class="flex items-center gap-3">
                                            <span class="w-10 whitespace-nowrap text-right text-sm text-gray-600">{{ $i }} Star</span>

                                            <div class="flex h-4 flex-1 overflow-hidden rounded bg-gray-200">
                                                <span class="w-{{ ($ratingCount / $reviews->count()) * 100 }} h-full rounded bg-yellow-400"></span>
                                            </div>
                                        </div>
                                        <!-- star - end -->
                                    @endfor
                                </div>

                                <a class="block rounded-lg border bg-white px-4 py-2 text-center text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 hover:bg-gray-100 focus-visible:ring active:bg-gray-200 md:px-8 md:py-3 md:text-base" href="#">Write a review</a>
                            </div>
                        </div>
                        <!-- overview - end -->

                        <!-- reviews - start -->
                        <div class="lg:col-span-2">
                            <div class="border-b pb-4 md:pb-6">
                                <h2 class="text-lg font-bold text-gray-800 lg:text-xl">Top Reviews</h2>
                            </div>

                            <div class="divide-y">
                                <!-- review - start -->
                                @foreach ($reviews as $review)
                                    <div class="flex flex-col gap-3 py-4 md:py-8">
                                        <div>
                                            <span class="block text-sm font-bold">
                                                {{ $review->user->name }}
                                            </span>
                                            <span class="block text-sm text-gray-500">
                                                {{ $review->created_at->diffForHumans() }}
                                            </span>
                                        </div>

                                        <!-- stars - start -->
                                        <div class="-ml-1 flex gap-0.5">
                                            @foreach (range(1, 5) as $index)
                                                @if ($index <= $review->rating)
                                                    <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg>
                                                @else
                                                    <svg class="h-5 w-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg>
                                                @endif
                                            @endforeach
                                        </div>
                                        <!-- stars - end -->

                                        <p class="text-gray-600">
                                            {{ $review->comment }}
                                        </p>
                                    </div>
                                @endforeach
                                <!-- review - end -->
                            </div>
                        </div>
                        <!-- reviews - end -->
                    </div>
                </div>
            @else
                <div class="mx-auto mt-10 max-w-screen-xl px-4 md:px-8">
                    <div class="border-b pb-4 md:pb-6">
                        <h2 class="text-lg font-bold text-gray-800 lg:text-xl">Customer Reviews</h2>
                    </div>

                    <div class="py-8">
                        <p class="text-gray-500">No reviews yet!</p>
                    </div>
                </div>
            @endif
        </div>

    @endif

</x-app-layout>
