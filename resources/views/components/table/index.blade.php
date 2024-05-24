@props([
    'title' => '',
    'thead' => '',
    'viewAllLink',
    'link' => null,
    'icon' => '<path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10Z"></path>
                <path d="M7.246 12.25h9"></path>
                <path d="m11.746 7.75 4.5 4.5-4.5 4.5"></path>',
])

<div {{ $attributes->merge(['class' => 'h-fit overflow-hidden rounded-xl bg-gray-50 p-2 shadow-md']) }}>
    <div class="w-full overflow-x-auto rounded-md">
        @isset($title)
            <div class="flex w-full items-center justify-between px-4 py-3">
                <div class="font-bold text-gray-700">
                    {{ ucwords($title) }}
                </div>
                @isset($viewAllLink)
                    <a class="mr-4" href="{{ $link }}">
                        <div class="relative w-fit cursor-pointer rounded-[16px] bg-gradient-to-t from-blue-500 to-blue-700 p-[2px] text-xs opacity-90 transition-opacity hover:opacity-100 active:scale-95">
                            <span class="flex h-full w-full items-center gap-2 rounded-[14px] bg-blue-600 bg-gradient-to-t from-blue-500 to-blue-700 px-4 py-2 font-semibold text-white">
                                View All
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                    {!! $icon !!}
                                </svg>
                            </span>
                        </div>
                    </a>
                @endisset
            </div>
            
            <hr class="border-gray-150 border">
        @endisset

        <div>
            <table class="w-full">
                <thead>
                    <tr class="border-b bg-gray-50 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">

                        {{ $thead }}

                    </tr>
                </thead>

                <tbody class="divide-y bg-white">

                    {{ $slot }}

                </tbody>
            </table>
        </div>
    </div>
</div>
