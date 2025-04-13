<x-main>
    <div class="container">
        <div class="columns mt-6 mb-6">
            <div class="column">
                <p class="title is-2">Create New Delivery</p>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-half">
                    <form method="POST" action="{{ route('deliveries.store') }}">
                        @csrf

                        <!-- Form fields same as previously provided -->

                        <div class="field is-grouped">
                            <div class="control">
                                <button type="submit" class="button is-primary">Save</button>
                            </div>
                            <div class="control">
                                <a href="{{ route('deliveries.index') }}" class="button is-light">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-main>
