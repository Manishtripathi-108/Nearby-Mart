<x-app-layout>
    <div class="container mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg">
        <div class="flex justify-between items-center border-b pb-4 mb-4">
            <div>
                <h1 class="text-2xl font-bold text-teal-700">Your Lists</h1>
                <h1 class="text-xl text-gray-600 inline ml-4">Your Friends</h1>
            </div>
            <a href="#" class="text-teal-700">Create a List</a>
        </div>

        <div class="flex">
            <!-- Left Side: List Navigation -->
            <div class="w-1/4 border-r pr-4">
                <div class="mb-4">
                    <h2 class="font-bold text-gray-900">Shopping List</h2>
                    <p class="text-sm text-gray-600">Default List</p>
                </div>
                <div class="mb-4">
                    <h2 class="font-bold text-gray-900">Shopping List 1</h2>
                    <p class="text-sm text-gray-600">Private</p>
                </div>
            </div>

            <!-- Right Side: List Details -->
            <div class="w-3/4 pl-4">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <h2 class="text-2xl font-bold">Shopping List</h2>
                        <p class="text-sm text-gray-600">Private</p>
                    </div>
                    <div class="flex space-x-2">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded shadow">Invite</button>
                        <button class="bg-gray-300 text-gray-700 px-4 py-2 rounded shadow">More</button>
                    </div>
                </div>

                <div class="flex justify-between items-center border-b pb-4 mb-4">
                    <div class="flex space-x-2">
                        <button class="text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                            </svg>
                        </button>
                        <button class="text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="text" placeholder="Search this list"
                            class="border border-gray-300 rounded py-2 px-4">
                        <button class="bg-gray-300 text-gray-700 px-4 py-2 rounded shadow">Filter & Sort</button>
                    </div>
                </div>

                <!-- Empty list icon or items go here -->
                <div class="flex justify-center items-center text-gray-400 h-64">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m-6-8h6M5 6h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>