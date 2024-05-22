<div class="relative hidden w-2/5 sm:block" x-data="{ openSuggestions: false }" @click.away="openSuggestions = false">
    <form class="inline-flex w-full items-center" role="search" action="{{ route('products.search') }}" method="GET">
        <div class="relative w-full text-gray-600">
            <input class="h-10 w-full rounded-full bg-white px-5 pr-10 text-sm focus:outline-none" id="searchInput" name="query" type="search" @click="openSuggestions = !openSuggestions" wire:model.live.debounce.500ms="search" placeholder="Search">
            <button class="absolute right-0 top-0 mr-4" type="submit" style="margin-top: 12px;">
                <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 56.966 56.966">
                    <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                </svg>
            </button>
        </div>
    </form>

    <!-- Dropdown list -->
    <div x-show="openSuggestions" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
        @if ($suggests && count($suggests) > 0)
            <ul class="absolute left-0 z-10 mt-2 w-full rounded-md border bg-white shadow-lg">
                @foreach ($suggests as $suggest)
                    <li class="cursor-pointer px-4 py-2 hover:bg-gray-100">
                        <a href="">{{ $suggest->name }}</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
