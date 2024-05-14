<x-sidenav>

    @php
        $currentUrl = url()->current();
    @endphp

    <div class="mb-10 flex transform items-center rounded-t-xl rounded-bl-[55px] bg-gradient-to-r from-indigo-500 to-indigo-600 px-6 py-8">
        <img class="h-20 w-20 rounded-full ring-4 ring-gray-200 ring-opacity-20" src="https://randomuser.me/api/portraits/women/79.jpg" alt="Dr. Jessica James">
        <div class="ml-5">
            <h1 class="text-lg tracking-wide text-white">
                {{ auth()->user()->name }}
            </h1>
            <p class="text-sm tracking-wider text-gray-300"></p>
        </div>
    </div>

    <x-sidenav.link :url="route('store.index')" isSelected="{{ $currentUrl === route('store.index') }}">
        <x-slot:icon>
            <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
        </x-slot:icon>
        Dashboard
    </x-sidenav.link>

    <x-sidenav.addnew :url="route('store.create')" isSelected="{{ $currentUrl === route('store.create') }}">
        Store
    </x-sidenav.addnew>

    <x-sidenav.section>
        Products
    </x-sidenav.section>
</x-sidenav>
