
<x-app-layout>
    <div class="flex w-full justify-normal gap-5">
        {{-- Sidebar --}}
        @include('store.partials.sidenav')

        {{-- Content --}}
        <div class="flex w-full flex-col flex-wrap gap-x-6 gap-y-10 py-10 pr-6">
            <h1 class="text-2xl font-bold mb-4">Edit Product</h1>
            <x-neomorphic-form action="{{ route('products.update', [$store, $product]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                    <x-neomorphic-form.select id="category_id" name="category_id"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </x-neomorphic-form.select>
                    @error('category_id')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                    <x-neomorphic-form.input type="text" id="name" name="name" value="{{ $product->name }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </x-neomorphic-form.input>
                    @error('name')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full flex flex-row justify-center items-center h-auto space-x-2">
                    <div class="mb-4 w-full ">
                        <div class="mr-4">
                            <img id="main_image"
                                src="{{ $product->photo_main ? asset('storage/products/' . $product->photo_main) : 'https://via.placeholder.com/150' }}"
                                alt="Main Photo" class="h-24 w-24 rounded-lg object-cover">
                        </div>
                        <label for="photo_main" class="block text-sm font-medium text-gray-700">Main Photo</label>
                        <x-neomorphic-form.input type="file" id="photo_main" name="photo_main"
                            class="mt-1 block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none">
                        </x-neomorphic-form.input>
                        @error('photo_main')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 w-full">
                        <div class="mr-4">
                            <img id="photo1_image"
                                src="{{ $product->photo_1 ? asset('storage/products/' . $product->photo_1) : 'https://via.placeholder.com/150' }}"
                                alt="Photo 1" class="h-24 w-24 rounded-lg object-cover">
                        </div>
                        <label for="photo_1" class="block text-sm font-medium text-gray-700">Photo 1</label>
                        <x-neomorphic-form.input type="file" id="photo_1" name="photo_1"
                            class="mt-1 block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none">
                        </x-neomorphic-form.input>
                        @error('photo_1')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 w-full">
                        <div class="mr-4">
                            <img id="photo2_image"
                                src="{{ $product->photo_2 ? asset('storage/products/' . $product->photo_2) : 'https://via.placeholder.com/150' }}"
                                alt="Photo 2" class="h-24 w-24 rounded-lg object-cover">
                        </div>
                        <label for="photo_2" class="block text-sm font-medium text-gray-700">Photo 2</label>
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
                        <input type="number" step="0.01" id="price" name="price" value="{{ $product->price }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        @error('price')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 w-full">
                        <label for="discount" class="block text-sm font-medium text-gray-700">Discount</label>
                        <input type="number" step="0.01" id="discount" name="discount" value="{{ $product->discount }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        @error('discount')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 w-full">
                        <label for="discount_type" class="block text-sm font-medium text-gray-700">Discount Type</label>
                        <select id="discount_type" name="discount_type"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option value="percentage" {{ $product->discount_type == 'percentage' ? 'selected' : '' }}>Percentage</option>
                            <option value="fixed" {{ $product->discount_type == 'fixed' ? 'selected' : '' }}>Fixed</option>
                        </select>
                        @error('discount_type')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $product->description }}</textarea>
                    @error('description')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                    <input type="number" id="stock" name="stock" value="{{ $product->stock }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @error('stock')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="units_sold" class="block text-sm font-medium text-gray-700">Units Sold</label>
                    <input type="number" id="units_sold" name="units_sold" value="{{ $product->units_sold }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @error('units_sold')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="measure" class="block text-sm font-medium text-gray-700">Measure</label>
                    <input type="text" id="measure" name="measure" value="{{ $product->measure }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @error('measure')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="sold_by" class="block text-sm font-medium text-gray-700">Sold By</label>
                    <input type="text" id="sold_by" name="sold_by" value="{{ $product->sold_by }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @error('sold_by')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="inline-flex justify-center rounded-md border border-transparent  py-2 px-4 text-sm font-medium text-white shadow-sm bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Update Product</button>
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
