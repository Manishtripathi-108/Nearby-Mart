<x-app-layout>
    <div class="flex w-full justify-normal gap-5">
        {{-- Sidebar --}}
        @include('store.partials.sidenav')

        {{-- Content --}}
        <div class="flex w-full flex-col flex-wrap gap-x-6 gap-y-10 py-10 pr-6">

            <div class="grid h-fit w-full gap-x-6 gap-y-10 md:grid-cols-2 xl:grid-cols-4">
                <div class="relative flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">

                    <div class="absolute mx-4 -mt-4 grid h-16 w-16 place-items-center overflow-hidden rounded-xl bg-gradient-to-tr from-blue-600 to-blue-400 bg-clip-border text-white shadow-lg shadow-blue-500/40">
                        <svg class="h-6 w-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 7.5a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"></path>
                            <path fill-rule="evenodd" d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 14.625v-9.75zM8.25 9.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM18.75 9a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V9.75a.75.75 0 00-.75-.75h-.008zM4.5 9.75A.75.75 0 015.25 9h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H5.25a.75.75 0 01-.75-.75V9.75z" clip-rule="evenodd"></path>
                            <path d="M2.25 18a.75.75 0 000 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 00-.75-.75H2.25z">
                            </path>
                        </svg>
                    </div>

                    <div class="p-4 text-right">
                        <p class="text-blue-gray-600 block font-sans text-sm font-normal leading-normal antialiased">
                            Today's Money</p>
                        <h4 class="text-blue-gray-900 block font-sans text-2xl font-semibold leading-snug tracking-normal antialiased">
                            $53k</h4>
                    </div>

                    <div class="border-blue-gray-50 border-t p-4">
                        <p class="text-blue-gray-600 block font-sans text-base font-normal leading-relaxed antialiased">
                            <strong class="text-green-500">+55%</strong>&nbsp;than last week
                        </p>
                    </div>
                </div>

                <div class="relative flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                    <div class="absolute mx-4 -mt-4 grid h-16 w-16 place-items-center overflow-hidden rounded-xl bg-gradient-to-tr from-pink-600 to-pink-400 bg-clip-border text-white shadow-lg shadow-pink-500/40">
                        <svg class="h-6 w-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="p-4 text-right">
                        <p class="text-blue-gray-600 block font-sans text-sm font-normal leading-normal antialiased">
                            Today's Users</p>
                        <h4 class="text-blue-gray-900 block font-sans text-2xl font-semibold leading-snug tracking-normal antialiased">
                            2,300</h4>
                    </div>
                    <div class="border-blue-gray-50 border-t p-4">
                        <p class="text-blue-gray-600 block font-sans text-base font-normal leading-relaxed antialiased">
                            <strong class="text-green-500">+3%</strong>&nbsp;than last month
                        </p>
                    </div>
                </div>

                <div class="relative flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                    <div class="absolute mx-4 -mt-4 grid h-16 w-16 place-items-center overflow-hidden rounded-xl bg-gradient-to-tr from-green-600 to-green-400 bg-clip-border text-white shadow-lg shadow-green-500/40">
                        <svg class="h-6 w-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z">
                            </path>
                        </svg>
                    </div>
                    <div class="p-4 text-right">
                        <p class="text-blue-gray-600 block font-sans text-sm font-normal leading-normal antialiased">New
                            Clients</p>
                        <h4 class="text-blue-gray-900 block font-sans text-2xl font-semibold leading-snug tracking-normal antialiased">
                            3,462</h4>
                    </div>
                    <div class="border-blue-gray-50 border-t p-4">
                        <p class="text-blue-gray-600 block font-sans text-base font-normal leading-relaxed antialiased">
                            <strong class="text-red-500">-2%</strong>&nbsp;than yesterday
                        </p>
                    </div>
                </div>

                <div class="relative flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                    <div class="absolute mx-4 -mt-4 grid h-16 w-16 place-items-center overflow-hidden rounded-xl bg-gradient-to-tr from-orange-600 to-orange-400 bg-clip-border text-white shadow-lg shadow-orange-500/40">
                        <svg class="h-6 w-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z">
                            </path>
                        </svg>
                    </div>
                    <div class="p-4 text-right">
                        <p class="text-blue-gray-600 block font-sans text-sm font-normal leading-normal antialiased">
                            Sales</p>
                        <h4 class="text-blue-gray-900 block font-sans text-2xl font-semibold leading-snug tracking-normal antialiased">
                            $103,430</h4>
                    </div>
                    <div class="border-blue-gray-50 border-t p-4">
                        <p class="text-blue-gray-600 block font-sans text-base font-normal leading-relaxed antialiased">
                            <strong class="text-green-500">+5%</strong>&nbsp;than yesterday
                        </p>
                    </div>
                </div>
            </div>

            {{-- Recent Orders table --}}
            <livewire:recent-orders />

            <div class="flex h-fit w-full gap-x-6 gap-y-10">

                {{-- Top products table --}}
                @include('store.partials.best-selling-products-list', ['products' => $topProducts])

                {{-- Your Store table --}}
                @include('store.partials.store-list', ['stores' => $stores])

                {{-- Payments table --}}
                @include('store.partials.payments-list', ['payments' => $payments]) 
            </div>
        </div>
    </div>
</x-app-layout>
