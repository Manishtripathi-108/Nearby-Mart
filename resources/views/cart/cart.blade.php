<x-app-layout>
    @if ($cartItems->isEmpty())
        <x-not-found title=" " :backUrl="route('home')" :buttonName="'Go shopping'">
            Your cart is empty!
        </x-not-found>
    @else
        <div class="bg-white py-6 sm:py-8 lg:py-12">
            <div class="mx-auto max-w-screen-lg px-4 md:px-8">
                <div class="mb-6 sm:mb-10 lg:mb-16">
                    <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">Your Cart</h2>
                </div>

                <div class="mb-6 flex flex-col gap-4 sm:mb-8 md:gap-6">

                    <!-- items - start -->
                    @foreach ($cartItems as $item)
                        @include('cart.partials.cart_item', ['item' => $item])
                    @endforeach
                    <!-- items - end -->

                </div>

                <!-- totals - start -->
                @include('cart.partials.cart_total')
                <!-- totals - end -->
            </div>
        </div>
    @endif
</x-app-layout>
