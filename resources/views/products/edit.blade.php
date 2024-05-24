<x-app-layout>
    <div class="flex w-full justify-normal gap-5">
        {{-- Sidebar --}}
        @include('store.partials.sidenav')

        {{-- Content --}}
        <div class="flex w-full flex-col flex-wrap gap-x-6 gap-y-10 py-10 pr-6">
            <h1 class="mb-4 text-3xl font-bold">Edit Product</h1>
            <x-neomorphic-form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="flex w-full flex-row items-center justify-center space-x-2">
                    <div class="mb-4 w-full">
                        <label class="block text-sm font-medium text-gray-700" for="name">Product Name</label>
                        <x-neomorphic-form.input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm" id="name" name="name" type="text">
                        </x-neomorphic-form.input>
                        @error('name')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 w-full">
                        <label class="block text-sm font-medium text-gray-700" for="category_id">Category</label>
                        <x-neomorphic-form.select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm" id="category_id" name="category_id">
                            <!-- Populate with categories from the database -->
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </x-neomorphic-form.select>
                        @error('category_id')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex h-auto w-full flex-row items-center justify-center space-x-2">
                    <div class="mb-4 w-full">
                        <div class="mr-4">
                            <img class="h-24 w-24 rounded-lg object-cover" id="main_image" src="{{ $product->photo_main ? asset('storage/products/' . $product->photo_main) : 'https://via.placeholder.com/150' }}" alt="Main Photo">
                        </div>
                        <label class="block text-sm font-medium text-gray-700" for="photo_main">Product Image 1</label>
                        <x-neomorphic-form.input class="mt-1 block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none" id="photo_main" name="photo_main" type="file">
                        </x-neomorphic-form.input>
                        @error('photo_main')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 w-full">
                        <div class="mr-4">
                            <img class="h-24 w-24 rounded-lg object-cover" id="photo1_image" src="{{ $product->photo_1 ? asset('storage/products/' . $product->photo_1) : 'https://via.placeholder.com/150' }}" alt="Photo 1">
                        </div>
                        <label class="block text-sm font-medium text-gray-700" for="photo_1">Product Image 2</label>
                        <x-neomorphic-form.input class="mt-1 block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none" id="photo_1" name="photo_1" type="file">
                        </x-neomorphic-form.input>
                        @error('photo_1')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 w-full">
                        <div class="mr-4">
                            <img class="h-24 w-24 rounded-lg object-cover" id="photo2_image" src="{{ $product->photo_2 ? asset('storage/products/' . $product->photo_2) : 'https://via.placeholder.com/150' }}" alt="Photo 2">
                        </div>
                        <label class="block text-sm font-medium text-gray-700" for="photo_2">Product Image 3</label>
                        <x-neomorphic-form.input class="mt-1 block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none" id="photo_2" name="photo_2" type="file">
                        </x-neomorphic-form.input>
                        @error('photo_2')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex w-full flex-row items-center justify-center space-x-2">
                    <div class="mb-4 w-full">
                        <label class="block text-sm font-medium text-gray-700" for="price">Price</label>
                        <x-neomorphic-form.input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm" id="price" name="price" type="number" step="0.01" />
                        @error('price')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 w-full">
                        <label class="block text-sm font-medium text-gray-700" for="discount">Discount</label>
                        <x-neomorphic-form.input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm" id="discount" name="discount" type="number" step="0.01" />
                        @error('discount')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 w-full">
                        <label class="block text-sm font-medium text-gray-700" for="discount_type">Discount Type</label>
                        <x-neomorphic-form.select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm" id="discount_type" name="discount_type">
                            <option value="percentage">Percentage</option>
                            <option value="fixed">Fixed</option>
                        </x-neomorphic-form.select>
                        @error('discount_type')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700" for="description">Description</label>
                    <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm" id="description" name="description"></textarea>
                    @error('description')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex w-full flex-row items-center justify-center space-x-2">
                    <div class="mb-4 w-full">
                        <label class="block text-sm font-medium text-gray-700" for="stock">Stock</label>
                        <x-neomorphic-form.input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm" id="stock" name="stock" type="number" />
                        @error('stock')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4 w-full">
                        <label class="block text-sm font-medium text-gray-700" for="measure">Measure</label>
                        <x-neomorphic-form.input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm" id="measure" name="measure" type="text" />
                        @error('measure')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 w-full">
                        <label class="block text-sm font-medium text-gray-700" for="sold_by">Sold By</label>
                        <x-neomorphic-form.select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm" id="sold_by" name="sold_by">
                            @foreach ($soldby as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </x-neomorphic-form.select>
                        @error('sold_by')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                <div class="flex justify-end">
                    <button class="inline-flex justify-center rounded-md border border-transparent bg-indigo-700 px-4 py-2 text-sm font-medium text-white shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" type="submit">Update Product</button>
                </div>
            </x-neomorphic-form>
        </div>
    </div>

    <script>
        document.getElementById('photo_main').addEventListener('change', function(event) {
            const [file] = event.target.files;
            if (file) {
                document.getElementById('main_image').src = URL.createObjectURL(file);
            }
        });

        document.getElementById('photo_1').addEventListener('change', function(event) {
            const [file] = event.target.files;
            if (file) {
                document.getElementById('photo1_image').src = URL.createObjectURL(file);
            }
        });

        document.getElementById('photo_2').addEventListener('change', function(event) {
            const [file] = event.target.files;
            if (file) {
                document.getElementById('photo2_image').src = URL.createObjectURL(file);
            }
        });
    </script>
</x-app-layout>
