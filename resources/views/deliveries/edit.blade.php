<x-main>
    <div class="container">
        <div class="columns mt-6 mb-6">
            <div class="column">
                <p class="title is-2">Edit Delivery</p>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-half">
                    <form method="POST" action="{{ route('deliveries.update', $delivery->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Form fields pre-populated with $delivery data -->

                        <div class="field is-grouped">
                            <div class="control">
                                <button type="submit" class="button is-primary">Save</button>
                            </div>
                            <div class="control">
                                <a href="{{ route('deliveries.index') }}" class="button is-light">Cancel</a>
                            </div>
                            <div class="control">
                                <button type="button"
                                        onclick="confirmDelete()"
                                        class="button is-danger">Delete</button>
                            </div>
                        </div>
                    </form>

                    <form id="deleteForm" method="POST" action="{{ route('deliveries.destroy', $delivery->id) }}">
                        @csrf
                        @method('DELETE')
                    </form>

                    <script>
                        function confirmDelete() {
                            if (confirm('Are you sure you want to delete this delivery?')) {
                                document.getElementById('deleteForm').submit();
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
    </section>
</x-main>
