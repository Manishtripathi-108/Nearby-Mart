<div class="hover:shodow-lg fixed bottom-5 right-5 flex w-fit flex-col rounded-2xl border-red-300 bg-red-100 p-3 shadow-md transition-opacity duration-1000 ease-in-out" 
    x-data="{ isVisible: false }" 
    x-init="setTimeout(() => {
        isVisible = true;
        setTimeout(() => isVisible = false, 5000);}, 100)" 
    x-show="isVisible">
    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <svg class="h-10 w-10 rounded-2xl border border-red-100 bg-red-50 p-3 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <div class="ml-3 flex flex-col">
                <div class="text-sm font-medium leading-none">{{ $attribute->get('title') }}</div>
                <p class="mt-1 text-xs leading-none text-gray-600">{{ $slot }}</p>
            </div>
        </div>
        <button class="ml-2" @click="isVisible = false">
            <svg class="h-8 w-8 text-red-500" stroke-width="2" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path d="M6.75827 17.2426L12.0009 12M17.2435 6.75736L12.0009 12M12.0009 12L6.75827 6.75736M12.0009 12L17.2435 17.2426" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </button>
    </div>
</div>
