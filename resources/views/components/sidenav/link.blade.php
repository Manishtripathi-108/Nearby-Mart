@props(['url', 'isSelected' => $attributes->get('isSelected') == true ? true : false, 'icon' => ''])

<li class="my-px">
    <a class="@if ($isSelected) bg-gray-100 @else hover:bg-gray-100 @endif flex h-12 flex-row items-center rounded-lg px-4 text-gray-600" href="{{ $url }}">
        <span class="flex items-center justify-center text-lg text-gray-400">
            <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                {{ $icon }}
            </svg>
        </span>
        <span class="ml-3">{{ $slot }}</span>
        @if ($count = $attributes->get('count'))
            <span class="ml-auto flex h-6 items-center justify-center rounded-full bg-gray-200 px-2 text-sm font-semibold text-gray-500">
                {{ $count }}
            </span>
        @endif
    </a>
</li>
