<x-app-layout>
    <div class="flex w-full justify-normal gap-5">
        {{-- Sidebar --}}
        @include('store.partials.sidenav')

        {{-- Content --}}
        <div class="flex w-full flex-col flex-wrap gap-x-6 gap-y-10 py-10 pr-6">

            <x-table title="Your Stores" viewAllLink="false">
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
                            {{ $store->storeAddresses->first()->full_address }}
                        </x-table.td>
                        <x-table.td>
                            {{ $store->products->count() }}
                        </x-table.td>
                        <x-table.td>
                            @foreach ($store->businessHours as $hours)
                                <div>{{ ucfirst($hours->day) }}: {{ $hours->open_time }} - {{ $hours->close_time }}</div>
                            @endforeach
                        </x-table.td>
                        <x-table.td type="2" status="{{ $store->isOpen() ? 'Open' : 'Closed' }}">{{ $store->businessHours }}</x-table.td>
                        <x-table.td type="3">
                            <!-- Actions like edit, delete etc. -->
                            <a href="{{ route('store.edit', $store) }}">Edit</a>
                        </x-table.td>
                    </x-table.tr>
                @endforeach
            </x-table>

        </div>
    </div>
</x-app-layout>
