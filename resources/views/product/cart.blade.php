<x-app-layout>
<h1>Shopping Cart</h1>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cartItems as $cartItem)
                <tr>
                    <td>{{ $cartItem->product->name }}</td>
                    <td>{{ $cartItem->quantity }}</td>
                    <td>${{ $cartItem->product->price }}</td>
                    <td>
                        <!-- Buy Product Option -->
                        <a href="{{ route('checkout', $cartItem->product->id) }}">Buy</a>
                        <!-- Delete Product Option -->
                        <form action="{{ route('cart.delete', $cartItem->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>