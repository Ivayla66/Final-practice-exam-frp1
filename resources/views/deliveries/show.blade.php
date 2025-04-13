<x-main>
    <div class="container">
        <div class="columns mt-6">
            <div class="column">
                <p class="title is-2">Delivery Details</p>
            </div>
        </div>

        <div class="box">
            <div class="content">
                <div class="columns">
                    <div class="column">
                        <p><strong>Code:</strong> {{ $delivery->code }}</p>
                        <p><strong>Description:</strong> {{ $delivery->description }}</p>
                        <p><strong>Price:</strong> {{ number_format($delivery->price_at_purchase, 2) }} SEK</p>
                    </div>
                    <div class="column">
                        <p>
                            <strong>Status:</strong>
                            <span class="tag {{ $statusColors[$delivery->status] }}">
                                {{ ucfirst($delivery->status) }}
                            </span>
                        </p>
                        <p><strong>Can Accept Orders:</strong> {{ $delivery->can_accept_orders ? 'Yes' : 'No' }}</p>
                        <p><strong>Deadline:</strong> {{ $delivery->order_deadline?->format('Y-m-d H:i') ?? 'None' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main>
