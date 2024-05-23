<x-app-layout>
    <div class="flex w-full justify-normal gap-5">
        {{-- Sidebar --}}
        @include('store.partials.sidenav')

        {{-- Content --}}
        <div class="flex w-full flex-col flex-wrap gap-x-6 gap-y-10 py-10 pr-6">
            <h1 class="text-3xl font-bold mb-4">Add Product</h1>
            <x-neomorphic-form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="flex flex-row w-full space-x-2 justify-center items-center">
                    <div class="mb-4 w-full">
                        <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                        <x-neomorphic-form.input type="text" id="name" name="name"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm  sm:text-sm">
                        </x-neomorphic-form.input>
                        @error('name')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 w-full">
                        <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                        <x-neomorphic-form.select id="category_id" name="category_id"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm   sm:text-sm">
                            <!-- Populate with categories from the database -->
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </x-neomorphic-form.select>
                        @error('category_id')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>



                <div class="w-full flex flex-row justify-center items-center h-auto space-x-2">
                    <div class="mb-4 w-full">
                        <div class="mr-4">
                            <img id="main_image" src="https://via.placeholder.com/150" alt="Main Photo"
                                class="h-24 w-24 rounded-lg object-cover">
                        </div>
                        <label for="photo_main" class="block text-sm font-medium text-gray-700">Product Image 1</label>
                        <x-neomorphic-form.input type="file" id="photo_main" name="photo_main"
                            class="mt-1 block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none">
                        </x-neomorphic-form.input>
                        @error('photo_main')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 w-full">
                        <div class="mr-4">
                            <img id="photo1_image" src="https://via.placeholder.com/150" alt="Photo 1"
                                class="h-24 w-24 rounded-lg object-cover">
                        </div>
                        <label for="photo_1" class="block text-sm font-medium text-gray-700">Product Image 2</label>
                        <x-neomorphic-form.input type="file" id="photo_1" name="photo_1"
                            class="mt-1 block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none">
                        </x-neomorphic-form.input>
                        @error('photo_1')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 w-full">
                        <div class="mr-4">
                            <img id="photo2_image" src="https://via.placeholder.com/150" alt="Photo 2"
                                class="h-24 w-24 rounded-lg object-cover">
                        </div>
                        <label for="photo_2" class="block text-sm font-medium text-gray-700">Product Image 3</label>
                        <x-neomorphic-form.input type="file" id="photo_2" name="photo_2"
                            class="mt-1 block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none">
                        </x-neomorphic-form.input>
                        @error('photo_2')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-row w-full space-x-2 justify-center items-center">
                    <div class="mb-4 w-full">
                        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                        <x-neomorphic-form.input type="number" step="0.01" id="price" name="price"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm  sm:text-sm" />
                        @error('price')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 w-full">
                        <label for="discount" class="block text-sm font-medium text-gray-700">Discount</label>
                        <x-neomorphic-form.input type="number" step="0.01" id="discount" name="discount"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm  sm:text-sm" />
                        @error('discount')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 w-full">
                        <label for="discount_type" class="block text-sm font-medium text-gray-700">Discount Type</label>
                        <x-neomorphic-form.select id="discount_type" name="discount_type"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm  sm:text-sm">
                            <option value="percentage">Percentage</option>
                            <option value="fixed">Fixed</option>
                        </x-neomorphic-form.select>
                        @error('discount_type')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm"></textarea>
                    @error('description')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-row w-full space-x-2 justify-center items-center">
                    <div class="mb-4 w-full">
                        <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                        <x-neomorphic-form.input type="number" id="stock" name="stock"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm  sm:text-sm"/>
                        @error('stock')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4 w-full">
                        <label for="measure" class="block text-sm font-medium text-gray-700">Measure</label>
                        <x-neomorphic-form.input type="text" id="measure" name="measure"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm  sm:text-sm" />
                            @error('measure')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                    </div>

                    <div class="mb-4 w-full">
                        <label for="sold_by" class="block text-sm font-medium text-gray-700">Sold By</label>
                        <x-neomorphic-form.select id="sold_by" name="sold_by"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm  sm:text-sm">
                            @foreach ($soldby as $item )
                            <option value="{{$item}}">{{$item}}</option>
                            @endforeach
                        </x-neomorphic-form.select>
                        @error('sold_by')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                <button type="submit"
                    class="mt-4 mb-8 w-full rounded-md bg-gray-900 px-6 py-3 font-medium text-white">Add
                    Product</button>
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