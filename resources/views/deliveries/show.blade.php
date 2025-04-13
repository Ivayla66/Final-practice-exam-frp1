<x-main>
    <div class="container">
        <!-- Success Message -->
        @if(session('success'))
            <div class="notification is-success">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="title is-2">Delivery #{{ $delivery->id }}</h1>

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
                    <p><strong>Can Accept Orders:</strong>
                        @if($delivery->can_accept_orders)
                            <span class="tag is-success">Yes</span>
                        @else
                            <span class="tag is-danger">No</span>
                        @endif
                    </p>
                    <p><strong>Order Deadline:</strong>
                        {{ $delivery->order_deadline ? $delivery->order_deadline->format('Y-m-d H:i') : 'Not specified' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-main>
