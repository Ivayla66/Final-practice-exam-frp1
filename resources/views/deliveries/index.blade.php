<x-main>
    <div class="container">
        <div class="columns mt-6 mb-6">
            <div class="column">
                <p class="title is-2">All Product Orders</p>
            </div>
            <div class="column">
                <a href="{{ route('deliveries.create') }}" class="button is-primary is-pulled-right">
                    <span class="icon">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span>Create New Order</span>
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
                                <th style="width: 20%">Code</th>
                                <th style="width: 40%">Description</th>
                                <th style="width: 10%">Price (SEK)</th>
                                <th style="width: 10%">Status</th>
                                <th style="width: 20%">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deliveries as $delivery)
                                <tr @if($delivery->status === 'delivered') style="background-color: #e0e0e0;" @endif>
                                    <td>{{ $delivery->code }}</td>
                                    <td>{{ $delivery->description }}</td>
                                    <td>{{ number_format($delivery->price_at_purchase, 2) }}</td>
                                    <td>
                                        <span class="tag @if($delivery->status === 'delivered') is-dark @else is-info @endif">
                                            {{ ucfirst($delivery->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="field has-addons">
                                            <p class="control">
                                                <a href="{{ route('deliveries.edit', $delivery->id) }}"
                                                   class="button is-small is-light">
                                                    <span class="icon">
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                    <span>Edit</span>
                                                </a>
                                            </p>
                                            @if($delivery->can_accept_orders)
                                                <p class="control">
                                                    <button class="button is-small is-primary">
                                                    <span class="icon">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                        <span>Mark Paid</span>
                                                    </button>
                                                </p>
                                            @endif
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
