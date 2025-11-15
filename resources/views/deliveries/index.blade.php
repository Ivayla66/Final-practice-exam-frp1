<x-main>
    <div class="container mt-5">
        <h1 class="title">All Deliveries</h1>

        @foreach($deliveries as $delivery)
            <div class="box @if($delivery->status === 'delivered') has-background-grey-lighter @endif">
                <p><strong>Name:</strong> {{ $delivery->name }}</p>
                <p><strong>Status:</strong>
                    <span class="tag
                        @if($delivery->status === 'delivered') is-dark
                        @elseif($delivery->status === 'active') is-info
                        @else is-warning
                        @endif">
                        {{ ucfirst($delivery->status) }}
                    </span>
                </p>
                <p><strong>Order Deadline:</strong> {{ $delivery->order_deadline?->format('Y-m-d H:i') ?? 'N/A' }}</p>
                <p><strong>Can Accept Orders:</strong> {{ $delivery->can_accept_orders ? 'Yes' : 'No' }}</p>

                <a href="{{ route('deliveries.show', $delivery) }}" class="button is-small is-link">View</a>
            </div>
        @endforeach
    </div>
</x-main>
