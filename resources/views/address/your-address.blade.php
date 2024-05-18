<x-app-layout>
    <div class="flex flex-col w-full justify-center items-center  h-auto">
        <!--header-->
        <div class="flex flex-col md:flex-row w-full h-auto justify-center items-center w-full md:w-1/2 m-10">
            <h1 class="justify-center md:justify-start font-bold text-3xl text-gray-900 w-full">Your Addresses</h1>
        </div>

        <!--Addresses-->
        <div class="flex flex-row flex-wrap w-full h-auto justify-center items-center gap-3 mt-4 ">

            <!--Add New Address-->
            <a href="">
                <div
                    class=" flex flex-col w-80 h-96 justify-center itmes-center border-dashed border-gray-300 border-2 rounded-lg">
                    <div class="flex w-full justify-center itmes-center p-2 m-1 text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-16 h-16">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </div>
                    <h2 class="flex w-full justify-center items-center">Add New Address</h2>
                </div>
            </a>

            <!--default Address -->
            <div class=" relative flex flex-col w-80 h-96 justify-start border-gray-300 border-2 rounded-lg">
                <div class=" aboslute  w-full flex flex-row justify-start p-2  border-2 border-gray-300 rounded-t-lg ">
                    <p class="text-md font-semibold">Default : </p>
                    <p class="text-lg text-blue-600 font-semibold"> Nearby Mart</p>
                </div>
                <div class="flex flex-col justify-center  w-full h-auto p-2 m-1">
                    <h1 class="text-2xl font-bold">Name of reciver</h1>
                    <p class="text-lg">line 1</p>
                    <p class="text-lg">line 2</p>
                    <p class="text-lg">City</p>
                    <p class="text-lg">State</p>
                    <p class="text-lg">Country</p>
                    <p class="text-lg">Phone: 08012345678</p>
                    <a href="#" class="text-lg underline text-blue-600">Add Dilevery instruction</a>
                </div>

                <!-- #bottom buttons-->
                <div class=" w-full aboslute inset-x-0 bottom-0 h-16 flex flex-row jusity-end p-2 space-x-4 ">
                    <a href="">
                        <p class="text-lg text-blue-600">Edit</p>
                    </a>
                    <a href="">
                        <p class="text-lg text-blue-600">Remove</p>
                    </a>
                </div>
            </div>

            <!--another address -->
            @for($i=0; $i<3; $i++)
            <div class=" relative flex flex-col w-80 h-96 justify-start border-gray-300 border-2 rounded-lg">
                <div class="flex flex-col justify-center  w-full h-auto p-2 m-1">
                    <h1 class="text-2xl font-bold">Name of reciver</h1>
                    <p class="text-lg">line 1</p>
                    <p class="text-lg">line 2</p>
                    <p class="text-lg">City</p>
                    <p class="text-lg">State</p>
                    <p class="text-lg">Country</p>
                    <p class="text-lg">Phone: 08012345678</p>
                    <a href="#" class="text-lg underline text-blue-600">Add Dilevery instruction</a>
                </div>
                <!-- #bottom buttons-->
                <div class=" w-full aboslute inset-x-0 bottom-0 h-16 flex flex-row jusity-end p-2 space-x-4 ">
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