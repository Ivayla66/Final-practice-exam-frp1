<x-main>
    <div class="container">
        <!-- Success Message -->
        @if(session('success'))
            <div class="notification is-success mb-5">
                <button class="delete"></button>
                {{ session('success') }}
            </div>
        @endif

        <div class="columns">
            <div class="column">
                <h1 class="title is-2">Delivery Details</h1>
            </div>
            <div class="column has-text-right">
                <a href="{{ route('deliveries.index') }}" class="button is-light">
                    Back to List
                </a>
            </div>
        </div>

        <div class="box">
            <div class="content">
                <!-- Delivery Information -->
                <div class="columns">
                    <div class="column">
                        <p><strong>Code:</strong> {{ $delivery->code }}</p>
                        <p><strong>Description:</strong> {{ $delivery->description }}</p>
                        <p><strong>Price:</strong> {{ number_format($delivery->price_at_purchase, 2) }} SEK</p>
                    </div>
                    <div class="column">
                        <p>
                            <strong>Status:</strong>
                            <span class="tag @if($delivery->status === 'delivered') is-dark @elseif($delivery->status === 'active') is-success @else is-info @endif">
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
                        <p><strong>Payment Date:</strong>
                            {{ $delivery->payed_at ? $delivery->payed_at->format('Y-m-d H:i') : 'Not paid' }}
                        </p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="field is-grouped mt-5">
                    <div class="control">
                        <a href="{{ route('deliveries.edit', $delivery->id) }}"
                           class="button is-primary">
                            Edit Delivery
                        </a>
                    </div>
                    <div class="control">
                        <form action="{{ route('deliveries.destroy', $delivery->id) }}"
                              method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="button is-danger"
                                    onclick="return confirm('Are you sure you want to delete this delivery?')">
                                Delete Delivery
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Notification dismissal script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
                $notification = $delete.parentNode;
                $delete.addEventListener('click', () => {
                    $notification.parentNode.removeChild($notification);
                });
            });
        });
    </script>
</x-main>
