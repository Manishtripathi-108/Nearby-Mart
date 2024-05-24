<x-sidenav>

    @php
        $currentUrl = url()->current();
    @endphp

    <div class="mb-10 flex transform items-center rounded-t-xl rounded-bl-[55px] bg-gradient-to-r from-indigo-500 to-indigo-600 px-6 py-8">
        <img class="h-20 w-20 rounded-full ring-4 ring-gray-200 ring-opacity-20" src="{{ asset('avatars/' . auth()->user()->profile_picture) }}" alt="">
        <div class="ml-5">
            <h1 class="text-lg tracking-wide text-white">
                {{ auth()->user()->name }}
            </h1>
            <p class="text-sm tracking-wider text-gray-300"></p>
        </div>
    </div>

    <x-sidenav.link :url="route('store.dashboard')" isSelected="{{ $currentUrl === route('store.dashboard') }}">
        <x-slot:icon>
            <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
        </x-slot:icon>
        Dashboard
    </x-sidenav.link>

    <x-sidenav.link :url="route('store.index')" isSelected="{{ $currentUrl === route('store.index') }}">
        <x-slot:icon>
            <svg class="h-6 w-6 text-gray-400" fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 122.88 112.13">
                <path d="M69.19,87.22A1.75,1.75,0,1,1,67.44,89a1.75,1.75,0,0,1,1.75-1.75Zm45.37-34.58v53a6.52,6.52,0,0,1-6.51,6.51H14.83a6.5,6.5,0,0,1-4.6-1.92h0a6.49,6.49,0,0,1-1.91-4.6V52.7a23.89,23.89,0,0,0,5.37.35v52.57a1.13,1.13,0,0,0,.34.8h0a1.12,1.12,0,0,0,.8.32h45V66.38a9.76,9.76,0,0,1,9.74-9.73H85.64a9.76,9.76,0,0,1,9.73,9.73v40.37h12.68a1.13,1.13,0,0,0,1.13-1.13V52.8a22.55,22.55,0,0,0,5.38-.16ZM64.33,106.75H90.85V66.38a5.26,5.26,0,0,0-5.22-5.22H69.55a5.26,5.26,0,0,0-5.22,5.22v40.37ZM30,64.09h16.1a2.27,2.27,0,0,1,2.27,2.26V90.28a2.27,2.27,0,0,1-2.27,2.26H30a2.27,2.27,0,0,1-2.27-2.26V66.35A2.27,2.27,0,0,1,30,64.09Zm13.84,4.52H32.25V88H43.84V68.61ZM106.09,46.4c-1.25-.59-4.33-1.39-5.3-2.35a12.25,12.25,0,0,1-2.12-2.88,12.25,12.25,0,0,1-2.12,2.88c-2.14,2.13-7,3.46-10.29,3.46S78.11,46.18,76,44.05a12.25,12.25,0,0,1-2.12-2.88,12.25,12.25,0,0,1-2.12,2.88c-2.14,2.13-7,3.46-10.29,3.46s-8.15-1.33-10.29-3.46A12.25,12.25,0,0,1,49,41.17a12.25,12.25,0,0,1-2.12,2.88c-2.14,2.13-7,3.46-10.29,3.46s-8.15-1.33-10.29-3.46a12.25,12.25,0,0,1-2.12-2.88,12.25,12.25,0,0,1-2.12,2.88c-1.41,1.4-5.12,2.46-7.08,3-3.95.48-8.61-.09-11.54-3A11.77,11.77,0,0,1,0,35.71V31.07H0a1.44,1.44,0,0,1,.17-.66L8.49,3.76C9.17,1.57,10.84.16,14.07,0h94.09c2.9.31,4.79,1.53,5.57,3.74l9,26.62a1.35,1.35,0,0,1,.19.63h0a.71.71,0,0,1,0,.14v4.58a11.77,11.77,0,0,1-3.47,8.34c-3.48,3.48-8.78,3.39-13.32,2.35Z" />
            </svg>
        </x-slot:icon>
        Your Stores
    </x-sidenav.link>

    <x-sidenav.addnew :url="route('store.create')" isSelected="{{ $currentUrl === route('store.create') }}">
        Store
    </x-sidenav.addnew>

    <x-sidenav.section>
        Products
    </x-sidenav.section>

    <x-sidenav.link :url="route('products.all')" isSelected="{{ $currentUrl === route('products.all') }}">
        <x-slot:icon>
            <svg class="h-6 w-6 text-gray-400" fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 122.88 112.13">
                <path id="svg_1" xmlns="http://www.w3.org/2000/svg" d="m118.13055,9.56516a3.25,3.25 0 0 1 2.2,0.41a3.28,3.28 0 0 1 2,3l0.57,78.83a3.29,3.29 0 0 1 -1.59,3l-32.19,19.15a3.29,3.29 0 0 1 -2,0.65a3.07,3.07 0 0 1 -0.53,0l-83.48,-9.33a3.28,3.28 0 0 1 -3.11,-3.25l0,-80.22l0,0a3.28,3.28 0 0 1 2,-3.08l41.89,-18.43l0,0a3.19,3.19 0 0 1 1.74,-0.27l72.5,9.51l0,0.03zm-37.26,1.7l-24.67,14l30.38,3.88l22.5,-14.18l-28.21,-3.7zm-29,20l-1.12,33.38l-12.52,-8.53l-12.51,7.08l2.53,-34.91l-21.7,-2.77l0,73.56l77.33,8.6l0,-72.29l-32,-4.09l-0.01,-0.03zm-19.7,-9.09l23.95,-14.15l-10.42,-1.38l-30.46,13.38l16.95,2.17l-0.02,-0.02zm58.27,12.26l0,71.12l25.9,-15.44l-0.52,-71.68l-25.38,16z" />
            </svg>
        </x-slot:icon>
        Your Products
    </x-sidenav.link>

    <x-sidenav.link :url="route('products.edit')" isSelected="{{ $currentUrl === route('products.edit') }}">
        <x-slot:icon>
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
            </svg>
        </x-slot:icon>
        Edit products
    </x-sidenav.link>

    <x-sidenav.addnew :url="route('products.addNew')" isSelected="{{ $currentUrl === route('products.addNew') }}">
        products
    </x-sidenav.addnew>
</x-sidenav>
