<x-app-layout>
    <div class="flex w-full justify-normal gap-5">
        {{-- Sidebar --}}
        @include('store.partials.sidenav', ['page' => true])

        {{-- Content --}}
        <div class="flex w-full flex-col flex-wrap gap-x-6 gap-y-10 py-10 pr-6">
            <div class="border-2 bg-blue-100 rounded-lg mt-10 flex flex-col items-start justify-start space-y-4 py-8 px-4 sm:flex-row sm:space-y-0 lg:px-0">
                <div class="max-w-lg px-4">
                    <h1 class="text-3xl font-bold text-gray-800">{{$store->name}}</h1>
                    <p class="mt-2 text-gray-700">Email: {{$store->email}}</p>
                    <p class="mt-2 text-gray-700">Phone: {{$store->phone}}</p>
                </div>
            </div>

            {{-- Category Filter --}}
            <div class="my-4">
                <form method="GET" action="{{ route('store.products', $store->id) }}">
                    <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Filter by Category</label>
                    <select id="category" name="category" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-2">Filter</button>
                </form>
            </div>

            <main class="grid grid-cols-2 gap-x-6 gap-y-10 px-2 pb-20 sm:grid-cols-3 sm:px-8 lg:mt-16 lg:grid-cols-4 lg:gap-x-4 lg:px-0">
                @foreach ($products as $product)
                    <article class="relative">
                        <div class="aspect-square overflow-hidden">
                            <img class="h-full w-full object-cover transition-all duration-300 group-hover:scale-125" src="/images/vxPx1IPRjSynYYiQve8vF.png" alt="" />
                        </div>
                        <div class="absolute top-0 m-1 rounded-full bg-white">
                            <p class="rounded-full bg-black p-1 text-[10px] font-bold uppercase tracking-wide text-white sm:py-1 sm:px-3">Sale</p>
                        </div>
                        <div class="mt-4 flex items-start justify-between">
                            <div class="">
                                <h3 class="text-xs font-semibold sm:text-sm md:text-base">
                                    <a href="#" title="" class="">{{ $product->name }}</a>
                                </h3>
                                <div class="mt-2 flex items-center">
                                    <!-- Add stars or other product details here -->
                                </div>
                            </div>
                            <div class="text-right">
                                <del class="mt-px text-xs font-semibold text-gray-600 sm:text-sm">${{ $product->price }}</del>
                                <p class="text-xs font-normal sm:text-sm md:text-base">${{ $product->price - $product->discount }}</p>
                            </div>
                        </div>
                    </article>
                @endforeach
            </main>
        </div>
    </div>
</x-app-layout>
