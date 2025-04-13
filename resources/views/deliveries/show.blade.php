<x-main>
    <div class="container">
        <!-- Success Message -->
        @if(session('success'))
            <div class="notification is-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="columns is-vcentered">
            <div class="column">
                <h1 class="title is-2">Delivery #{{ $delivery->id }}</h1>
            </div>
            <div class="column has-text-right">
                <a href="{{ route('deliveries.edit', $delivery->id) }}"
                   class="button is-primary is-light">
                    Edit
                </a>
            </div>
        </div>

        <div class="box">
            <div class="columns">
                <div class="column">
                    <p><strong>Code:</strong> {{ $delivery->code }}</p>
                    <p><strong>Description:</strong> {{ $delivery->description }}</p>
                    <p><strong>Price:</strong> {{ number_format($delivery->price_at_purchase, 2) }} SEK</p>
                </div>
                <div class="column">
                    <p><strong>Status:</strong>
                        <span class="tag @if($delivery->status === 'delivered') is-dark @else is-info @endif">
                            {{ ucfirst($delivery->status) }}
                        </span>
                    </p>
                    <p><strong>Order Deadline:</strong>
                        {{ $delivery->order_deadline ? $delivery->order_deadline->format('Y-m-d H:i') : 'None' }}
                    </p>
                </div>
            </div>
        </div>

        <a href="{{ route('deliveries.index') }}" class="button is-light">
            ← Back to All Deliveries
        </a>
    </div>
</x-main>
