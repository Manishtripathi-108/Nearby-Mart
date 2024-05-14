<x-table title="Recent Orders" viewAllLink="true" link=" ">

    <x-slot:thead>
        <x-table.th>Product</x-table.th>
        <x-table.th>Unit Price</x-table.th>
        <x-table.th>Quantity</x-table.th>
        <x-table.th>Total Amount</x-table.th>
        <x-table.th>Status</x-table.th>
        <x-table.th>Confirmation</x-table.th>
    </x-slot:thead>

    @foreach ($storesWithOrderItems as $storeOrderItems)
        @if ($storeOrderItems->orderItems->count() > 0)
            @foreach ($storeOrderItems->orderItems as $storeOrderItem)
                <x-table.tr>
                    <x-table.td type="1" content="{{ $storeOrderItem->order_id }}" imageUrl="{{ $storeOrderItem->product->photo_main }}">{{ $storeOrderItem->product->name }}</x-table.td>
                    <x-table.td>₹{{ number_format($storeOrderItem->unit_price, 2) }}</x-table.td>
                    <x-table.td>{{ $storeOrderItem->quantity }}</x-table.td>
                    <x-table.td>₹{{ number_format($storeOrderItem->total_amount, 2) }}</x-table.td>
                    <x-table.td type="2" status="{{ $storeOrderItem->order_status }}"></x-table.td>

                    @if ($storeOrderItem->order_status == 'Processing')
                        <td class="px-4 py-3 text-xs">
                            <span wire:target="cancelOrder({{ $storeOrderItem->id }})" wire:loading.remove>
                                <div class="inline-flex items-center rounded-md shadow-sm" wire:target="confirmOrder({{ $storeOrderItem->id }})" wire:loading.remove>
                                    {{-- Confirm Button --}}
                                    <button class="hover:border-b-6 inline-flex cursor-pointer items-center space-x-1 rounded-l-lg border border-b-4 border-green-600 bg-green-400 px-3 py-1 text-sm font-medium text-white transition-all hover:-translate-y-1 hover:brightness-110 active:translate-y-2 active:border-b-2 active:brightness-90" wire:click="confirmOrder({{ $storeOrderItem->id }})" wire:loading.attr="disabled">
                                        <span>
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </span>
                                    </button>
                                    {{-- Cancel Button --}}
                                    <button class="hover:border-b-6 inline-flex cursor-pointer items-center space-x-1 rounded-r-lg border border-b-4 border-red-600 bg-red-400 px-3 py-1 text-sm font-medium text-white transition-all hover:-translate-y-1 hover:brightness-110 active:translate-y-2 active:border-b-2 active:brightness-90" wire:click="cancelOrder({{ $storeOrderItem->id }})" wire:loading.attr="disabled">
                                        <span>
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                            </span>

                            <button class="inline-flex w-[83px] cursor-pointer items-center rounded-lg border-b-4 border-green-600 bg-green-500 px-3 py-1 text-white transition-all" type="button" wire:loading wire:target="confirmOrder({{ $storeOrderItem->id }})">
                                <div class="mr-2 inline-block h-3 w-3 animate-spin rounded-full border-2 border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]" role="status">
                                    <span class="sr-only">confirming...</span>
                                </div>
                            </button>

                            <button class="inline-flex max-h-fit w-[83px] cursor-pointer items-center rounded-lg border-b-4 border-red-600 bg-red-500 px-3 py-1 text-white transition-all" type="button" wire:loading wire:target="cancelOrder({{ $storeOrderItem->id }})">
                                <div class="mr-2 inline-block h-3 w-3 animate-spin rounded-full border-2 border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]" role="status">
                                    <span class="sr-only">Cancelling...</span>
                                </div>
                            </button>

                        </td>
                    @endif
                </x-table.tr>
            @endforeach
        @endif
    @endforeach

</x-table>
