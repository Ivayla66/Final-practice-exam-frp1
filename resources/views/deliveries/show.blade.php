<x-main>
    <div class="container">
        @if(session('success'))
            <div class="notification is-success">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="title is-2">Delivery #{{ $delivery->id }}</h1>

        <div class="box">
            <div class="content">
                <p><strong>Code:</strong> {{ $delivery->code }}</p>
                <p><strong>Description:</strong> {{ $delivery->description }}</p>
                <p><strong>Price:</strong> {{ number_format($delivery->price_at_purchase, 2) }} SEK</p>
                <p><strong>Status:</strong>
                    <span class="tag @if($delivery->status === 'delivered') is-dark @else is-info @endif">
                        {{ ucfirst($delivery->status) }}
                    </span>
                </p>
            </div>
        </div>

        <a href="{{ route('deliveries.index') }}" class="button is-light">
            Back to All Deliveries
        </a>
    </div>
</x-main>
