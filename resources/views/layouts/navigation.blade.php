<nav class=" bg-white w-full flex relative justify-between items-center mx-auto px-8 h-16">
    <!-- logo -->
    <div class="inline-flex">

        <a href="/">
            <div class="hidden md:block">
                <div class="flex items-center">
                    <x-application-logo class="block h-9 w-auto" />
                    <span class="text-2xl font-bold ml-2 text-blue-600">
                        Nearby Mart
                    </span>
                </div>
            </div>

            <div class="block md:hidden">
                <x-application-logo class="block h-9 w-auto" />
            </div>
        </a>
    </div>
    <!-- end logo -->

    <!-- search bar -->
    <livewire:search-bar />
    <!-- end search bar -->

    <!-- buttons -->
    <div class="flex-initial">
        <div class="flex justify-end items-center relative">
            <div class="flex mr-4 items-center">

                <!-- Wishlist -->
                <a class="py-2 px-2 hover:text-blue-600 text-gray-500" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </a>

                <!-- Cart -->
                <a class="flex py-2 px-2 items-center hover:text-blue-600 text-gray-500" href="{{route('cart.index')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="flex absolute -mt-5 ml-4">
                        <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-blue-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-blue-500"></span>
                    </span>
                </a>

                <!-- Profile -->
                @if (Auth::check())
                <div x-data="{ openProfileDropdown: false }" @click.away="openProfileDropdown = false" class="relative inline-block ml-2">

                    <!-- Dropdown toggle button -->
                    <button @click="openProfileDropdown = !openProfileDropdown" class="relative z-10 flex items-center p-2 text-sm text-gray-600 bg-white border rounded-md focus:border-blue-500 focus:outline-none">
                        <span class="mx-1">{{ auth()->check() ? auth()->user()->name : '' }}</span>
                        <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none">
                            <path d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z" fill="currentColor"></path>
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div x-show="openProfileDropdown" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 z-20 w-56 py-2 mt-2 overflow-hidden origin-top-right bg-white rounded-md shadow-xl focus:outline-none">

                        <a href="#" class="flex items-center p-3 -mt-2 text-sm text-gray-600 transition-colors duration-300 transform hover:bg-gray-100">
                            <img class="flex-shrink-0 object-cover mx-1 rounded-full w-9 h-9" src="{{auth()->user()->image}}" alt="jane avatar">
                            <div class="mx-1">
                                <h1 class="text-sm font-semibold text-gray-700 ">{{ auth()->check() ? auth()->user()->name : '' }}</h1>
                                <p class="text-sm text-gray-500 ">{{ auth()->check() ? auth()->user()->email : 'janedoe@example.com' }}</p>
                            </div>
                        </a>
                        <hr class="border-gray-200 ">

                        <ul class="space-y-2">
                            <li>
                                <a href="{{route('profile')}}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg  hover:bg-gray-100 ">
                                    <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                                    </svg>
                                    <span class="ml-3">Your Account</span>
                                </a>
                            </li>

                            @if(auth()->user()->userDetail && auth()->user()->userDetail->user_type == 'Store Owner')
                            <li>
                                <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg  hover:bg-gray-100 ">
                                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="flex-1 ml-3 whitespace-nowrap">Store</span>
                                </a>
                            </li>
                            @endif

                            <li>
                                <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg  hover:bg-gray-100 ">
                                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="flex-1 ml-3 whitespace-nowrap">Orders</span>
                                </a>
                            </li>

                            <li>
                                <form action="{{route('logout')}}" method="POST" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg  hover:bg-gray-100 ">
                                    @csrf
                                    @method('DELETE')
                                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path>
                                    </svg>
                                    <input type="submit" value="Sign Out" class="flex-1 ml-3 whitespace-nowrap text-left">
                                </form>
                            </li>

                        </ul>
                    </div>
                </div>

                @else
                <!-- Login btn -->
                <a href="{{route('login')}}" class="ml-2 nav-login-btn">
                    Login
                    <div class="icon">
                        <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z" fill="currentColor"></path>
                        </svg>
                    </div>
                </a>
                @endif

            </div>
        </div>
    </div>
    <!-- end buttons -->
</nav>