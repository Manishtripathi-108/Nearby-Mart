<x-app-layout>
    <div class="flex flex-col items-center justify-start md:flex-row-reverse">

        <div class="h-auto w-full flex-1 flex-col">
            <!--user profile-->
            <div class="m-10 h-auto flex-1 flex-row space-y-4 rounded-lg border-2 p-3 justify-center items-center">
                <div class="flex items-center justify-center     ">
                    <div class="m-2 h-auto w-48 rounded-full p-2">
                        <img class="h-cover w-full rounded-full bg-blend-screen"
                            src="{{asset('/storage/Avatar/'.auth()->user()->profile_picture)}}" alt="user">
                    </div>
                </div>

                <div class="flex flex-col item-center justify-start">
                    <div class="flex items-center justify-center">
                        <h1 class="text-bold text-2xl">{{auth()->user()->name}}</h1>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <p class="text-sm">{{ auth()->user()->email }}</p>
                        <p class="text-sm">{{ auth()->user()->phone }}</p>
                    </div>
                </div>
            </div>


            <!-- payments , other Accounts contianer -->
            <div class="flex flex-col md:flex-row">
                <!--payments-->
                <div
                    class="m-10 flex h-auto w-full flex-col items-center justify-center space-y-4 rounded-lg border-2 bg-gray-200 p-3">
                    <h2 class="text-2xl font-bold text-gray-800">PAYMENTS</h2>
                    <a href="#">
                        <p class="font-semibold text-blue-400">Gift Cards</p>
                    </a>
                    <a href="#">
                        <p class="font-semibold text-blue-400">Saved Upi</p>
                    </a>
                    <a href="#">
                        <p class="font-semibold text-blue-400">Saved Cards</p>
                    </a>
                </div>

                <!--other Accounts-->
                <div
                    class="m-10 flex h-auto w-full flex-col items-center justify-start space-y-4 rounded-lg border-2 bg-gray-200 p-3">
                    <h2 class="text-2xl font-bold text-gray-800">OTHER AACOUNTS</h2>
                    <a href="/create-seller">
                        <p class="font-semibold text-blue-400">Seller Accout</p>
                    </a>
                </div>
            </div>

            <!--Your Stuff-->
            <div class="flex flex-col md:flex-row">
                <div
                    class="m-10 flex h-auto w-full flex-col items-center justify-center space-y-4 rounded-lg border-2 bg-gray-200 p-3">
                    <h2 class="text-2xl font-bold text-gray-800">YOUR STUFF</h2>
                    <a href="#">
                        <p class="font-semibold text-blue-400">Your Coupons</p>
                    </a>
                    <a href="#">
                        <p class="font-semibold text-blue-400">Your Reviews & Ratings</p>
                    </a>
                    <a href="#">
                        <p class="font-semibold text-blue-400">All Notifiactions</p>
                    </a>
                </div>
            </div>
        </div>

        <!--side buttons-->
        <div class="flex-2 m-10 h-auto w-full flex-col items-center justify-start space-y-4 p-3 md:w-1/4">

            <!--Your profile-->
            <div class="mt-2">
                <a href="{{ route('edit.profile') }}">
                    <div
                        class="h-30 eas-in-out delay-2 hover:border-3 flex w-full flex-row items-center justify-center rounded-lg border-2 transition hover:border-blue-400">
                        <div class="m-2 h-auto w-24 p-2">
                            <img class="h-cover w-full bg-blend-screen"
                                src="{{ asset('images/profile/profile-edit.jpeg') }}" alt="user">
                        </div>
                        <div class="flex-col items-center justify-center">
                            <h2 class="text-2xl font-bold">Edit Profile</h2>
                            <p class="text-sm">Edit your personal details</p>
                        </div>
                    </div>
                </a>
            </div>

            <!--Your order-->

            <div class="mt-2">
                <a href="{{ route('your-orders') }}">
                    <div
                        class="h-30 eas-in-out delay-2 hover:border-3 flex w-full flex-row items-center justify-center rounded-lg border-2 transition hover:border-blue-400">
                        <div class="m-2 h-auto w-24 p-2">
                            <img class="h-cover w-full bg-blend-screen"
                                src="{{ asset('images/profile/delivery-box.jpeg') }}" alt="user">
                        </div>
                        <div class="flex-col items-center justify-center">
                            <h2 class="text-2xl font-bold">Your Orders</h2>
                            <p class="text-sm">Check your orders status</p>
                        </div>
                    </div>
                </a>
            </div>


            <!--Your wishlist-->
            <div class="mt-2">
                <a href="{{route('wishlist')}}">
                    <div
                        class="h-30 eas-in-out delay-2 hover:border-3 flex w-full flex-row items-center justify-center rounded-lg border-2 transition hover:border-blue-400">
                        <div class="m-2 h-auto w-24 p-2">
                            <img class="h-cover w-full bg-blend-screen"
                                src="{{ asset('images/profile/wish-list.jpeg') }}" alt="user">
                        </div>
                        <div class="flex-col items-center justify-center">
                            <h2 class="text-2xl font-bold">Your Wishlist</h2>
                            <p class="text-sm">Create / Check your wishlist</p>
                        </div>
                    </div>
                </a>

            </div>
            <!--Your location-->
            <div class="mt-2">
                <a href="{{ route('addresses.index') }}">
                    <div
                        class="h-30 eas-in-out delay-2 hover:border-3 flex w-full flex-row items-center justify-center rounded-lg border-2 p-4 transition hover:border-blue-400">
                        <div class="m-2 h-auto w-20 p-2">
                            <img class="h-cover w-full bg-blend-screen"
                                src="{{ asset('images/profile/location.jpeg') }}" alt="user">
                        </div>
                        <div class="flex-col items-center justify-center">
                            <h2 class="text-2xl font-bold">Your Addresses</h2>
                            <p class="text-sm">Edit your address for orders and gifts</p>
                        </div>
                    </div>
                </a>
            </div>

            <!--user seller accout if have-->
            @if (Auth()->check())
            <!-- seller account-->
            @if (auth()->user()->user_type == 'Store Owner')
            <div class="mt-2">
                <a href="{{route('store.store')}}">
                    <div
                        class="h-30 eas-in-out delay-2 hover:border-3 flex w-full flex-row items-center justify-center rounded-lg border-2 transition hover:border-blue-400">
                        <div class="m-2 h-auto w-24 p-2">
                            <img class="h-cover w-full bg-blend-screen" src="{{ asset('images/profile/store.jpeg') }}"
                                alt="user">
                        </div>
                        <div class="flex-col items-center justify-center">
                            <h2 class="text-2xl font-bold">Your Store</h2>
                            <p class="text-sm">Add more products in your digital store</p>
                        </div>
                    </div>
                </a>
            </div>
            @endif

            @endif
        </div>
        <!--end side buttons-->

    </div>

    
</x-app-layout>