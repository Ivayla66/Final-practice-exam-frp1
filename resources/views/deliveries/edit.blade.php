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
                    @csrf
                    @method('PUT')

                    <!-- Your form fields here -->

                    <div class="field is-grouped">
                        <!-- Save Button (goes to show page on success) -->
                        <div class="control">
                            <button type="submit" class="button is-primary">Save</button>
                        </div>

                        <!-- Cancel Button (goes to show page) -->
                        <div class="control">
                            <a href="{{ route('deliveries.show', $delivery->id) }}"
                               class="button is-light">Cancel</a>
                        </div>

                        <!-- Delete Button (goes to index page) -->
                        <div class="control">
                            <form method="POST" action="{{ route('deliveries.destroy', $delivery->id) }}"
                                  style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button is-danger">Delete</button>
                            </form>
                        </div>
                    </div>

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
