<x-app-layout>
    <div class="flex h-auto w-full flex-col items-center justify-center">
        <!--header-->
        <div class="m-10 flex h-auto w-full flex-col items-center justify-center md:w-1/2 md:flex-row">
            <h1 class="w-full justify-center text-3xl font-bold text-gray-900 md:justify-start">Your Addresses</h1>
        </div>

        <!--Addresses-->
        <div class="mt-4 flex h-auto w-full flex-row flex-wrap items-center justify-center gap-3">

            <!--Add New Address-->
            <a href="">
                <div class="itmes-center flex h-96 w-80 flex-col justify-center rounded-lg border-2 border-dashed border-gray-300">
                    <div class="itmes-center m-1 flex w-full justify-center p-2 text-gray-500">
                        <svg class="h-16 w-16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </div>
                    <h2 class="flex w-full items-center justify-center">Add New Address</h2>
                </div>
            </a>

            <!--default Address -->
            <div class="relative flex h-96 w-80 flex-col justify-start rounded-lg border-2 border-gray-300">
                <div class="aboslute flex w-full flex-row justify-start rounded-t-lg border-2 border-gray-300 p-2">
                    <p class="text-md font-semibold">Default : </p>
                    <p class="text-lg font-semibold text-blue-600"> Nearby Mart</p>
                </div>
                <div class="m-1 flex h-auto w-full flex-col justify-center p-2">
                    <h1 class="text-2xl font-bold">Name of reciver</h1>
                    <p class="text-lg">line 1</p>
                    <p class="text-lg">line 2</p>
                    <p class="text-lg">City</p>
                    <p class="text-lg">State</p>
                    <p class="text-lg">Country</p>
                    <p class="text-lg">Phone: 08012345678</p>
                    <a class="text-lg text-blue-600 underline" href="#">Add Dilevery instruction</a>
                </div>

                <!-- #bottom buttons-->
                <div class="aboslute jusity-end inset-x-0 bottom-0 flex h-16 w-full flex-row space-x-4 p-2">
                    <a href="">
                        <p class="text-lg text-blue-600">Edit</p>
                    </a>
                    <a href="">
                        <p class="text-lg text-blue-600">Remove</p>
                    </a>
                </div>
            </div>

            <!--another address -->
            @for ($i = 0; $i < 3; $i++)
                <div class="relative flex h-96 w-80 flex-col justify-start rounded-lg border-2 border-gray-300">
                    <div class="m-1 flex h-auto w-full flex-col justify-center p-2">
                        <h1 class="text-2xl font-bold">Name of reciver</h1>
                        <p class="text-lg">line 1</p>
                        <p class="text-lg">line 2</p>
                        <p class="text-lg">City</p>
                        <p class="text-lg">State</p>
                        <p class="text-lg">Country</p>
                        <p class="text-lg">Phone: 08012345678</p>
                        <a class="text-lg text-blue-600 underline" href="#">Add Dilevery instruction</a>
                    </div>
                    <!-- #bottom buttons-->
                    <div class="aboslute jusity-end inset-x-0 bottom-0 flex h-16 w-full flex-row space-x-4 p-2">
                        <a href="">
                            <p class="text-lg text-blue-600">Edit</p>
                        </a>
                        <a href="">
                            <p class="text-lg text-blue-600">Remove</p>
                        </a>
                        <a href="">
                            <p class="text-lg text-blue-600">Set It Default</p>
                        </a>
                    </div>
                </div>
            @endfor
        </div>
    </div>

</x-app-layout>
