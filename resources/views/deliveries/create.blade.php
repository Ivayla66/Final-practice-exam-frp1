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

                        <div class="field">
                            <label class="label">Code</label>
                            <div class="control">
                                <input class="input" type="text" name="code" required>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Description</label>
                            <div class="control">
                                <textarea class="textarea" name="description" required></textarea>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Price (SEK)</label>
                            <div class="control">
                                <input class="input" type="number" step="0.01" name="price_at_purchase" required>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Status</label>
                            <div class="control">
                                <div class="select">
                                    <select name="status" required>
                                        <option value="planned">Planned</option>
                                        <option value="active">Active</option>
                                        <option value="processing">Processing</option>
                                        <option value="delivered">Delivered</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Order Deadline (optional)</label>
                            <div class="control">
                                <input class="input" type="datetime-local" name="order_deadline">
                            </div>
                        </div>

                        <div class="field is-grouped">
                            <div class="control">
                                <button type="submit" class="button is-primary">Create Delivery</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-main>
