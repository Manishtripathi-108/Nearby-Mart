<x-app-layout>
    <div class="flex w-full justify-normal gap-5">
        {{-- Sidebar --}}
        @include('store.partials.sidenav')

        {{-- Content --}}
        <div class="flex w-full flex-col flex-wrap gap-x-6 gap-y-10 py-10 pr-6">
            <x-neomorphic-form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">

                <h2 class="mb-12 text-center text-2xl font-bold">Add New Product</h2>

                @csrf

                <div class="my-4 flex h-auto w-full flex-row items-center justify-center space-x-2">
                    <div class="flex w-full flex-col items-center justify-center">
                        <div class="mr-4">
                            <img class="h-24 w-24 rounded-lg object-cover" id="main_image" src="https://via.placeholder.com/150" alt="Main Photo">
                        </div>
                        <div>
                            <x-neomorphic-form.label for="photo_main">Product Image 1</x-neomorphic-form.label>
                            <x-neomorphic-form.input id="photo_main" name="photo_main" type="file" />
                            @error('photo_main')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4 flex w-full flex-col items-center justify-center">
                        <div class="mr-4">
                            <img class="h-24 w-24 rounded-lg object-cover" id="photo1_image" src="https://via.placeholder.com/150" alt="Photo 1">
                        </div>
                        <div>
                            <x-neomorphic-form.label for="photo_1">Product Image 2</x-neomorphic-form.label>
                            <x-neomorphic-form.input id="photo_1" name="photo_1" type="file" />
                            @error('photo_1')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4 flex w-full flex-col items-center justify-center">
                        <div class="mr-4">
                            <img class="h-24 w-24 rounded-lg object-cover" id="photo2_image" src="https://via.placeholder.com/150" alt="Photo 2">
                        </div>
                        <div>
                            <x-neomorphic-form.label for="photo_2">Product Image 3</x-neomorphic-form.label>
                            <x-neomorphic-form.input id="photo_2" name="photo_2" type="file" />
                            @error('photo_2')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="m-4">
                    <x-neomorphic-form.label for="name">Product Name</x-neomorphic-form.label>
                    <x-neomorphic-form.input class="w-full" id="name" name="name" type="text" />
                    @error('name')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex w-full flex-row items-center justify-center space-x-2">
                    <div class="mb-4 w-full">
                        <x-neomorphic-form.label for="store_id">Store</x-neomorphic-form.label>
                        <x-neomorphic-form.select class="w-full" id="store_id" name="store_id">

                            <option value=""> Select Store </option>
                            @foreach ($stores as $store)
                                <option value="{{ $store->id }}">{{ $store->name }}</option>
                            @endforeach

                        </x-neomorphic-form.select>
                        @error('store_id')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 w-full">
                        <x-neomorphic-form.label for="category_id">Category</x-neomorphic-form.label>
                        <x-neomorphic-form.select class="w-full" id="category_id" name="category_id">

                            <option value=""> Select Category </option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach

                        </x-neomorphic-form.select>
                        @error('category_id')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex w-full flex-row items-center justify-center space-x-2">
                    <div class="mb-4 w-full">
                        <x-neomorphic-form.label for="price">Price</x-neomorphic-form.label>
                        <x-neomorphic-form.input class="w-full" id="price" name="price" type="number" step="0.01" />
                        @error('price')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 w-full">
                        <x-neomorphic-form.label for="discount">Discount</x-neomorphic-form.label>
                        <x-neomorphic-form.input class="w-full" id="discount" name="discount" type="number" step="0.01" />
                        @error('discount')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 w-full">
                        <x-neomorphic-form.label for="discount_type">Discount Type</x-neomorphic-form.label>
                        <x-neomorphic-form.select class="w-full" id="discount_type" name="discount_type">
                            <option value="Percentage">Percentage</option>
                            <option value="Fixed">Fixed</option>
                        </x-neomorphic-form.select>
                        @error('discount_type')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <x-neomorphic-form.label for="description">Description</x-neomorphic-form.label>
                    <x-neomorphic-form.textarea class="w-full" id="description" name="description" />
                    @error('description')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex w-full flex-row items-center justify-center space-x-2">
                    <div class="mb-4 w-full">
                        <x-neomorphic-form.label for="stock">Stock</x-neomorphic-form.label>
                        <x-neomorphic-form.input class="w-full" id="stock" name="stock" type="number" />
                        @error('stock')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 w-full">
                        <x-neomorphic-form.label for="measure">Measure</x-neomorphic-form.label>
                        <x-neomorphic-form.input class="w-full" id="measure" name="measure" type="text" />
                        @error('measure')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 w-full">
                        <x-neomorphic-form.label for="sold_by">Sold By</x-neomorphic-form.label>
                        <x-neomorphic-form.select class="w-full" id="sold_by" name="sold_by">
                            @foreach ($soldBy as $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                            @endforeach
                        </x-neomorphic-form.select>
                        @error('sold_by')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <x-primary-button class="w-full" type="submit" buttonAttributes="mt-8 w-full">Add Product</x-primary-button>

            </x-neomorphic-form>
        </div>
    </div>

    @push('scripts')
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
    @endpush
</x-app-layout>
