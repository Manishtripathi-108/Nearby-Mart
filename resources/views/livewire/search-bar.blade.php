<div x-data="{ openSuggestions: false }" @click.away="openSuggestions = false" class="hidden sm:block w-2/5 relative">
    <form role="search" action="" class="inline-flex items-center w-full">
        <div class="relative text-gray-600 w-full">
            <input @click="openSuggestions = !openSuggestions" wire:model.live.debounce.500ms="search" type="search" name="search" placeholder="Search" class="bg-white w-full h-10 px-5 pr-10 rounded-full text-sm focus:outline-none" id="searchInput">
            <button type="submit" class="absolute right-0 top-0 mr-4" style="margin-top: 12px;">
                <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 56.966 56.966">
                    <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                </svg>
            </button>
        </div>
    </form>

    <!-- Dropdown list -->
    <div x-show="openSuggestions" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
        @if($suggests && count($suggests) > 0)
        <ul class="absolute left-0 mt-2 w-full bg-white border rounded-md shadow-lg z-10">
            @foreach($suggests as $suggest)
            <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">
                <a href="">{{ $suggest->name }}</a>
            </li>
            @endforeach
        </ul>
        @endif
    </div>
</div>