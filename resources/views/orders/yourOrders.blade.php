<x-app-layout>
    <div class="flex flex-col w-full md:1/2 h-auto justify-center items-center mt-10  ">

        <div class="flex flex-col md:flex-row w-full h-auto justify-center items-center w-full md:w-1/2">
            <h1 class="justify-center md:justify-start font-bold text-3xl text-gray-900 w-full">Your Orders</h1>

            <div class=" hidden md:flex flex-row justify-end items-center w-full">
                <livewire:search-bar />
            </div>
        </div>

        <hr class="hidden md:flex border-gray-900 border-3 text-3xl w-1/2 justify-center font-bold mt-6">


        <ul class="grid w-1/2 grid-flow-col space-x-6 text-center border-b border-gray-200 text-gray-600  ">
            <li>
                <a href="/orders-tab"
                    class="flex justify-center border-b-4 border-transparent transition eas-in-out delay-2 hover:text-blue-600 hover:border-blue-600 py-4">Orders</a>
            </li>
            <li>
                <a href="/buy-again-tab"
                    class="flex justify-center border-b-4 border-transparent transition eas-in-out delay-2 hover:text-blue-600 hover:border-blue-600 py-4">Buy
                    Again</a>
            </li>
            <li>
                <a href="/not-yet-shopping-tab"
                    class="flex justify-center border-b-4 border-transparent transition eas-in-out delay-4 hover:text-blue-600 hover:border-blue-600 py-4">Not
                    Yet Shipped</a>
            </li>
            <li>
                <a href="#page4"
                    class="flex justify-center border-b-4 border-transparent transition eas-in-out delay-4 hover:text-blue-600 hover:border-blue-600 py-4">Cancelled
                    Orders</a>
            </li>
        </ul>

        <div class=" flex flex-col w-1/2 items-center border border-gray-200 rounded-xl space-y-4 shadow-lg ">

            <!--1 upper part-->
            <div class=" flex flex-row p-2 w-full h-auto justify-between items-center bg-gray-200 rounded-t-xl">
                <!--1.1 left part-->
                <div class="flex flex-row justify-start items-center space-x-8 w-full">
                    <div class="flex flex-col justify-start items-start w-full">
                        <p class="font-semibold  text-gray-600">Order Placed</p>
                        <p class="text-gray-600">Date</p>
                    </div>

                    <div class="flex flex-col justify-start items-start w-full">
                        <p class="font-semibold text-gray-600">Total</p>
                        <p class="text-gray-600">Price</p>
                    </div>

                    <div class="flex flex-col justify-start items-start w-full">
                        <p class="font-semibold  text-gray-600">Ship To</p>
                        <select class="text-blue-400 font-semibold border-none w-full bg-gray-200">
                            <option value="1">Address1</option>
                            <option value="2">Addres2</option>
                            <option value="3">Address3</option>
                        </select>
                    </div>
                </div>

                <!-- 1.2 right part-->
                <div class="flex flex-row justify-end items-center space-x-8 w-full">
                    <div class="flex flex-col justify-start items-start ">
                        <div class="flex flex-row justify-start items-center w-full">
                            <p class="font-semibold text-gray-600">Order #</p>
                            <p class="text-gray-600">Order Number</p>
                        </div>
                        <div class="flex flex-row justify-start items-center space-x-2 w-full">
                            <a href="#page4" class="text-blue-400">View Orders Details</a>
                            <hr class="rotate-x-90 h-5 w-1 border-2">
                            <a href="#page4" class="text-blue-400">Invoice</a>

                        </div>
                    </div>

                </div>
            </div>

            <!--ordered products-->
            <div class="flex flex-row justify-between items-center w-full">

                <div class="flex flex-row justify-start items-center space-x-4">
                    <img src="https://via.placeholder.com/150" alt="product" class="w-20 h-20 m-2">
                    <div class="flex flex-col space-y-2 justify-start items-start">
                        <div class="flex flex-row space-x-2 justify-start items-start">
                            <p class="font-semibold text-gray-600">Product Name</p>
                            <p class="text-gray-600">Product Description</p>
                        </div>
                        <button class="flex justify-center items-center border-2 rounded-lg bg-blue-400 p-1">
                            <a href="#page4">View Your Item</a>
                        </button>

                    </div>
                </div>

                <div class="flex flex-row mr-10">
                    <button class="flex justify-center items-center border-2 rounded-lg  p-1">
                        <a href="#page4">Write a product review</a>
                    </button>
                </div>

            </div>


            <div class="flex flex-row justify-between items-center w-full">

                <div class="flex flex-row justify-start items-center space-x-4">
                    <img src="https://via.placeholder.com/150" alt="product" class="w-20 h-20 m-2">
                    <div class="flex flex-col space-y-2 justify-start items-start">
                        <div class="flex flex-row space-x-2 justify-start items-start">
                            <p class="font-semibold text-gray-600">Product Name</p>
                            <p class="text-gray-600">Product Description</p>
                        </div>
                        <button class="flex justify-center items-center border-2 rounded-lg bg-blue-400 p-1">
                            <a href="#page4">View Your Item</a>
                        </button>

                    </div>
                </div>

                <div class="flex flex-row mr-10">
                    <button class="flex justify-center items-center border-2 rounded-lg  p-1">
                        <a href="#page4">Write a product review</a>
                    </button>
                </div>

            </div>

            <!--2 lower part-->
            <div class="flex flex-row justify-start w-full h-11 items-center border-t-2">
                <p class="font-semibold  text-blue-400 ml-10">Archive order</p>
            </div>
        </div>
    </div>

</x-app-layout>