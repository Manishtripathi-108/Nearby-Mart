<x-app-layout>
    <div class="flex flex-col items-center justify-start md:flex-row-reverse">

        <div class="h-auto w-full flex-1 flex-col">
            <!--user profile-->
            <div class="m-10 h-auto flex-1 flex-col space-y-4 rounded-lg border-2 p-3">
                <div class="flex items-end justify-center">
                    <div class="m-2 h-auto w-24 rounded-full p-2">
                        <img class="h-cover w-full rounded-full bg-blend-screen" src="images/profile/Avatar/man-avatar.jpeg" alt="user">
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    <h2 class="text-2xl font-bold">{{ auth()->user()->name }}</h2>
                </div>
                <div class="flex items-center justify-center">
                    <p class="text-sm">{{ auth()->user()->email }}</p>
                    <p class="text-sm">{{ auth()->user()->phone }}</p>
                </div>
            </div>

            <!-- payments , other Accounts contianer -->
            <div class="flex flex-col md:flex-row">
                <!--payments-->
                <div class="m-10 flex h-auto w-full flex-col items-center justify-center space-y-4 rounded-lg border-2 bg-gray-200 p-3">
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
                <div class="m-10 flex h-auto w-full flex-col items-center justify-start space-y-4 rounded-lg border-2 bg-gray-200 p-3">
                    <h2 class="text-2xl font-bold text-gray-800">OTHER AACOUNTS</h2>
                    <a href="/create-seller">
                        <p class="font-semibold text-blue-400">Seller Accout</p>
                    </a>
                </div>
            </div>

            <!--Your Stuff-->
            <div class="flex flex-col md:flex-row">
                <div class="m-10 flex h-auto w-full flex-col items-center justify-center space-y-4 rounded-lg border-2 bg-gray-200 p-3">
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
            <div>
                <a href="{{ route('edit.profile') }}">
                    <div class="h-30 eas-in-out delay-2 hover:border-3 flex w-full flex-row items-center justify-center rounded-lg border-2 transition hover:border-blue-400">
                        <div class="m-2 h-auto w-24 p-2">
                            <img class="h-cover w-full bg-blend-screen" src="{{ asset('images/profile/profile-edit.jpeg') }}" alt="user">
                        </div>
                        <div class="flex-col items-center justify-center">
                            <h2 class="text-2xl font-bold">Edit Profile</h2>
                            <p class="text-sm">Edit your personal details</p>
                        </div>
                    </div>
                </a>
            </div>

            <!--Your order-->
            <div>
                <a href="{{ route('your-orders') }}">
                    <div class="h-30 eas-in-out delay-2 hover:border-3 flex w-full flex-row items-center justify-center rounded-lg border-2 transition hover:border-blue-400">
                        <div class="m-2 h-auto w-24 p-2">
                            <img class="h-cover w-full bg-blend-screen" src="{{ asset('images/profile/delivery-box.jpeg') }}" alt="user">
                        </div>
                        <div class="flex-col items-center justify-center">
                            <h2 class="text-2xl font-bold">Your Orders</h2>
                            <p class="text-sm">Check your orders status</p>
                        </div>
                    </div>
                </a>
            </div>

            <!--Your wishlist-->
            <div class="h-30 eas-in-out delay-2 hover:border-3 flex w-full flex-row items-center justify-center rounded-lg border-2 transition hover:border-blue-400">
                <div class="m-2 h-auto w-24 p-2">
                    <img class="h-cover w-full bg-blend-screen" src="{{ asset('images/profile/wish-list.jpeg') }}" alt="user">
                </div>
                <div class="flex-col items-center justify-center">
                    <h2 class="text-2xl font-bold">Your Wishlist</h2>
                    <p class="text-sm">Create / Check your wishlist</p>
                </div>
            </div>

            <!--Your location-->
            <a href="{{ route('address.index') }}">
                <div class="h-30 eas-in-out delay-2 hover:border-3 flex w-full flex-row items-center justify-center rounded-lg border-2 p-4 transition hover:border-blue-400">
                    <div class="m-2 h-auto w-20 p-2">
                        <img class="h-cover w-full bg-blend-screen" src="{{ asset('images/profile/location.jpeg') }}" alt="user">
                    </div>
                    <div class="flex-col items-center justify-center">
                        <h2 class="text-2xl font-bold">Your Addresses</h2>
                        <p class="text-sm">Edit your address for orders and gifts</p>
                    </div>
                </div>
            </a>

            <!--user seller accout if have-->
            @if (Auth()->check())
                <!-- seller account-->
                @if (auth()->user()->role == 'Store-owner')
                    <div class="h-30 eas-in-out delay-2 hover:border-3 flex w-full flex-row items-center justify-center rounded-lg border-2 transition hover:border-blue-400">
                        <div class="m-2 h-auto w-24 p-2">
                            <img class="h-cover w-full bg-blend-screen" src="{{ asset('images/profile/store.jpeg') }}" alt="user">
                        </div>
                        <div class="flex-col items-center justify-center">
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
    <div class="flex h-auto flex-col space-y-4">
        <h2 class="ml-8 p-2 text-2xl font-bold">Inspired by your browsing history</h2>
        <!--product card-slider-->
        <div class="relative m-8 flex-col flex-nowrap items-center justify-evenly space-x-4 md:flex md:flex-row">
            <!--left slider-button-->
            <div class="absolute left-2 top-1/2 hidden -translate-y-1/2 transform items-center md:flex">
                <button class="flex h-8 w-8 items-center justify-center rounded-full bg-gray-800 text-white" id="prev">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
            </div>

            <!--right slider-button-->
            <div class="absolute right-2 top-1/2 hidden -translate-y-1/2 transform items-center md:flex">
                <button class="flex h-8 w-8 items-center justify-center rounded-full bg-gray-800 text-white" id="next">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                            <a class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100" href="#">
                                <img class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" src="https://images.unsplash.com/photo-1552374196-1ab2a1c593e8?auto=format&q=75&fit=crop&crop=top&w=600&h=700" alt="Photo by Austin Wade" loading="lazy" />

                                <span class="absolute left-0 top-3 rounded-r-lg bg-red-500 px-3 py-1.5 text-sm font-semibold uppercase tracking-wider text-white">-50%</span>
                            </a>

                            <div class="flex items-start justify-between gap-2 rounded-b-lg bg-gray-100 p-4">
                                <div class="flex flex-col">
                                    <a class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg" href="#">Fancy
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
                            <a class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100" href="#">
                                <img class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" src="https://images.unsplash.com/photo-1523359346063-d879354c0ea5?auto=format&q=75&fit=crop&crop=top&w=600&h=700" alt="Photo by Nick Karvounis" loading="lazy" />
                            </a>

                            <div class="flex items-start justify-between gap-2 rounded-b-lg bg-gray-100 p-4">
                                <div class="flex flex-col">
                                    <a class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg" href="#">Cool
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
                            <a class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100" href="#">
                                <img class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" src="https://images.unsplash.com/photo-1548286978-f218023f8d18?auto=format&q=75&fit=crop&crop=top&w=600&h=700" alt="Photo by Austin Wade" loading="lazy" />
                            </a>

                            <div class="flex items-start justify-between gap-2 rounded-b-lg bg-gray-100 p-4">
                                <div class="flex flex-col">
                                    <a class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg" href="#">Nice
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
                            <a class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100" href="#">
                                <img class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" src="https://images.unsplash.com/photo-1566207274740-0f8cf6b7d5a5?auto=format&q=75&fit=crop&crop=top&w=600&h=700" alt="Photo by Vladimir Fedotov" loading="lazy" />
                            </a>

                            <div class="flex items-start justify-between gap-2 rounded-b-lg bg-gray-100 p-4">
                                <div class="flex flex-col">
                                    <a class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg" href="#">Lavish
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
        <div class="flex h-auto flex-col space-y-4">
            <h2 class="ml-8 p-2 text-2xl font-bold">Your browsing history</h2>
            <!--product card-slider-->
            <div class="relative m-8 hidden flex-row flex-nowrap items-center justify-evenly space-x-4 md:flex">
                <!--left slider-button-->
                <div class="absolute left-2 top-1/2 flex -translate-y-1/2 transform items-center">
                    <button class="flex h-8 w-8 items-center justify-center rounded-full bg-gray-800 text-white" id="prev">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                </div>

                <!--right slider-button-->
                <div class="absolute right-2 top-1/2 flex -translate-y-1/2 transform items-center">
                    <button class="flex h-8 w-8 items-center justify-center rounded-full bg-gray-800 text-white" id="next">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                                <a class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100" href="#">
                                    <img class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" src="https://images.unsplash.com/photo-1552374196-1ab2a1c593e8?auto=format&q=75&fit=crop&crop=top&w=600&h=700" alt="Photo by Austin Wade" loading="lazy" />

                                    <span class="absolute left-0 top-3 rounded-r-lg bg-red-500 px-3 py-1.5 text-sm font-semibold uppercase tracking-wider text-white">-50%</span>
                                </a>

                                <div class="flex items-start justify-between gap-2 rounded-b-lg bg-gray-100 p-4">
                                    <div class="flex flex-col">
                                        <a class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg" href="#">Fancy
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
                                <a class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100" href="#">
                                    <img class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" src="https://images.unsplash.com/photo-1523359346063-d879354c0ea5?auto=format&q=75&fit=crop&crop=top&w=600&h=700" alt="Photo by Nick Karvounis" loading="lazy" />
                                </a>

                                <div class="flex items-start justify-between gap-2 rounded-b-lg bg-gray-100 p-4">
                                    <div class="flex flex-col">
                                        <a class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg" href="#">Cool
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
                                <a class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100" href="#">
                                    <img class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" src="https://images.unsplash.com/photo-1548286978-f218023f8d18?auto=format&q=75&fit=crop&crop=top&w=600&h=700" alt="Photo by Austin Wade" loading="lazy" />
                                </a>

                                <div class="flex items-start justify-between gap-2 rounded-b-lg bg-gray-100 p-4">
                                    <div class="flex flex-col">
                                        <a class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg" href="#">Nice
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
                                <a class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100" href="#">
                                    <img class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" src="https://images.unsplash.com/photo-1566207274740-0f8cf6b7d5a5?auto=format&q=75&fit=crop&crop=top&w=600&h=700" alt="Photo by Vladimir Fedotov" loading="lazy" />
                                </a>

                                <div class="flex items-start justify-between gap-2 rounded-b-lg bg-gray-100 p-4">
                                    <div class="flex flex-col">
                                        <a class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg" href="#">Lavish
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
