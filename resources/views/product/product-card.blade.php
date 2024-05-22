<!-- product - start -->
<div class="flex flex-col items-center justify-center w-80 h-96 bg-white rounded-lg shadow-lg overflow-hidden m-4">
                            <a class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100" href="#">
                                <img class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110"
                                    src="https://source.unsplash.com/random/200x200?sig={{$product->id}}"
                                    alt="{{$product->name}}" loading="lazy" />

                                <span
                                    class="absolute left-0 top-3 rounded-r-lg bg-red-500 px-3 py-1.5 text-sm font-semibold uppercase tracking-wider text-white">-50%</span>
                            </a>

                            <div class="flex items-start justify-between gap-2 rounded-b-lg bg-gray-100 p-4">
                                <div class="flex flex-col flex-wrap">
                                    <a class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg"
                                        href="#">{{$product->name}}</a>
                                    <span class="text-sm text-gray-500 lg:text-base">by Fancy Brand</span>
                                </div>

                                <div class="flex flex-col items-end">
                                    <span class="font-bold text-gray-600 lg:text-lg">${{$product->discount}}</span>
                                    <span class="text-sm text-red-500 line-through">${{$product->price}}</span>
                                </div>
                            </div>
                        </div>
                        <!-- product - end -->