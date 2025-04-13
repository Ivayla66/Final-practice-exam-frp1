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

                        <!-- Code Field Example -->
                        <div class="field">
                            <label class="label">Code</label>
                            <div class="control">
                                <input class="input @error('code') is-danger @enderror"
                                       type="text"
                                       name="code"
                                       value="{{ old('code') }}">
                                @error('code')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Repeat for other fields (description, price, etc.) -->

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
