<x-app-layout>
    <div class="flex flex-col justify-around items-center md:flex-row-reverse ">

        <div class="flex-1 flex-col h-auto w-full ">
            <!--user profile-->
            <div class="flex-1 flex-col h-auto m-10 p-3 rounded-lg border-2  space-y-4">
                <div class="flex justify-center  items-end ">
                    <div class="w-24 h-auto m-2 p-2 rounded-full">
                        <img src="" alt="user" class="h-cover w-full bg-blend-screen rounded-full">
                    </div>
                </div>
                <div class="flex justify-center items-center">
                    <h2 class="text-2xl font-bold">{{auth()->user()->name}}</h2>
                </div>
                <div class="flex justify-center items-center">
                    <p class="text-sm">{{auth()->user()->email}}</p>
                    <p class="text-sm">{{auth()->user()->phone}}</p>
                </div>
            </div>

            <!--other Accounts-->
            <div class="flex-1 flex-col justify-center items-center h-auto m-10 p-3  space-y-4 border-2 rounded-lg ">
                <h2 class="text-blue-400 text-2xl font-bold">Other Accounts</h2>
                <a href="/create-seller">
                    <p class="text-gray-700">Seller Accout</p>
                </a>
            </div>
        </div>


        <div class="flex-2 flex-col h-auto w-full m-10 p-3 justify-center item-center space-y-4 md:w-1/4">

            <!--Your profile-->
            <a href="{{route('edit.profile')}}">
                <div
                    class="flex justify-center flex-row h-30 w-full  border-2 rounded-lg items-center transition eas-in-out delay-2  hover:border-3 hover:border-blue-400">
                    <div class="w-24 h-auto m-2 p-2 ">
                        <img src="{{ asset('images/profile/profile-edit.jpeg') }}" alt="user"
                            class="h-cover w-full bg-blend-screen ">
                    </div>
                    <div class="flex-col justify-center items-center">
                        <h2 class="text-2xl font-bold">Edit Profile</h2>
                        <p class="text-sm">Edit your personal details</p>
                    </div>
                </div>
            </a>


            <!--Your order-->
            <div
                class="flex justify-center flex-row h-30 w-full  border-2 rounded-lg items-center transition eas-in-out delay-2  hover:border-3 hover:border-blue-400">
                <div class="w-24 h-auto m-2 p-2">
                    <img src="{{ asset('images/profile/delivery-box.jpeg') }}" alt="user"
                        class="h-cover w-full bg-blend-screen">
                </div>
                <div class="flex-col justify-center items-center">
                    <h2 class="text-2xl font-bold">Your Orders</h2>
                    <p class="text-sm">Check your orders status</p>
                </div>
            </div>

            <!--Your wishlist-->
            <div
                class="flex justify-center flex-row h-30 w-full  border-2 rounded-lg items-center transition eas-in-out delay-2  hover:border-3 hover:border-blue-400">
                <div class="w-24 h-auto m-2 p-2">
                    <img src="{{ asset('images/profile/wish-list.jpeg') }}" alt="user"
                        class="h-cover w-full bg-blend-screen">
                </div>
                <div class="flex-col justify-center items-center">
                    <h2 class="text-2xl font-bold">Your Wishlist</h2>
                    <p class="text-sm">Create / Check your wishlist</p>
                </div>
            </div>

            <!--Your location-->
            <div
                class="flex justify-center flex-row h-30 w-full  border-2 rounded-lg items-center transition eas-in-out delay-2  hover:border-3 hover:border-blue-400">
                <div class="w-24 h-auto m-2 p-2">
                    <img src="{{ asset('images/profile/location.jpeg') }}" alt="user"
                        class="h-cover w-full bg-blend-screen">
                </div>
                <div class="flex-col justify-center items-center">
                    <h2 class="text-2xl font-bold">Your Address</h2>
                    <pfass="text-sm">Edit your address for orders and gifts</p>
                </div>
            </div>

            <!--user seller accout if have-->
            @if(Auth()->check())
            <!-- seller account-->
            @if(auth()->user()->role == 'Store-owner')
            <div
                class="flex justify-center flex-row h-30 w-full  border-2 rounded-lg items-center transition eas-in-out delay-2  hover:border-3 hover:border-blue-400">
                <div class="w-24 h-auto m-2 p-2">
                    <img src="{{ asset('images/profile/store.jpeg') }}" alt="user"
                        class="h-cover w-full bg-blend-screen">
                </div>
                <div class="flex-col justify-center items-center">
                    <h2 class="text-2xl font-bold">Your Store</h2>
                    <p class="text-sm">Add more products in your digital store</p>
                </div>
            </div>

            @endif

            @endif
        </div>
    </div>

    <!--related viewed poducts-->
    <div class="  flex flex-col h-auto  space-y-4 ">
        <h2 class="text-2xl font-bold p-2 ml-8">Related to items you viewed</h2>
        <!--product card-slider-->
        <div class="hidden relative flex-col md:flex flex-nowrap space-x-4 items-center justify-evenly m-8 ">
            <!--left slider-button-->
            <div class="flex absolute left-2 top-1/2 transform -translate-y-1/2 items-center">
                <button id="prev" class="bg-gray-800 text-white rounded-full w-8 h-8 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
            </div>

            <!--right slider-button-->
            <div class="flex absolute right-2 top-1/2 transform -translate-y-1/2 items-center">
                <button id="next" class="bg-gray-800 text-white rounded-full w-8 h-8 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            <!--product cards-->



        </div>


        <!--search history-->
        <div class="  flex flex-col h-auto  space-y-4 ">
            <h2 class="text-2xl font-bold p-2 ml-8">Your search history</h2>
            <!--product card-slider-->
            <div class="hidden relative flex-col md:flex flex-nowrap space-x-4 items-center justify-evenly m-8 ">
                <!--left slider-button-->
                <div class="flex absolute left-2 top-1/2 transform -translate-y-1/2 items-center">
                    <button id="prev"
                        class="bg-gray-800 text-white rounded-full w-8 h-8 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                </div>

                <!--right slider-button-->
                <div class="flex absolute right-2 top-1/2 transform -translate-y-1/2 items-center">
                    <button id="next"
                        class="bg-gray-800 text-white rounded-full w-8 h-8 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>

                <!--product cards-->



            </div>

</x-app-layout>