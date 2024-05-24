<x-app-layout>
    <div class="flex w-full justify-normal gap-5">
        {{-- Sidebar --}}
        @include('store.partials.sidenav')

        {{-- Content --}}
        <div class="flex w-full flex-col flex-wrap gap-x-6 gap-y-10 py-10 pr-6">
            {{-- Form for Adding/Updating Product --}}
            <x-neomorphic-form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                <h2 class="mb-12 text-center text-2xl font-bold">Edit Product</h2>

                @csrf
                @method('PUT')

                {{-- Product Images --}}
                <div class="my-4 flex h-auto w-full flex-row items-center justify-center space-x-2">
                    @php
                        $images = [['id' => 'main_image', 'name' => 'photo_main', 'label' => 'Product Image 1', 'src' => isset($product) && $product->photo_main ? asset('products/' . $product->photo_main) : 'https://via.placeholder.com/150'], ['id' => 'photo1_image', 'name' => 'photo_1', 'label' => 'Product Image 2', 'src' => isset($product) && $product->photo_1 ? asset('products/' . $product->photo_1) : 'https://via.placeholder.com/150'], ['id' => 'photo2_image', 'name' => 'photo_2', 'label' => 'Product Image 3', 'src' => isset($product) && $product->photo_2 ? asset('products/' . $product->photo_2) : 'https://via.placeholder.com/150']];
                    @endphp

                    @foreach ($images as $image)
                        <div class="flex w-full flex-col items-center justify-center">
                            <div class="mb-4">
                                <img class="h-24 w-24 rounded-lg object-cover" id="{{ $image['id'] }}" src="{{ old($image['name'], $image['src']) }}" alt="{{ $image['label'] }}">
                            </div>
                            <div>
                                <x-neomorphic-form.label for="{{ $image['name'] }}">{{ $image['label'] }}</x-neomorphic-form.label>
                                <x-neomorphic-form.input id="{{ $image['name'] }}" name="{{ $image['name'] }}" type="file" />
                                @error($image['name'])
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Product Name --}}
                <div class="m-4">
                    <x-neomorphic-form.label for="name">Product Name</x-neomorphic-form.label>
                    <x-neomorphic-form.input class="w-full" id="name" name="name" type="text" value="{{ old('name', $product->name ?? '') }}" />
                    @error('name')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Store and Category --}}
                <div class="flex w-full flex-row items-center justify-center space-x-2">
                    <div class="mb-4 w-full">
                        <x-neomorphic-form.label for="store_id">Store</x-neomorphic-form.label>
                        <x-neomorphic-form.select class="w-full" id="store_id" name="store_id">
                            <option value="">Select Store</option>
                            @foreach ($stores as $store)
                                <option value="{{ $store->id }}" {{ old('store_id', $product->store_id ?? '') == $store->id ? 'selected' : '' }}>{{ $store->name }}</option>
                            @endforeach
                        </x-neomorphic-form.select>
                        @error('store_id')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 w-full">
                        <x-neomorphic-form.label for="category_id">Category</x-neomorphic-form.label>
                        <x-neomorphic-form.select class="w-full" id="category_id" name="category_id">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </x-neomorphic-form.select>
                        @error('category_id')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Price, Discount, and Discount Type --}}
                <div class="flex w-full flex-row items-center justify-center space-x-2">
                    <div class="mb-4 w-full">
                        <x-neomorphic-form.label for="price">Price</x-neomorphic-form.label>
                        <x-neomorphic-form.input class="w-full" id="price" name="price" type="number" value="{{ old('price', $product->price ?? '') }}" step="0.01" />
                        @error('price')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 w-full">
                        <x-neomorphic-form.label for="discount">Discount</x-neomorphic-form.label>
                        <x-neomorphic-form.input class="w-full" id="discount" name="discount" type="number" value="{{ old('discount', $product->discount ?? '') }}" step="0.01" />
                        @error('discount')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 w-full">
                        <x-neomorphic-form.label for="discount_type">Discount Type</x-neomorphic-form.label>
                        <x-neomorphic-form.select class="w-full" id="discount_type" name="discount_type">
                            <option value="Percentage" {{ old('discount_type', $product->discount_type ?? '') == 'Percentage' ? 'selected' : '' }}>Percentage</option>
                            <option value="Fixed" {{ old('discount_type', $product->discount_type ?? '') == 'Fixed' ? 'selected' : '' }}>Fixed</option>
                        </x-neomorphic-form.select>
                        @error('discount_type')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Description --}}
                <div class="mb-4">
                    <x-neomorphic-form.label for="description">Description</x-neomorphic-form.label>
                    <x-neomorphic-form.textarea class="w-full" id="description" name="description">{{ old('description', $product->description ?? '') }}</x-neomorphic-form.textarea>
                    @error('description')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Stock, Measure, and Sold By --}}
                <div class="flex w-full flex-row items-center justify-center space-x-2">
                    <div class="mb-4 w-full">
                        <x-neomorphic-form.label for="stock">Stock</x-neomorphic-form.label>
                        <x-neomorphic-form.input class="w-full" id="stock" name="stock" type="number" value="{{ old('stock', $product->stock ?? '') }}" />
                        @error('stock')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 w-full">
                        <x-neomorphic-form.label for="measure">Measure</x-neomorphic-form.label>
                        <x-neomorphic-form.input class="w-full" id="measure" name="measure" type="number" value="{{ old('measure', $product->measure ?? '') }}" />
                        @error('measure')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 w-full">
                        <x-neomorphic-form.label for="sold_by">Sold By</x-neomorphic-form.label>
                        <x-neomorphic-form.select class="w-full" id="sold_by" name="sold_by">
                            @foreach ($soldBy as $value)
                                <option value="{{ $value }}" {{ old('sold_by', $product->sold_by ?? '') == $value ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </x-neomorphic-form.select>
                        @error('sold_by')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Submit Button --}}
                <x-primary-button class="w-full" type="submit" buttonAttributes="mt-8 w-full"> Update Product</x-primary-button>
            </x-neomorphic-form>
        </div>
    </div>

    @push('scripts')
        <script>
            // Preview Image on File Select
            function previewImage(inputId, imageId) {
                document.getElementById(inputId).addEventListener('change', function(event) {
                    const [file] = event.target.files;
                    if (file) {
                        document.getElementById(imageId).src = URL.createObjectURL(file);
                    }
                });
            }

            previewImage('photo_main', 'main_image');
            previewImage('photo_1', 'photo1_image');
            previewImage('photo_2', 'photo2_image');
        </script>
    @endpush
</x-app-layout>
