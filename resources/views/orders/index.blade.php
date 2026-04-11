<x-main>
    <div class="container">
        <h1 class="title is-2">All Product Orders</h1>

        <table class="table is-fullwidth">
            <thead>
            <tr>
                <th>Code</th>
                <th>Description</th>
                <th>Price</th>
                <th>Paid</th>
                <th>Delivery</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->code }}</td>
                    <td>{{ $order->description }}</td>
                    <td>{{ $order->price_at_purchase }}</td>
                    <td>{{ $order->payed_at ? 'Yes' : 'No' }}</td>
                    <td>{{ $order->delivery?->name ?? '—' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-main>
