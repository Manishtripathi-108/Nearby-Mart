@props(['url', 'isSelected' => $attributes->get('isSelected') == true ? true : false, 'icon' => ''])

<li class="my-px">
    <a class="@if ($isSelected) bg-gray-100 @else hover:bg-gray-100 @endif flex h-12 flex-row items-center rounded-lg px-4 text-gray-600" href="{{ $url }}">
        <span class="flex items-center justify-center text-lg text-green-400">
            <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                @if ($icon)
                    {{ $icon }}
                @else
                    <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                @endif
            </svg>
        </span>
        <span class="ml-3">Add New {{ $slot ?? '' }}</span>
    </a>
</li>
