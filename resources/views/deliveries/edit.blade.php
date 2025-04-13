<x-main>
    <div class="container">
        <h1 class="title">Edit Delivery #{{ $delivery->id }}</h1>

        <form method="POST" action="{{ route('deliveries.update', $delivery->id) }}">
            @csrf
            @method('PUT')

            <!-- Code Field -->
            <div class="field">
                <label class="label">Code</label>
                <div class="control">
                    <input class="input"
                           type="text"
                           name="code"
                           value="{{ old('code', $delivery->code) }}"
                           required>
                </div>
                @error('code')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status Field -->
            <div class="field">
                <label class="label">Status</label>
                <div class="control">
                    <div class="select">
                        <select name="status" required>
                            @foreach($statusOptions as $option)
                                <option value="{{ $option }}"
                                    {{ $delivery->status === $option ? 'selected' : '' }}>
                                    {{ ucfirst($option) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Other fields (same pattern as code field) -->

            <div class="field is-grouped">
                <div class="control">
                    <button type="submit" class="button is-primary">Save Changes</button>
                </div>
                <div class="control">
                    <a href="{{ route('deliveries.show', $delivery->id) }}"
                       class="button is-light">Cancel</a>
                </div>
                <div class="control">
                    <button type="button"
                            onclick="if(confirm('Are you sure you want to delete this delivery?')) { document.getElementById('delete-form').submit() }"
                            class="button is-danger">
                        Delete
                    </button>
                </div>
            </div>
        </form>

        <!-- Separate form for delete -->
        <form id="delete-form" method="POST" action="{{ route('deliveries.destroy', $delivery->id) }}" class="is-hidden">
            @csrf
            @method('DELETE')
        </form>
    </div>
</x-main>
