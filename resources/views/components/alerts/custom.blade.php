@props(['color' => 'blue'], ['icon' => ''])

<div class="hover:shodow-lg border-{{ $color }}-300 bg-{{ $color }}-100 fixed bottom-5 right-5 flex w-fit flex-col rounded-2xl p-3 shadow-md transition-opacity duration-1000 ease-in-out" 
        x-data="{ isVisible: false }" 
        x-init="setTimeout(() => {
            isVisible = true;
            setTimeout(() => isVisible = false, 5000);}, 100)" 
        x-show="isVisible">
    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <svg class="border-{{ $color }}-100 bg-{{ $color }}-50 text-{{ $color }}-400 h-10 w-10 rounded-2xl border p-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                {{ $icon }}
            </svg>
            <div class="ml-3 flex flex-col">
                <div class="text-sm font-medium leading-none">{{ $attributes->get('title') }}</div>
                <p class="mt-1 text-xs leading-none text-gray-600">{{ $slot }}</p>
            </div>
        </div>
        <button class="ml-2" @click="isVisible = false">
            <svg class="text-{{ $color }}-500 h-8 w-8" stroke-width="2" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path d="M6.75827 17.2426L12.0009 12M17.2435 6.75736L12.0009 12M12.0009 12L6.75827 6.75736M12.0009 12L17.2435 17.2426" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </button>
    </div>
</div>
