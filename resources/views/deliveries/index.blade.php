<x-main>
    <div class="container">
        <div class="columns mt-6 mb-6">
            <div class="column">
                <p class="title is-2">All Deliveries</p>
            </div>
            <div class="column">
                <a href="{{ route('deliveries.create') }}" class="button is-primary is-pulled-right">
                    Create New Order
                </a>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-12">
                    <div class="content">
                        <table class="table is-fullwidth">
                            <thead>
                            <tr>
                                <th>Code</th>
                                <th>Description</th>
                                <th>Price (SEK)</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deliveries ?? [] as $delivery)
                                <tr @if($delivery->status === 'delivered') style="background-color: #e0e0e0;" @endif>
                                    <td>{{ $delivery->code }}</td>
                                    <td>{{ $delivery->description }}</td>
                                    <td>{{ number_format($delivery->price_at_purchase, 2) }}</td>
                                    <td>{{ ucfirst($delivery->status) }}</td>
                                    <td>
                                        <div class="buttons">
                                            <a href="{{ route('deliveries.edit', $delivery->id) }}"
                                               class="button is-small is-light">Edit</a>
                                            <a href="{{ route('deliveries.show', $delivery->id) }}"
                                               class="button is-small is-info">View</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-main>
