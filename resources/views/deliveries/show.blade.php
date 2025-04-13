<x-main>
    <div class="container">
        <div class="columns mt-6 mb-6">
            <div class="column">
                <p class="title is-2">Delivery Details</p>
            </div>
            <div class="column">
                <a href="{{ route('deliveries.index') }}" class="button is-pulled-right">Back to List</a>
            </div>
        </div>

        <div class="box">
            <!-- Display all delivery details -->
            <!-- Include can_accept_orders and other business logic -->

            <div class="field is-grouped mt-5">
                <div class="control">
                    <a href="{{ route('deliveries.edit', $delivery->id) }}" class="button is-primary">Edit</a>
                </div>
                <div class="control">
                    <form action="{{ route('deliveries.destroy', $delivery->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button is-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-main>
