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
                <a class="flex items-center px-2 py-2 text-gray-500 hover:text-blue-600" href="">
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

                            <a class="-mt-2 flex transform items-center p-3 text-sm text-gray-600 transition-colors duration-300 hover:bg-gray-100" href="#">
                                <img class="mx-1 h-9 w-9 flex-shrink-0 rounded-full object-cover" src="https://images.unsplash.com/photo-1523779917675-b6ed3a42a561?ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8d29tYW4lMjBibHVlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=face&w=500&q=200" alt="jane avatar">
                                <div class="mx-1">
                                    <h1 class="text-sm font-semibold text-gray-700">{{ auth()->check() ? auth()->user()->name : '' }}</h1>
                                    <p class="text-sm">{{ auth()->check() ? auth()->user()->email : '' }}</p>
                                </div>
                            </a>
                            <hr class="border-gray-200">

                            <ul class="space-y-2">
                                <li>
                                    <a class="flex items-center rounded-lg p-2 text-base font-normal text-gray-900 hover:bg-gray-100" href="#">
                                        <svg class="h-6 w-6 text-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                            <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                        </svg>
                                        <span class="ml-3">Dashboard</span>
                                    </a>
                                </li>

                                @if (auth()->user()->userDetail && auth()->user()->userDetail->user_type == 'Store Owner')
                                    <li>
                                        <a class="flex items-center rounded-lg p-2 text-base font-normal text-gray-900 hover:bg-gray-100" href="#">
                                            <svg class="h-6 w-6 text-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                                <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="ml-3 flex-1 whitespace-nowrap">Store</span>
                                        </a>
                                    </li>
                                @endif

                                <li>
                                    <a class="flex items-center rounded-lg p-2 text-base font-normal text-gray-900 hover:bg-gray-100" href="#">
                                        <svg class="h-6 w-6 text-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
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
