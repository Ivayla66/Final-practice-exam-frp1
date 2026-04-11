<x-main>
    <div class="container">
        <h1 class="title is-2">Delivery #{{ $delivery->id }}</h1>

        <div class="box">
            <p><strong>Name:</strong> {{ $delivery->name }}</p>
            <p><strong>Status:</strong> {{ ucfirst($delivery->status) }}</p>
            <p><strong>Order deadline:</strong> {{ $delivery->order_deadline?->format('Y-m-d H:i') ?? 'N/A' }}</p>
            <p><strong>Can accept orders:</strong> {{ $delivery->can_accept_orders ? 'Yes' : 'No' }}</p>
        </div>

        <h2 class="title is-4">Product Orders</h2>
        @foreach($delivery->productOrders as $order)
            <div class="box">
                <p><strong>{{ $order->code }}</strong></p>
                <p>{{ $order->description }}</p>
            </div>
        @endforeach

        <a href="{{ route('deliveries.index') }}" class="button is-light">Back</a>
    </div>
</x-main>
