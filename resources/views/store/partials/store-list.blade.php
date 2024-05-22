@props(['stores'])

<x-table title="Your Store" viewAllLink="true" link="{{ route('store.index') }}">
    <x-slot:thead>
        <x-table.th>Store Name</x-table.th>
        <x-table.th>Location</x-table.th>
        <x-table.th>Status</x-table.th>
        <x-table.th>Actions</x-table.th>
    </x-slot:thead>

    @foreach ($stores as $store)
        <x-table.tr>
            <x-table.td type="1">{{ $store->name }}</x-table.td>
            <x-table.td>{{ $store->storeAddresses->first()->address_line_one }}</x-table.td>
            <x-table.td type="2" status="{{ $store->isOpen() ? 'Open' : 'Closed' }}"></x-table.td>
            <x-table.td type="3" linkUrl="{{ route('store.show', $store) }}" btnName="Open">
            </x-table.td>
        </x-table.tr>
    @endforeach
</x-table>
