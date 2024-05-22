<x-app-layout>
    <div class="flex w-full justify-normal gap-5">
        {{-- Sidebar --}}
        @include('store.partials.sidenav')

        {{-- Content --}}
        <div class="flex w-full flex-col flex-wrap gap-x-6 gap-y-10 py-10 pr-6">

            <h1 class="mb-4 text-center text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl">Your Stores</h1>

            <x-table>
                <x-slot:thead>
                    <x-table.th>Store Name</x-table.th>
                    <x-table.th>Full Address</x-table.th>
                    <x-table.th>Product Count</x-table.th>
                    <x-table.th>Business Hours</x-table.th>
                    <x-table.th>Status</x-table.th>
                    <x-table.th>Actions</x-table.th>
                </x-slot:thead>

                @foreach ($stores as $store)
                    <x-table.tr>
                        <x-table.td type="1">{{ $store->name }}</x-table.td>
                        <x-table.td>
                            {{ $store->storeAddress->getFullAddressAttribute() }}
                        </x-table.td>
                        <x-table.td>
                            {{ $store->products->count() }}
                        </x-table.td>
                        <x-table.td>
                            @foreach ($store->businessHours as $hours)
                                <div>{{ ucfirst($hours->day) }}: {{ $hours->open_time }} - {{ $hours->close_time }}</div>
                            @endforeach
                        </x-table.td>
                        <x-table.td type="2" status="{{ $store->isOpen() ? 'Open' : 'Closed' }}">
                            {{ $store->isOpen() ? 'Open' : 'Closed' }}
                        </x-table.td>
                        <x-table.td>
                            <div class="inline-flex items-center rounded-md shadow-sm">
                                <a class="hover:border-b-6 inline-flex cursor-pointer items-center space-x-1 rounded-l-lg border border-b-4 border-green-600 bg-green-400 px-3 py-1 text-sm font-medium text-white transition-all hover:-translate-y-1 hover:brightness-110 active:translate-y-2 active:border-b-2 active:brightness-90" href="{{ route('store.edit', $store) }}">
                                    <span>
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                        </svg>
                                    </span>
                                </a>
                                <form action="{{ route('store.destroy', $store) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this store?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="hover:border-b-6 inline-flex cursor-pointer items-center space-x-1 rounded-r-lg border border-b-4 border-red-600 bg-red-400 px-3 py-1 text-sm font-medium text-white transition-all hover:-translate-y-1 hover:brightness-110 active:translate-y-2 active:border-b-2 active:brightness-90" type="submit">
                                        <span>
                                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M15.5 4H19v2H5V4h3.5l1-1h5l1 1ZM8 21c-1.1 0-2-.9-2-2V7h12v12c0 1.1-.9 2-2 2H8Z" clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    </button>
                                </form>
                            </div>
                        </x-table.td>
                    </x-table.tr>
                @endforeach
            </x-table>
        </div>
    </div>
</x-app-layout>
