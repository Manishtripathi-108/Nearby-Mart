<section>
    <!--products according to  browsing history-->
    <!--related viewed poducts-->
     @if(auth()->check())
     @if(auth()->user()->user_type == 'Customer')
    <div class="flex h-auto flex-col space-y-4">
        <h2 class="ml-8 p-2 text-2xl font-bold">Inspired by your browsing history</h2>
        <!--product card-slider-->
        <div class="relative m-8 flex-col flex-nowrap items-center justify-evenly space-x-4 md:flex md:flex-row">
            <!--left slider-button-->
            <div class="absolute left-2 top-1/2 hidden -translate-y-1/2 transform items-center md:flex">
                <button class="flex h-8 w-8 items-center justify-center rounded-full bg-gray-800 text-white" id="prev">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
            </div>

            <!--right slider-button-->
            <div class="absolute right-2 top-1/2 hidden -translate-y-1/2 transform items-center md:flex">
                <button class="flex h-8 w-8 items-center justify-center rounded-full bg-gray-800 text-white" id="next">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            <!--product cards-->
            <div class="bg-white py-6 sm:py-8 lg:py-12">
                <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                    <!-- text - start -->

                    <!-- text - end -->

                    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        <!-- product - start -->
                        <div>
                            <a class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100" href="#">
                                <img class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110"
                                    src="https://images.unsplash.com/photo-1552374196-1ab2a1c593e8?auto=format&q=75&fit=crop&crop=top&w=600&h=700"
                                    alt="Photo by Austin Wade" loading="lazy" />

                                <span
                                    class="absolute left-0 top-3 rounded-r-lg bg-red-500 px-3 py-1.5 text-sm font-semibold uppercase tracking-wider text-white">-50%</span>
                            </a>

                            <div class="flex items-start justify-between gap-2 rounded-b-lg bg-gray-100 p-4">
                                <div class="flex flex-col">
                                    <a class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg"
                                        href="#">Fancy
                                        Outfit</a>
                                    <span class="text-sm text-gray-500 lg:text-base">by Fancy Brand</span>
                                </div>

                                <div class="flex flex-col items-end">
                                    <span class="font-bold text-gray-600 lg:text-lg">$19.99</span>
                                    <span class="text-sm text-red-500 line-through">$39.99</span>
                                </div>
                            </div>
                        </div>
                        <!-- product - end -->

                        <!-- product - start -->
                        <div>
                            <a class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100" href="#">
                                <img class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110"
                                    src="https://images.unsplash.com/photo-1523359346063-d879354c0ea5?auto=format&q=75&fit=crop&crop=top&w=600&h=700"
                                    alt="Photo by Nick Karvounis" loading="lazy" />
                            </a>

                            <div class="flex items-start justify-between gap-2 rounded-b-lg bg-gray-100 p-4">
                                <div class="flex flex-col">
                                    <a class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg"
                                        href="#">Cool
                                        Outfit</a>
                                    <span class="text-sm text-gray-500 lg:text-base">by Cool Brand</span>
                                </div>

                                <div class="flex flex-col items-end">
                                    <span class="font-bold text-gray-600 lg:text-lg">$29.99</span>
                                </div>
                            </div>
                        </div>
                        <!-- product - end -->

                        <!-- product - start -->
                        <div>
                            <a class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100" href="#">
                                <img class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110"
                                    src="https://images.unsplash.com/photo-1548286978-f218023f8d18?auto=format&q=75&fit=crop&crop=top&w=600&h=700"
                                    alt="Photo by Austin Wade" loading="lazy" />
                            </a>

                            <div class="flex items-start justify-between gap-2 rounded-b-lg bg-gray-100 p-4">
                                <div class="flex flex-col">
                                    <a class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg"
                                        href="#">Nice
                                        Outfit</a>
                                    <span class="text-sm text-gray-500 lg:text-base">by Nice Brand</span>
                                </div>

                                <div class="flex flex-col items-end">
                                    <span class="font-bold text-gray-600 lg:text-lg">$35.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- product - end -->

                        <!-- product - start -->
                        <div>
                            <a class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100" href="#">
                                <img class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110"
                                    src="https://images.unsplash.com/photo-1566207274740-0f8cf6b7d5a5?auto=format&q=75&fit=crop&crop=top&w=600&h=700"
                                    alt="Photo by Vladimir Fedotov" loading="lazy" />
                            </a>

                            <div class="flex items-start justify-between gap-2 rounded-b-lg bg-gray-100 p-4">
                                <div class="flex flex-col">
                                    <a class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg"
                                        href="#">Lavish
                                        Outfit</a>
                                    <span class="text-sm text-gray-500 lg:text-base">by Lavish Brand</span>
                                </div>

                                <div class="flex flex-col items-end">
                                    <span class="font-bold text-gray-600 lg:text-lg">$49.99</span>
                                </div>
                            </div>
                        </div>
                        <!-- product - end -->
                    </div>
                </div>
            </div>

        </div>

        <!--search history-->
        <div class="flex h-auto flex-col space-y-4">
            <h2 class="ml-8 p-2 text-2xl font-bold">Your browsing history</h2>
            <!--product card-slider-->
            <div class="relative m-8 hidden flex-row flex-nowrap items-center justify-evenly space-x-4 md:flex">
                <!--left slider-button-->
                <div class="absolute left-2 top-1/2 flex -translate-y-1/2 transform items-center">
                    <button class="flex h-8 w-8 items-center justify-center rounded-full bg-gray-800 text-white"
                        id="prev">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                </div>

                <!--right slider-button-->
                <div class="absolute right-2 top-1/2 flex -translate-y-1/2 transform items-center">
                    <button class="flex h-8 w-8 items-center justify-center rounded-full bg-gray-800 text-white"
                        id="next">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>

                <!--product cards-->
                <div class="bg-white py-6 sm:py-8 lg:py-12">
                    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                        <!-- text - start -->

                        <!-- text - end -->

                        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                            <!-- product - start -->
                            <div>
                                <a class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100" href="#">
                                    <img class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110"
                                        src="https://images.unsplash.com/photo-1552374196-1ab2a1c593e8?auto=format&q=75&fit=crop&crop=top&w=600&h=700"
                                        alt="Photo by Austin Wade" loading="lazy" />

                                    <span
                                        class="absolute left-0 top-3 rounded-r-lg bg-red-500 px-3 py-1.5 text-sm font-semibold uppercase tracking-wider text-white">-50%</span>
                                </a>

                                <div class="flex items-start justify-between gap-2 rounded-b-lg bg-gray-100 p-4">
                                    <div class="flex flex-col">
                                        <a class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg"
                                            href="#">Fancy
                                            Outfit</a>
                                        <span class="text-sm text-gray-500 lg:text-base">by Fancy Brand</span>
                                    </div>

                                    <div class="flex flex-col items-end">
                                        <span class="font-bold text-gray-600 lg:text-lg">$19.99</span>
                                        <span class="text-sm text-red-500 line-through">$39.99</span>
                                    </div>
                                </div>
                            </div>
                            <!-- product - end -->

                            <!-- product - start -->
                            <div>
                                <a class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100" href="#">
                                    <img class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110"
                                        src="https://images.unsplash.com/photo-1523359346063-d879354c0ea5?auto=format&q=75&fit=crop&crop=top&w=600&h=700"
                                        alt="Photo by Nick Karvounis" loading="lazy" />
                                </a>

                                <div class="flex items-start justify-between gap-2 rounded-b-lg bg-gray-100 p-4">
                                    <div class="flex flex-col">
                                        <a class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg"
                                            href="#">Cool
                                            Outfit</a>
                                        <span class="text-sm text-gray-500 lg:text-base">by Cool Brand</span>
                                    </div>

                                    <div class="flex flex-col items-end">
                                        <span class="font-bold text-gray-600 lg:text-lg">$29.99</span>
                                    </div>
                                </div>
                            </div>
                            <!-- product - end -->

                            <!-- product - start -->
                            <div>
                                <a class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100" href="#">
                                    <img class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110"
                                        src="https://images.unsplash.com/photo-1548286978-f218023f8d18?auto=format&q=75&fit=crop&crop=top&w=600&h=700"
                                        alt="Photo by Austin Wade" loading="lazy" />
                                </a>

                                <div class="flex items-start justify-between gap-2 rounded-b-lg bg-gray-100 p-4">
                                    <div class="flex flex-col">
                                        <a class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg"
                                            href="#">Nice
                                            Outfit</a>
                                        <span class="text-sm text-gray-500 lg:text-base">by Nice Brand</span>
                                    </div>

                                    <div class="flex flex-col items-end">
                                        <span class="font-bold text-gray-600 lg:text-lg">$35.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- product - end -->

                            <!-- product - start -->
                            <div>
                                <a class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100" href="#">
                                    <img class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110"
                                        src="https://images.unsplash.com/photo-1566207274740-0f8cf6b7d5a5?auto=format&q=75&fit=crop&crop=top&w=600&h=700"
                                        alt="Photo by Vladimir Fedotov" loading="lazy" />
                                </a>

                                <div class="flex items-start justify-between gap-2 rounded-b-lg bg-gray-100 p-4">
                                    <div class="flex flex-col">
                                        <a class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg"
                                            href="#">Lavish
                                            Outfit</a>
                                        <span class="text-sm text-gray-500 lg:text-base">by Lavish Brand</span>
                                    </div>

                                    <div class="flex flex-col items-end">
                                        <span class="font-bold text-gray-600 lg:text-lg">$49.99</span>
                                    </div>
                                </div>
                            </div>
                            <!-- product - end -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endif
     @endif


    <div class="relative mt-16 bg-blue-600">
        <svg class="absolute top-0 -mt-5 h-6 w-full text-blue-600 sm:-mt-10 sm:h-16" preserveAspectRatio="none"
            viewBox="0 0 1440 54">
            <path fill="currentColor"
                d="M0 22L120 16.7C240 11 480 1.00001 720 0.700012C960 1.00001 1200 11 1320 16.7L1440 22V54H1320C1200 54 960 54 720 54C480 54 240 54 120 54H0V22Z">
            </path>
        </svg>
        <div class="mx-auto px-4 pt-12 sm:max-w-xl md:max-w-full md:px-24 lg:max-w-screen-xl lg:px-8">
            <div class="row-gap-10 mb-8 grid gap-16 lg:grid-cols-6">
                <div class="md:max-w-md lg:col-span-2">
                    <a class="inline-flex items-center" href="/" title="Company" aria-label="Go home">
                        <svg class="text-teal-accent-400 w-8" viewBox="0 0 24 24" stroke-linejoin="round"
                            stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" stroke="currentColor"
                            fill="none">
                            <rect x="3" y="1" width="7" height="12"></rect>
                            <rect x="3" y="17" width="7" height="6"></rect>
                            <rect x="14" y="1" width="7" height="6"></rect>
                            <rect x="14" y="11" width="7" height="12"></rect>
                        </svg>
                        <span class="ml-2 text-xl font-bold uppercase tracking-wide text-gray-100">Town Kart</span>
                    </a>
                    <div class="mt-4 lg:max-w-sm">
                        <p class="text-sm text-blue-50">
                            Welcome to Town Kart, your one-stop destination for all your shopping needs. Explore a
                            wide range of products at affordable prices.
                        </p>
                        <p class="text-deep-purple-50 mt-4 text-sm">

                        </p>
                    </div>
                </div>
                <div class="row-gap-8 grid grid-cols-2 gap-5 md:grid-cols-4 lg:col-span-4">
                    <div>
                        <p class="text-teal-accent-400 font-semibold tracking-wide">
                            Product Category
                        </p>
                        <ul class="mt-2 space-y-2">
                            <li>
                                <a class="text-deep-purple-50 hover:text-teal-accent-400 transition-colors duration-300"
                                    href="/">Electronics</a>
                            </li>
                            <li>
                                <a class="text-deep-purple-50 hover:text-teal-accent-400 transition-colors duration-300"
                                    href="/">Clothing</a>
                            </li>
                            <li>
                                <a class="text-deep-purple-50 hover:text-teal-accent-400 transition-colors duration-300"
                                    href="/">Home & Kitchen</a>
                            </li>
                            <li>
                                <a class="text-deep-purple-50 hover:text-teal-accent-400 transition-colors duration-300"
                                    href="/">Health & Beauty</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="border-deep-purple-accent-200 flex flex-col justify-between border-t pb-10 pt-5 sm:flex-row">
                <p class="text-sm text-gray-100">
                    © Copyright 2024 Town Kart All rights reserved.
                </p>
                <div class="mt-4 flex items-center space-x-4 sm:mt-0">
                    <a class="text-deep-purple-100 hover:text-teal-accent-400 transition-colors duration-300" href="">
                        <svg class="h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M24,4.6c-0.9,0.4-1.8,0.7-2.8,0.8c1-0.6,1.8-1.6,2.2-2.7c-1,0.6-2,1-3.1,1.2c-0.9-1-2.2-1.6-3.6-1.6 c-2.7,0-4.9,2.2-4.9,4.9c0,0.4,0,0.8,0.1,1.1C7.7,8.1,4.1,6.1,1.7,3.1C1.2,3.9,1,4.7,1,5.6c0,1.7,0.9,3.2,2.2,4.1 C2.4,9.7,1.6,9.5,1,9.1c0,0,0,0,0,0.1c0,2.4,1.7,4.4,3.9,4.8c-0.4,0.1-0.8,0.2-1.3,0.2c-0.3,0-0.6,0-0.9-0.1c0.6,2,2.4,3.4,4.6,3.4 c-1.7,1.3-3.8,2.1-6.1,2.1c-0.4,0-0.8,0-1.2-0.1c2.2,1.4,4.8,2.2,7.5,2.2c9.1,0,14-7.5,14-14c0-0.2,0-0.4,0-0.6 C22.5,6.4,23.3,5.5,24,4.6z">
                            </path>
                        </svg>
                    </a>
                    <a class="text-deep-purple-100 hover:text-teal-accent-400 transition-colors duration-300" href="">
                        <svg class="h-6" viewBox="0 0 30 30" fill="currentColor">
                            <circle cx="15" cy="15" r="4"></circle>
                            <path
                                d="M19.999,3h-10C6.14,3,3,6.141,3,10.001v10C3,23.86,6.141,27,10.001,27h10C23.86,27,27,23.859,27,19.999v-10   C27,6.14,23.859,3,19.999,3z M15,21c-3.309,0-6-2.691-6-6s2.691-6,6-6s6,2.691,6,6S18.309,21,15,21z M22,9c-0.552,0-1-0.448-1-1   c0-0.552,0.448-1,1-1s1,0.448,1,1C23,8.552,22.552,9,22,9z">
                            </path>
                        </svg>
                    </a>
                    <a class="text-deep-purple-100 hover:text-teal-accent-400 transition-colors duration-300" href="">
                        <svg class="h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M22,0H2C0.895,0,0,0.895,0,2v20c0,1.105,0.895,2,2,2h11v-9h-3v-4h3V8.413c0-3.1,1.893-4.788,4.659-4.788 c1.325,0,2.463,0.099,2.795,0.143v3.24l-1.918,0.001c-1.504,0-1.795,0.715-1.795,1.763V11h4.44l-1,4h-3.44v9H22c1.105,0,2-0.895,2-2 V2C24,0.895,23.105,0,22,0z">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>