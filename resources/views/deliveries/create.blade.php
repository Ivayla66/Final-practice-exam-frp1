<x-main>
    <div class="container">
        <h1 class="title is-2">Create New Delivery</h1>

        <form method="POST" action="{{ route('deliveries.store') }}">
            @csrf

            <!-- Code Field -->
            <div class="field">
                <label class="label">Code</label>
                <div class="control">
                    <input class="input @error('code') is-danger @enderror"
                           type="text"
                           name="code"
                           value="{{ old('code') }}"
                           required>
                    @error('code')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Other Fields (description, price, status, etc.) -->

            <div class="field is-grouped mt-5">
                <div class="control">
                    <button type="submit" class="button is-primary">Save Delivery</button>
                </div>
                <div class="control">
                    <a href="{{ route('deliveries.index') }}" class="button is-light">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</x-main>
