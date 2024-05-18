<x-app-layout>
    <div class="flex h-screen flex-wrap items-center justify-center bg-gray-200">
        <div class="xl:w-2/7 easy-in-out container transform bg-white shadow-lg duration-200 sm:w-full md:w-2/3 lg:w-2/6">
            <div class="h-32 overflow-hidden">
                <img class="w-full" src="https://images.unsplash.com/photo-1605379399642-870262d3d051?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2000&q=80" alt="" />
            </div>
            <div class="-mt-12 flex justify-center px-5">
                <img class="h-32 w-32 rounded-full bg-white p-2" src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2000&q=80" alt="" />

            </div>
            <div class="">
                <div class="px-14 text-center">
                    <h2 class="text-3xl font-bold text-gray-800">{{ $user->name }}</h2>
                    <p class="mt-2 border-none text-gray-400 hover:text-blue-500" type="email">{{ $user->email }}</p>
                    <p class="mt-2 text-sm text-gray-500"> </p>
                </div>
                <hr class="mt-6" />
                <div class="flex bg-gray-50">
                    <div class="w-1/2 cursor-pointer p-4 text-center hover:bg-gray-100">
                        <p><span class="font-semibold">Date of Birth: </span> {{ $user->dob }}</p>
                    </div>
                    <div class="border"></div>
                    <div class="w-1/2 cursor-pointer p-4 text-center hover:bg-gray-100">
                        <p> <span class="font-semibold">2.0 k </span> Following</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
