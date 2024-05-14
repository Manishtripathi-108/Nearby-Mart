@props([
    'type' => 0,
    'imageUrl',
    'statusColor' => 'green',
    'statusIcon',
    'status' => 'Delivered',
    'linkUrl' => '#',
    'btnName',
    'content' => null,
])

@php
    switch ($status) {
        case 'Processing':
            $statusColor = 'yellow';
            $statusIcon = 'clock-icon.svg';
            break;

        case 'Confirmed':
            $statusColor = 'blue';
            $statusIcon = 'package-processing-icon.svg';
            break;

        case 'Delivered':
            $statusColor = 'green';
            $statusIcon = 'package-delivered-icon.svg';
            break;

        case 'Cancelled':
            $statusColor = 'red';
            $statusIcon = 'package-cancelled-icon.svg';
            break;

        case 'Open':
            $statusColor = 'green';
            $statusIcon = 'open-icon.svg';
            break;

        case 'Closed':
            $statusColor = 'red';
            $statusIcon = 'closed-icon.svg';
            break;

        default:
            $statusColor = 'gray';
            $statusIcon = 'error-icon.svg';
    }
@endphp

@switch($type)
    @case(1)
        <td class="px-4 py-3">
            <div class="flex items-center gap-4">
                @isset($imageUrl)
                    <img class="h-10 w-10 rounded-full" src="{{ asset($imageUrl) }}" alt="" loading="lazy">
                @endisset
                <div class="font-medium">
                    <div>{{ $slot }}</div>
                    @isset($content)
                        <div class="text-xs text-gray-500">{{ $content }}</div>
                    @endisset
                </div>
            </div>
        </td>
    @break

    @case(2)
        <td class="px-4 py-3 text-xs">
            <span class="bg-{{ $statusColor }}-100 text-{{ $statusColor }}-800 inline-flex items-center gap-x-1.5 rounded-full px-2 py-1.5 text-xs font-medium leading-4">
                <div class="h-6 w-6">
                    <img class="svg-{{ $statusColor }}" src="{{ asset('icons/' . $statusIcon) }}" alt="">
                </div>
                {{ $status }}
            </span>
        </td>
    @break

    @case(3)
        <td class="px-4 py-3 text-xs">
            <div class="inline-flex items-center rounded-md shadow-sm">
                <a class="cursor-pointer rounded-lg border-b-[4px] border-blue-600 bg-blue-500 px-6 py-2 text-white transition-all hover:-translate-y-[1px] hover:border-b-[6px] hover:brightness-110 active:translate-y-[2px] active:border-b-[2px] active:brightness-90" href="{{ $linkUrl }}">
                    <span>
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            @if ($slot->isNotEmpty())
                                {{ $slot }}
                            @else
                                <path d="M21 3L15 3M21 3L12 12M21 3V9" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V5C3 3.89543 3.89543 3 5 3H11" stroke-linecap="round"></path>
                            @endif
                        </svg>
                        @isset($btnName)
                            {{ $btnName }}
                        @endisset
                    </span>
                </a>
            </div>
        </td>
    @break

    @case(4)
        <td class="px-4 py-3 text-xs">
            <div class="inline-flex items-center rounded-md shadow-sm">
                <button class="hover:border-b-6 inline-flex cursor-pointer items-center space-x-1 rounded-l-lg border border-b-4 border-green-600 bg-green-400 px-3 py-1 text-sm font-medium text-white transition-all hover:-translate-y-1 hover:brightness-110 active:translate-y-2 active:border-b-2 active:brightness-90">
                    <span>
                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </span>
                </button>
                <button class="hover:border-b-6 inline-flex cursor-pointer items-center space-x-1 rounded-r-lg border border-b-4 border-red-600 bg-red-400 px-3 py-1 text-sm font-medium text-white transition-all hover:-translate-y-1 hover:brightness-110 active:translate-y-2 active:border-b-2 active:brightness-90">
                    <span>
                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </span>
                </button>
            </div>
        </td>
    @break

    @default
        <td class="di px-4 py-3 text-sm">{{ $slot }}</td>
@endswitch
