@props(['color' => $attributes->get('color'), 'icon' => '', 'value' => ''])

<div class="relative flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">

    <div class="from-{{ $color }}-600 to-{{ $color }}-400 shadow-{{ $color }}-500/40 absolute mx-4 -mt-4 grid h-16 w-16 place-items-center overflow-hidden rounded-xl bg-gradient-to-tr bg-clip-border text-white shadow-lg">
        <svg class="h-6 w-6 text-white" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor">
            {{ $icon }}
        </svg>
    </div>

    <div class="p-4 text-right">
        <p class="text-blue-gray-600 block font-sans text-sm font-normal leading-normal antialiased">{{ $attributes->get('title') }}</p>
        <h4 class="text-blue-gray-900 block font-sans text-2xl font-semibold leading-snug tracking-normal antialiased">₹{{ $attributes->get('value') }}</h4>
    </div>

    <div class="border-blue-gray-50 border-t p-4">
        <p class="text-blue-gray-600 block font-sans text-base font-normal leading-relaxed antialiased">
            <strong class="text-green-500">+55%</strong>&nbsp;than last week
        </p>
    </div>

</div>
