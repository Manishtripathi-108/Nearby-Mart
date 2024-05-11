<x-app-layout>
    <div class="flex flex-col w-full justify-center items-center mt-10  ">

        <div class="flex flex-col md:flex-row w-full h-auto justify-center items-center w-full md:w-1/2">
            <h1 class="flex justify-start font-bold text-3xl text-gray-900 w-full">Your Orders</h1>

            <div class="flex flex-row justify-end items-center w-full">
                <livewire:search-bar />
            </div>
        </div>

        <hr class="h-px  bg-gray-900 border text-3xl w-1/2 justify-center font-bold mt-6">


        <ul class="grid grid-flow-col space-x-6 text-center border-b border-gray-200 text-gray-500">
            <li>
                <a href="#page1"
                    class="flex justify-center border-b-4 border-transparent transition eas-in-out delay-2 hover:text-blue-600 hover:border-blue-600 py-4">Orders</a>
            </li>
            <li>
                <a href="#page2"
                    class="flex justify-center border-b-4 border-transparent transition eas-in-out delay-2 hover:text-blue-600 hover:border-blue-600 py-4">Buy Again</a>
            </li>
            <li>
                <a href="#page3"
                    class="flex justify-center border-b-4 border-transparent transition eas-in-out delay-4 hover:text-blue-600 hover:border-blue-600 py-4">Not Yet Shipped</a>
            </li>
            <li>
                <a href="#page4"
                    class="flex justify-center border-b-4 border-transparent transition eas-in-out delay-4 hover:text-blue-600 hover:border-blue-600 py-4">Cancelled Orders</a>
            </li>
        </ul>
          
    </div>
</x-app-layout>