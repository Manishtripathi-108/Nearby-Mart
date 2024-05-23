@props(['payments'])

<x-table title="Your Store" viewAllLink="true" link="{{ route('store.index') }}">
    <x-slot:thead>
        <x-table.th>Order ID</x-table.th>
        <x-table.th>Payment Amount<< /x-table.th>
                <x-table.th>Payment Method</x-table.th>
                <x-table.th>Payment Status</x-table.th>
                <x-table.th>Completed Date</x-table.th>
    </x-slot:thead>

    @foreach($payments as $payment)
    <x-table.tr>
        <x-table.td type="1">{{ $payment->order_id }}</x-table.td>
        <x-table.td>${{ number_format($payment->amount, 2) }}</x-table.td>
        <x-table.td>{{ $payment->payment_method }}</x-table.td>
        <x-table.td type="2" status="{{ $payment->status }}"></x-table.td>
        <x-table.td>{{ $payment->completed_date ? $payment->completed_date->format('M d, Y') : 'N/A' }}</x-table.td>
        </x-table.td>
    </x-table.tr>
    @endforeach
</x-table>