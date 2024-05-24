<x-table class="w-[70%]" title="Best Selling products" viewAllLink="true" link="">
    <x-slot:thead>
        <x-table.th>Product</x-table.th>
        <x-table.th>Selling Price</x-table.th>
        <x-table.th>Profit</x-table.th>
        <x-table.th>Sold Units</x-table.th>
        <x-table.th>Stock</x-table.th>
    </x-slot:thead>

    @foreach ($products as $product)
        <x-table.tr>

            @php
                // calcualting Selling Price
                if ($product->discount_type == 'Percentage') {
                    $sellingPrice = $product->price - ($product->price * $product->discount) / 100;
                } elseif ($product->discount_type == 'Fixed') {
                    $sellingPrice = $product->price - $product->discount;
                }

                // set Status based on stock
                if ($product->stock == 0) {
                    $product->stock = 'Out of Stock';
                    $status = 'red';
                    $statusColor = '';
                } elseif ($product->stock < 5) {
                    $status = $product->stock;
                    $statusColor = 'yellow';
                } else {
                    $status = $product->stock;
                    $statusColor = '';
                }

            @endphp

            <x-table.td type='1' stars='{{ $product->rating }}' imageUrl="{{ asset('products/' . $product->photo_main) }}">{{ $product->name }}</x-table.td>
            <x-table.td>₹{{ $product->price }}</x-table.td>
            <x-table.td>₹{{ $product->profit }}</x-table.td>
            <x-table.td>{{ $product->units_sold }}</x-table.td>
            <x-table.td type="2" :status="$status" :statusColor="$statusColor"></x-table.td>
        </x-table.tr>
    @endforeach
</x-table>
