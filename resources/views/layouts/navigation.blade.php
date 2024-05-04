<!-- navbar -->
<nav>
    <div class="min-h-16 justify-center item center flex flex-row ">
        <div class="px-5 xl:px-12 py-6 flex w-full">
            <!-- #region -->
            <a class="flex items-center" href="#">
                <!-- <img class="h-12 w-15" src="images/Nearby Logo.png" alt="logo" /> -->
                <span class="text-2xl font-bold ml-2 text-blue-600">Nearby Mart</span>
            </a>

            <!-- Nav Links -->
            <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12">
                <li><a class="{{request()-> is('home')? 'text-blue-600':'hover:text-gray-600 text-gray-500'}}hover:text-gray-600 text-gray-500 "
                        href="/home">Home</a></li>
                <li><a class="{{request()-> is('about')? 'text-blue-600':'hover:text-gray-600 text-gray-500'}}hover:text-gray-600 text-gray-500"
                        href="/about">About us</a></li>

                <li><a class="{{request()-> is('contact')? 'text-blue-600':'hover:text-gray-600 text-gray-500'}}hover:text-gray-600 text-gray-500"
                        href="/contact">Contact</a></li>

            </ul>
            <!-- Header Icons -->
            <div class="hidden xl:flex items-center space-x-5 items-center">
                <a class="hover:text-gray-600 text-gray-500" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </a>
                <a class="flex items-center hover:text-gray-600 text-gray-500" href="{{route('cart.index')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="flex absolute -mt-5 ml-4">
                        <span
                            class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-blue-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-blue-500">
                        </span>
                    </span>
                </a>
                <!-- Sign In / Register      -->
                <div x-data="{ isOpen: true }" class="relative inline-block ">
                    <!-- Dropdown toggle button -->
                    <button @click="isOpen = !isOpen"
                        class="relative z-10 flex items-center p-2 text-sm text-gray-600 bg-white border border-transparent rounded-md focus:border-blue-500 focus:ring-opacity-40 dark:focus:ring-opacity-40 focus:ring-blue-300 dark:focus:ring-blue-400 focus:ring dark:text-white dark:bg-gray-800 focus:outline-none">
                        <span class="mx-1">@if(auth()->check())
                            {{ auth()->user()->name }}
                            @endif</span>
                        <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z"
                                fill="currentColor"></path>
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div x-show="isOpen" @click.away="isOpen = false"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                        class="absolute right-0 z-20 w-56 py-2 mt-2 overflow-hidden origin-top-right bg-white rounded-md shadow-xl dark:bg-gray-800">
                        <a href="#"
                            class="flex items-center p-3 -mt-2 text-sm text-gray-600 transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                            <img class="flex-shrink-0 object-cover mx-1 rounded-full w-9 h-9"
                                src="https://images.unsplash.com/photo-1523779917675-b6ed3a42a561?ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8d29tYW4lMjBibHVlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=face&w=500&q=200"
                                alt="jane avatar">
                            <div class="mx-1">
                                <h1 class="text-sm font-semibold text-gray-700 dark:text-gray-200">@if(auth()->check())
                                    {{ auth()->user()->name }}
                                    @endif</h1>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    @if(auth()->check())
                                <p>{{ auth()->user()->email }}</p>
                                @else
                                janedoe@exampl.com

                                @endif </p>
                            </div>
                        </a>

                        <hr class="border-gray-200 dark:border-gray-700 ">

                        <a href="/profile"
                            class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                            view profile
                        </a>

                        <a href="settings"
                            class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                            Settings
                        </a>


                        <hr class="border-gray-200 dark:border-gray-700 ">

                     
                       @if(auth()->user()->role == 'Store-owner')
                       <a href="/store"
                            class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                           Store
                        </a>
                        @endif
                      

                        <a href="#"
                            class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                            Invite colleagues
                        </a>

                        <hr class="border-gray-200 dark:border-gray-700 ">

                        <a href="#"
                            class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                            Help
                        </a>
                        <a href="#"
                            class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                            Sign Out
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Responsive navbar -->
    <a class="xl:hidden flex mr-6 items-center " href="/cart">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-600 text-gray-500" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
        <span class="flex absolute -mt-5 ml-4">
            <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-blue-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-3 w-3 bg-blue-500">
            </span>
        </span>
    </a>
    <button class="navbar-burger self-center mr-12 xl:hidden" id="button1">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
            <path fill-rule="evenodd"
                d="M2 4.75A.75.75 0 0 1 2.75 4h14.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 4.75ZM2 10a.75.75 0 0 1 .75-.75h14.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 10Zm0 5.25a.75.75 0 0 1 .75-.75h14.5a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1-.75-.75Z"
                clip-rule="evenodd" />
        </svg>

    </button>
    </div>
    <!-- Responsive navbar -->
    <div class=" fixed hidden xl:hidden  inset-0 bg-white " id="navbar">
        <div class="flex justify-between  pl-12 py-6">
            <a class="" href="#">
                <!-- <img class="h-12 w-15" src="images/Nearby Logo.png" alt="logo" /> -->
                <span class="text-2xl font-bold ml-2 text-blue-600">Nearby Mart</span>
            </a>

            <div class="flex flex-row">
                <a class="xl:hidden flex mr-6 items-center " href="/cart">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-600 text-gray-500"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="flex absolute -mt-5 ml-4">
                        <span
                            class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-blue-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-blue-500">
                        </span>
                    </span>
                </a>
                <button class="  navbar-burger self-center mr-12 xl:hidden top-2 right-3" id="button2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path
                            d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
                    </svg>

                </button>
            </div>
        </div>

        <ul class="flex flex-col items-center space-y-12 mt-4 font-semibold font-heading">
            <li><a class="hover:text-blue-600 text-gray-500 " href="/home">Home</a></li>
            <li><a class="hover:text-blue-600 text-gray-500" href="/about">About us</a></li>
            <li><a class="hover:text-blue-600 text-gray-500" href="/contact">Contact</a></li>
            <li><a class="hover:text-blue-600 text-gray-500" href="#">Sign In</a></li>
        </ul>
    </div>
</nav>
<script>
var navbar = document.getElementById('navbar');
var account = document.getElementById('account-menu');
document.getElementById('button1').addEventListener('click', function() {
    navbar.classList.toggle('hidden');
});
document.getElementById('button2').addEventListener('click', function() {
    navbar.classList.toggle('hidden');
});

document.getElementById('account').addEventListener('click', function() {
    account.classList.toggle('hidden');
});
</script>