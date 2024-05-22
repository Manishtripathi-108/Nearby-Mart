<nav class="relative mx-auto flex h-16 w-full items-center justify-between bg-white px-8">
    <!-- logo -->
    <div class="inline-flex">

        <a href="/">
            <div class="hidden md:block">
                <div class="flex items-center">
                    <x-application-logo class="block h-9 w-auto" />
                    <span class="ml-2 text-2xl font-bold text-blue-600">
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
        <div class="relative flex items-center justify-end">
            <div class="mr-4 flex items-center">

                <!-- Wishlist -->
                <a class="px-2 py-2 text-gray-500 hover:text-blue-600" href="#">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </a>

                <!-- Cart -->
                <a class="flex items-center px-2 py-2 text-gray-500 hover:text-blue-600" href="{{route('cart.index')}}">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="absolute -mt-5 ml-4 flex">
                        <span class="absolute inline-flex h-3 w-3 animate-ping rounded-full bg-blue-400 opacity-75"></span>
                        <span class="relative inline-flex h-3 w-3 rounded-full bg-blue-500"></span>
                    </span>
                </a>

                <!-- Profile -->
                @if (Auth::check())
                    <div class="relative ml-2 inline-block" x-data="{ openProfileDropdown: false }" @click.away="openProfileDropdown = false">

                        <!-- Dropdown toggle button -->
                        <button class="relative z-10 flex items-center rounded-md border bg-white p-2 text-sm text-gray-600 focus:border-blue-500 focus:outline-none" @click="openProfileDropdown = !openProfileDropdown">
                            <span class="mx-1">{{ auth()->check() ? auth()->user()->name : '' }}</span>
                            <svg class="mx-1 h-5 w-5" viewBox="0 0 24 24" fill="none">
                                <path d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z" fill="currentColor"></path>
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div class="absolute right-0 z-20 mt-2 w-64 origin-top-right overflow-hidden rounded-md bg-white p-2 py-2 shadow-xl focus:outline-none" x-show="openProfileDropdown" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">

                            <div class="flex items-center gap-4 rounded-lg p-2 font-normal duration-300 hover:bg-gray-100">
                                <img class="mx-1 h-9 w-9 flex-shrink-0 rounded-full object-cover" src="{{ asset(auth()->check() ? auth()->user()->profile_photo : '') }}" alt="" loading="lazy">
                                <div class="font-medium">
                                    <div> {{ auth()->check() ? auth()->user()->name : '' }} </div>
                                    <div class="text-xs text-gray-500">{{ auth()->check() ? auth()->user()->email : '' }}</div>
                                </div>
                            </div>

                            <hr class="border-gray-200">

                            <ul class="space-y-2">
                                <li>
                                    <a class="flex items-center rounded-lg p-2 text-base font-normal text-gray-900 hover:bg-gray-100" href="{{ route('profile') }}">
                                        <svg class="h-6 w-6 text-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                            <path d="M12 2a5 5 0 1 0 0 10 5 5 0 1 0 0-10z"></path>
                                            <path d="M17 14h.352a3 3 0 0 1 2.976 2.628l.391 3.124A2 2 0 0 1 18.734 22H5.266a2 2 0 0 1-1.985-2.248l.39-3.124A3 3 0 0 1 6.649 14H7"></path>
                                        </svg>
                                        <span class="ml-3">Your Account</span>
                                    </a>
                                </li>

                                @if (auth()->user()->isStoreOwner())
                                    <li>
                                        <a class="flex items-center rounded-lg p-2 text-base font-normal text-gray-900 hover:bg-gray-100" href="{{ route('store.index') }}">
                                            <svg class="h-6 w-6 text-gray-400" fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 122.88 112.13">
                                                <path d="M69.19,87.22A1.75,1.75,0,1,1,67.44,89a1.75,1.75,0,0,1,1.75-1.75Zm45.37-34.58v53a6.52,6.52,0,0,1-6.51,6.51H14.83a6.5,6.5,0,0,1-4.6-1.92h0a6.49,6.49,0,0,1-1.91-4.6V52.7a23.89,23.89,0,0,0,5.37.35v52.57a1.13,1.13,0,0,0,.34.8h0a1.12,1.12,0,0,0,.8.32h45V66.38a9.76,9.76,0,0,1,9.74-9.73H85.64a9.76,9.76,0,0,1,9.73,9.73v40.37h12.68a1.13,1.13,0,0,0,1.13-1.13V52.8a22.55,22.55,0,0,0,5.38-.16ZM64.33,106.75H90.85V66.38a5.26,5.26,0,0,0-5.22-5.22H69.55a5.26,5.26,0,0,0-5.22,5.22v40.37ZM30,64.09h16.1a2.27,2.27,0,0,1,2.27,2.26V90.28a2.27,2.27,0,0,1-2.27,2.26H30a2.27,2.27,0,0,1-2.27-2.26V66.35A2.27,2.27,0,0,1,30,64.09Zm13.84,4.52H32.25V88H43.84V68.61ZM106.09,46.4c-1.25-.59-4.33-1.39-5.3-2.35a12.25,12.25,0,0,1-2.12-2.88,12.25,12.25,0,0,1-2.12,2.88c-2.14,2.13-7,3.46-10.29,3.46S78.11,46.18,76,44.05a12.25,12.25,0,0,1-2.12-2.88,12.25,12.25,0,0,1-2.12,2.88c-2.14,2.13-7,3.46-10.29,3.46s-8.15-1.33-10.29-3.46A12.25,12.25,0,0,1,49,41.17a12.25,12.25,0,0,1-2.12,2.88c-2.14,2.13-7,3.46-10.29,3.46s-8.15-1.33-10.29-3.46a12.25,12.25,0,0,1-2.12-2.88,12.25,12.25,0,0,1-2.12,2.88c-1.41,1.4-5.12,2.46-7.08,3-3.95.48-8.61-.09-11.54-3A11.77,11.77,0,0,1,0,35.71V31.07H0a1.44,1.44,0,0,1,.17-.66L8.49,3.76C9.17,1.57,10.84.16,14.07,0h94.09c2.9.31,4.79,1.53,5.57,3.74l9,26.62a1.35,1.35,0,0,1,.19.63h0a.71.71,0,0,1,0,.14v4.58a11.77,11.77,0,0,1-3.47,8.34c-3.48,3.48-8.78,3.39-13.32,2.35Z" />
                                            </svg>
                                            <span class="ml-3 flex-1 whitespace-nowrap">Store</span>
                                        </a>
                                    </li>
                                @endif

                                <li>
                                    <a class="flex items-center rounded-lg p-2 text-base font-normal text-gray-900 hover:bg-gray-100" href="{{ route('your-orders') }}">
                                        <svg class="h-6 w-6 text-gray-400" fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke="currentColor" stroke-width="2" x="0px" y="0px" viewBox="0 0 120.98 122.88">
                                            <g>
                                                <path d="M30.07,65.39l-0.71,20.73l-7.81-5.32l-7.81,4.41l1.61-22.22L4.29,61.47v46.58l40.74,4.63V67.05L30.07,65.39L30.07,65.39z M97.89,5.95c0.42-0.08,0.85,0,1.21,0.22c0.61,0.25,1.04,0.85,1.05,1.56l0.35,47.99l17.89,2.35v0c0.42-0.08,0.85,0,1.21,0.22 c0.61,0.25,1.04,0.85,1.05,1.56l0.35,49.19c0.03,0.6-0.27,1.2-0.82,1.53l-20.09,11.98c-0.28,0.21-0.64,0.34-1.02,0.34 c-0.09,0-0.19-0.01-0.27-0.02l-52.13-5.8c-0.13-0.01-0.25-0.03-0.37-0.06l-44.67-5.74c-0.9-0.04-1.61-0.79-1.61-1.69V59.55h0 c-0.02-0.67,0.36-1.32,1.01-1.6L24.55,47.6V13.24h0c-0.02-0.67,0.36-1.32,1.01-1.6l26.15-11.5l0,0c0.27-0.12,0.58-0.17,0.9-0.13 L97.89,5.95L97.89,5.95L97.89,5.95z M98.88,58.92l-15.72,9.38l15.61,1.99l14.95-9.42L98.88,58.92L98.88,58.92z M24.55,55.64V51.3 L7.87,58.63l9.57,1.22L24.55,55.64L24.55,55.64z M80.26,21.83v44.26l15.01-8.96l1.83-1.55l-0.32-44.16L80.26,21.83L80.26,21.83 L80.26,21.83z M75.96,67.18V21.4l-21.33-2.84L53.9,39.81l-7.81-5.32l-7.81,4.41l1.61-22.22l-11.96-1.53v46.58L75.96,67.18 L75.96,67.18L75.96,67.18z M73.35,6.15l-16.4,9.31l21.33,2.72l14.95-9.42L73.35,6.15L73.35,6.15L73.35,6.15z M41.99,13.54 l15.9-9.43l-5.24-0.69l-20.23,8.89L41.99,13.54L41.99,13.54z M100.75,73.94v44.26l16.85-10.05l-0.33-44.62L100.75,73.94 L100.75,73.94L100.75,73.94z M96.45,119.29V73.51l-21.33-2.84l-0.73,21.25l-7.81-5.32l-7.81,4.41l1.61-22.22l-11.06-1.08v46.58 L96.45,119.29L96.45,119.29L96.45,119.29z" />
                                            </g>
                                        </svg>
                                        <span class="ml-3 flex-1 whitespace-nowrap">Orders</span>
                                    </a>
                                </li>

                                <li>
                                    <form class="flex items-center rounded-lg p-2 text-base font-normal hover:bg-gray-100" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <svg class="h-6 w-6 text-red-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                            <path d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"></path>
                                        </svg>
                                        <input class="ml-3 flex-1 whitespace-nowrap text-left" type="submit" value="Logout">
                                    </form>
                                </li>

                            </ul>
                        </div>
                    </div>
                @else
                    <!-- Login btn -->
                    <a class="nav-login-btn ml-2" href="{{ route('login') }}">
                        Login
                        <div class="icon">
                            <svg height="24" width="24" viewBox="0 0 24 24">
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
