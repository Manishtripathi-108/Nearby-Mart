<x-app-layout>
    <div class="flex justify-center items-center">
        <div class="flex flex-col max-w-3xl p-6 space-y-4 sm:p-10">
            <h2 class="text-xl font-semibold text-blue-600 ">Your cart</h2>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <ul class="flex flex-col divide-y">
                @if($cartItems->count() == 0)
                <li class="flex flex-col py-6 sm:flex-row sm:justify-between">
                    <h1 class="font-semibold text-xl"> No item in your cart</h1>
                </li>
                @else

                @foreach($cartItems as $item)
                @include('partials.cart_item', ['item' => $item])
                @endforeach

                @endif

            </ul>
            <div class="space-y-1 text-right">
                <p>Total amount:
                    <span class="font-semibold">
                        @include('cart.partials.cart_total', ['total' => $cartItems->sum(function($item) {
                        return $item->product->price * $item->quantity;
                        })])
                    </span>
                </p>
                <p class="text-sm">Not including taxes and shipping costs</p>
            </div>
            <div class="flex justify-end space-x-4">

                <a href="{{ route('cart.checkout') }}" class="px-6 py-2 border rounded-md">
                    <span class="sr-only sm:not-sr-only">Continue to</span>Checkout
                </a>
            </div>
        </div>
    </div>

</x-app-layout>