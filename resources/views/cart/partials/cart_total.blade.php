<form action="{{ route('checkout.index') }}" method="GET">
    @csrf
    <div class="flex flex-col items-end gap-4">
        <div class="w-full rounded-lg bg-gray-100 p-4 sm:max-w-xs">
            <div class="space-y-1">
                <div class="flex justify-between gap-4 text-gray-500">
                    <span>Subtotal</span>
                    <span>
                        ₹{{ $cartItems->sum(function ($item) {
                            return $item->product->price * $item->quantity;
                        }) }}
                    </span>
                </div>

                <div class="flex justify-between gap-4 text-gray-500">
                    <span>Shipping</span>
                    <span>₹4.99</span>
                </div>
            </div>

            <div class="mt-4 border-t pt-4">
                <div class="flex items-start justify-between gap-4 text-gray-800">
                    <span class="text-lg font-bold">Total</span>

                    <span class="flex flex-col items-end">
                        <span class="text-lg font-bold">₹
                            {{ $cartItems->sum(function ($item) {
                                return $item->product->price * $item->quantity;
                            }) + 4.99 }}
                        </span>
                        <span class="text-sm text-gray-500">including GST</span>
                    </span>
                </div>
            </div>
        </div>

        <button class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base" type="submit">Check out</button>
    </div>
</form>
