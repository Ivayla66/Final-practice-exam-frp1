<x-main>
    <div class="container">
        <h1 class="title is-2">Edit Delivery #{{ $delivery->id }}</h1>

        <form method="POST" action="{{ route('deliveries.update', $delivery->id) }}">
            @csrf
            @method('PUT')

            <!-- Form fields (same as before) -->

            <div class="field is-grouped">
                <div class="control">
                    <button type="submit" class="button is-primary">Save Changes</button>
                </div>
                <div class="control">
                    <a href="{{ route('deliveries.show', $delivery->id) }}"
                       class="button is-light">Cancel</a>
                </div>
                <div class="control">
                    <form method="POST"
                          action="{{ route('deliveries.destroy', $delivery->id) }}"
                          style="display: inline;"
                          id="deleteForm">
                        @csrf
                        @method('DELETE')
                        <button type="button"
                                onclick="confirmDelete()"
                                class="button is-danger">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </form>

        <script>
            function confirmDelete() {
                if (confirm('Are you sure you want to delete this delivery?')) {
                    document.getElementById('deleteForm').submit();
                }
            }
        </script>
    </div>
</x-main>
