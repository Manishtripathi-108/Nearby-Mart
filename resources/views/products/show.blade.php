<x-app-layout>
    <div class="flex w-full justify-normal gap-5">
        {{-- Sidebar --}}
        @include('store.partials.sidenav')

        {{-- Content --}}
        <div class="flex w-full flex-col flex-wrap gap-x-6 gap-y-10 py-10 pr-6">
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

                                    @if ($product->photo_1)
                                        <div class="overflow-hidden rounded-lg bg-gray-100">
                                            <img class="h-full w-full object-cover object-center" src="{{ asset('images/products/' . $product->photo_1) }}" alt="{{ $product->name }}" loading="lazy" />
                                        </div>
                                    @endif

                                    @if ($product->photo_2)
                                        <div class="overflow-hidden rounded-lg bg-gray-100">
                                            <img class="h-full w-full object-cover object-center" src="{{ asset('images/products/' . $product->photo_2) }}" alt="{{ $product->name }}" loading="lazy" />
                                        </div>
                                    @endif
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
                                <div class="mb-2 flex items-center gap-3 md:mb-10">
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
                                        <span class="text-xl font-bold text-gray-800 md:text-2xl">Stock: <span class="text-md font-normal text-gray-600">{{ $product->stock }}</span></span>
                                        <span class="text-xl font-bold text-gray-800 md:text-2xl">Units Sold: <span class="text-md font-normal text-gray-600">{{ $product->units_sold }}</span></span>
                                    </div>
                                </div>
                                <!-- stock and sold info - end -->

                                <!-- product description - start -->
                                <div class="mb-6">
                                    <div class="flex items-center gap-2 text-gray-900">
                                        <svg class="h-6 w-6"fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19 4H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1Z"></path>
                                            <path d="M12 11h4"></path>
                                            <path d="M12 8h4"></path>
                                            <path d="M8 20V4"></path>
                                        </svg>
                                        <h3 class="text-lg font-bold">Product Description:</h3>
                                    </div>
                                    <p class="mt-2 text-gray-500">{{ $product->description }}</p>
                                </div>
                                <!-- product description - end -->

                                <!-- edit and delete buttons - start -->
                                <div class="flex gap-4">
                                    <a class="cursor-pointer rounded-lg border-b-[4px] border-blue-600 bg-blue-500 px-6 py-2 text-white transition-all hover:-translate-y-[1px] hover:border-b-[6px] hover:brightness-110 active:translate-y-[2px] active:border-b-[2px] active:brightness-90" href="{{ route('products.edit', $product->id) }}">
                                        Edit Product
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button type="submit">Delete Product</x-danger-button>
                                    </form>
                                </div>
                                <!-- edit and delete buttons - end -->
                            </div>
                            <!-- content - end -->
                        </div>

                        <hr class="my-6 border-gray-200" />

                        <!-- product technical details - start -->
                        <div class="mt-6">
                            <div class="flex items-center gap-2 text-gray-500">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 17h10"></path>
                                    <path d="M5 17h.002v.002H5V17Z"></path>
                                    <path d="M9 12h10"></path>
                                    <path d="M5 12h.002v.002H5V12Z"></path>
                                    <path d="M9 7h10"></path>
                                    <path d="M5 7h.002v.002H5V7Z"></path>
                                </svg>
                                <h3 class="text-lg font-semibold">Technical Details:</h3>
                            </div>
                            <ul class="ml-12 mt-2 list-inside list-disc text-gray-500">

                                <li>Store Name: {{ $product->store->name }} </li>
                                <li>Discount: {{ $product->discount }} </li>
                                <li>Discount Type: {{ $product->discount_type }} </li>
                                <li>Available: {{ $product->available }} </li>
                                <li>Measure: {{ $product->measure }} </li>
                                <li>Sold By: {{ $product->sold_by }} </li>

                            </ul>
                        </div>
                        <!-- product technical details - end -->

                        <hr class="my-6 border-gray-200" />

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

                </div>
            @endif
        </div>
    </div>
</x-app-layout>
