<x-app-layout>
    <div class="flex flex-col justify-start items-center md:flex-row-reverse ">

        <div class="flex-1 flex-col h-auto w-full  ">
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


            <!-- payments , other Accounts contianer -->
            <div class="flex flex-col md:flex-row">
                <!--payments-->
                <div
                    class="w-full h-auto flex flex-col justify-center  items-center h-auto m-10 p-3  space-y-4 border-2 rounded-lg bg-gray-200 ">
                    <h2 class="text-gray-800 text-2xl font-bold">PAYMENTS</h2>
                    <a href="#">
                        <p class="text-blue-400 font-semibold">Gift Cards</p>
                    </a>
                    <a href="#">
                        <p class="text-blue-400 font-semibold">Saved Upi</p>
                    </a>
                    <a href="#">
                        <p class="text-blue-400 font-semibold">Saved Cards</p>
                    </a>
                </div>

                <!--other Accounts-->
                <div
                    class=" w-full h-auto flex flex-col justify-start  items-center h-auto m-10 p-3  space-y-4 border-2 rounded-lg bg-gray-200 ">
                    <h2 class="text-gray-800 text-2xl font-bold">OTHER AACOUNTS</h2>
                    <a href="/create-seller">
                        <p class="text-blue-400 font-semibold">Seller Accout</p>
                    </a>
                </div>
            </div>

            <!--Your Stuff-->
            <div class="flex flex-col md:flex-row ">
                <div
                    class="w-full h-auto flex flex-col justify-center  items-center h-auto m-10 p-3  space-y-4 border-2 rounded-lg bg-gray-200 ">
                    <h2 class="text-gray-800 text-2xl font-bold">YOUR STUFF</h2>
                    <a href="#">
                        <p class="text-blue-400 font-semibold">Your Coupons</p>
                    </a>
                    <a href="#">
                        <p class="text-blue-400 font-semibold">Your Reviews & Ratings</p>
                    </a>
                    <a href="#">
                        <p class="text-blue-400 font-semibold">All Notifiactions</p>
                    </a>
                </div>
            </div>
        </div>



        <!--side buttons-->
        <div class="flex-2 flex-col h-auto w-full m-10 p-3 justify-start items-center space-y-4 md:w-1/4">

            <!--Your profile-->
            <div>
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
            </div>


            <!--Your order-->
            <div>
            <a href="{{route('your-orders')}}">
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
            </a>
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
                class="flex justify-center p-4 flex-row h-30 w-full  border-2 rounded-lg items-center transition eas-in-out delay-2  hover:border-3 hover:border-blue-400">
                <div class="w-20 h-auto m-2 p-2">
                    <img src="{{ asset('images/profile/location.jpeg') }}" alt="user"
                        class="h-cover w-full bg-blend-screen">
                </div>
                <div class="flex-col justify-center items-center">
                    <h2 class="text-2xl font-bold">Your Addresses</h2>
                    <p class="text-sm ">Edit your address for orders and gifts</p>
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
        <!--end side buttons-->



    </div>

    <!--related viewed poducts-->
    <div class="  flex flex-col h-auto  space-y-4 ">
        <h2 class="text-2xl font-bold p-2 ml-8">Inspired by your browsing history</h2>
        <!--product card-slider-->
        <div class=" relative flex-col md:flex-row md:flex flex-nowrap space-x-4 items-center justify-evenly m-8 ">
            <!--left slider-button-->
            <div class="hidden md:flex absolute left-2 top-1/2 transform -translate-y-1/2 items-center">
                <button id="prev" class="bg-gray-800 text-white rounded-full w-8 h-8 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
            </div>

            <!--right slider-button-->
            <div class="hidden md:flex absolute right-2 top-1/2 transform -translate-y-1/2 items-center">
                <button id="next" class="bg-gray-800 text-white rounded-full w-8 h-8 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            <!--product cards-->
            <div class="bg-white py-6 sm:py-8 lg:py-12">
                <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                    <!-- text - start -->

                    <!-- text - end -->

                    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        <!-- product - start -->
                        <div>
                            <a href="#" class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100">
                                <img src="https://images.unsplash.com/photo-1552374196-1ab2a1c593e8?auto=format&q=75&fit=crop&crop=top&w=600&h=700"
                                    loading="lazy" alt="Photo by Austin Wade"
                                    class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />

                                <span
                                    class="absolute left-0 top-3 rounded-r-lg bg-red-500 px-3 py-1.5 text-sm font-semibold uppercase tracking-wider text-white">-50%</span>
                            </a>

                            <div class="flex items-start justify-between gap-2 rounded-b-lg bg-gray-100 p-4">
                                <div class="flex flex-col">
                                    <a href="#"
                                        class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg">Fancy
                                        Outfit</a>
                                    <span class="text-sm text-gray-500 lg:text-base">by Fancy Brand</span>
                                </div>

                                <div class="flex flex-col items-end">
                                    <span class="font-bold text-gray-600 lg:text-lg">$19.99</span>
                                    <span class="text-sm text-red-500 line-through">$39.99</span>
                                </div>
                            </div>
                        </div>
                        <!-- product - end -->

                        <!-- product - start -->
                        <div>
                            <a href="#" class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100">
                                <img src="https://images.unsplash.com/photo-1523359346063-d879354c0ea5?auto=format&q=75&fit=crop&crop=top&w=600&h=700"
                                    loading="lazy" alt="Photo by Nick Karvounis"
                                    class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                            </a>

                            <div class="flex items-start justify-between gap-2 rounded-b-lg bg-gray-100 p-4">
                                <div class="flex flex-col">
                                    <a href="#"
                                        class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg">Cool
                                        Outfit</a>
                                    <span class="text-sm text-gray-500 lg:text-base">by Cool Brand</span>
                                </div>

                                <div class="flex flex-col items-end">
                                    <span class="font-bold text-gray-600 lg:text-lg">$29.99</span>
                                </div>
                            </div>
                        </div>
                        <!-- product - end -->

                        <!-- product - start -->
                        <div>
                            <a href="#" class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100">
                                <img src="https://images.unsplash.com/photo-1548286978-f218023f8d18?auto=format&q=75&fit=crop&crop=top&w=600&h=700"
                                    loading="lazy" alt="Photo by Austin Wade"
                                    class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                            </a>

                            <div class="flex items-start justify-between gap-2 rounded-b-lg bg-gray-100 p-4">
                                <div class="flex flex-col">
                                    <a href="#"
                                        class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg">Nice
                                        Outfit</a>
                                    <span class="text-sm text-gray-500 lg:text-base">by Nice Brand</span>
                                </div>

                                <div class="flex flex-col items-end">
                                    <span class="font-bold text-gray-600 lg:text-lg">$35.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- product - end -->

                        <!-- product - start -->
                        <div>
                            <a href="#" class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100">
                                <img src="https://images.unsplash.com/photo-1566207274740-0f8cf6b7d5a5?auto=format&q=75&fit=crop&crop=top&w=600&h=700"
                                    loading="lazy" alt="Photo by Vladimir Fedotov"
                                    class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                            </a>

                            <div class="flex items-start justify-between gap-2 rounded-b-lg bg-gray-100 p-4">
                                <div class="flex flex-col">
                                    <a href="#"
                                        class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg">Lavish
                                        Outfit</a>
                                    <span class="text-sm text-gray-500 lg:text-base">by Lavish Brand</span>
                                </div>

                                <div class="flex flex-col items-end">
                                    <span class="font-bold text-gray-600 lg:text-lg">$49.99</span>
                                </div>
                            </div>
                        </div>
                        <!-- product - end -->
                    </div>
                </div>
            </div>


        </div>


        <!--search history-->
        <div class="  flex flex-col h-auto  space-y-4 ">
            <h2 class="text-2xl font-bold p-2 ml-8">Your browsing history</h2>
            <!--product card-slider-->
            <div class="hidden relative flex-row md:flex flex-nowrap space-x-4 items-center justify-evenly m-8 ">
                <!--left slider-button-->
                <div class="flex absolute left-2 top-1/2  transform -translate-y-1/2 items-center">
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
                <div class="bg-white py-6 sm:py-8 lg:py-12">
                    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                        <!-- text - start -->

                        <!-- text - end -->

                        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                            <!-- product - start -->
                            <div>
                                <a href="#" class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100">
                                    <img src="https://images.unsplash.com/photo-1552374196-1ab2a1c593e8?auto=format&q=75&fit=crop&crop=top&w=600&h=700"
                                        loading="lazy" alt="Photo by Austin Wade"
                                        class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />

                                    <span
                                        class="absolute left-0 top-3 rounded-r-lg bg-red-500 px-3 py-1.5 text-sm font-semibold uppercase tracking-wider text-white">-50%</span>
                                </a>

                                <div class="flex items-start justify-between gap-2 rounded-b-lg bg-gray-100 p-4">
                                    <div class="flex flex-col">
                                        <a href="#"
                                            class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg">Fancy
                                            Outfit</a>
                                        <span class="text-sm text-gray-500 lg:text-base">by Fancy Brand</span>
                                    </div>

                                    <div class="flex flex-col items-end">
                                        <span class="font-bold text-gray-600 lg:text-lg">$19.99</span>
                                        <span class="text-sm text-red-500 line-through">$39.99</span>
                                    </div>
                                </div>
                            </div>
                            <!-- product - end -->

                            <!-- product - start -->
                            <div>
                                <a href="#" class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100">
                                    <img src="https://images.unsplash.com/photo-1523359346063-d879354c0ea5?auto=format&q=75&fit=crop&crop=top&w=600&h=700"
                                        loading="lazy" alt="Photo by Nick Karvounis"
                                        class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                                </a>

                                <div class="flex items-start justify-between gap-2 rounded-b-lg bg-gray-100 p-4">
                                    <div class="flex flex-col">
                                        <a href="#"
                                            class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg">Cool
                                            Outfit</a>
                                        <span class="text-sm text-gray-500 lg:text-base">by Cool Brand</span>
                                    </div>

                                    <div class="flex flex-col items-end">
                                        <span class="font-bold text-gray-600 lg:text-lg">$29.99</span>
                                    </div>
                                </div>
                            </div>
                            <!-- product - end -->

                            <!-- product - start -->
                            <div>
                                <a href="#" class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100">
                                    <img src="https://images.unsplash.com/photo-1548286978-f218023f8d18?auto=format&q=75&fit=crop&crop=top&w=600&h=700"
                                        loading="lazy" alt="Photo by Austin Wade"
                                        class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                                </a>

                                <div class="flex items-start justify-between gap-2 rounded-b-lg bg-gray-100 p-4">
                                    <div class="flex flex-col">
                                        <a href="#"
                                            class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg">Nice
                                            Outfit</a>
                                        <span class="text-sm text-gray-500 lg:text-base">by Nice Brand</span>
                                    </div>

                                    <div class="flex flex-col items-end">
                                        <span class="font-bold text-gray-600 lg:text-lg">$35.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- product - end -->

                            <!-- product - start -->
                            <div>
                                <a href="#" class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100">
                                    <img src="https://images.unsplash.com/photo-1566207274740-0f8cf6b7d5a5?auto=format&q=75&fit=crop&crop=top&w=600&h=700"
                                        loading="lazy" alt="Photo by Vladimir Fedotov"
                                        class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                                </a>

                                <div class="flex items-start justify-between gap-2 rounded-b-lg bg-gray-100 p-4">
                                    <div class="flex flex-col">
                                        <a href="#"
                                            class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg">Lavish
                                            Outfit</a>
                                        <span class="text-sm text-gray-500 lg:text-base">by Lavish Brand</span>
                                    </div>

                                    <div class="flex flex-col items-end">
                                        <span class="font-bold text-gray-600 lg:text-lg">$49.99</span>
                                    </div>
                                </div>
                            </div>
                            <!-- product - end -->
                        </div>
                    </div>
                </div>


            </div>

</x-app-layout>