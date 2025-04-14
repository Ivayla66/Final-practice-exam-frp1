<x-main>
    <div class="container">
        <h1 class="title">Edit Delivery #{{ $delivery->id }}</h1>

        @if($errors->any())
            <div class="notification is-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('deliveries.update', $delivery->id) }}">
            @csrf
            @method('PUT')

            <!-- Code Field -->
            <div class="field">
                <label class="label">Code</label>
                <div class="control">
                    <input class="input @error('code') is-danger @enderror"
                           type="text"
                           name="code"
                           value="{{ old('code', $delivery->code) }}"
                           required>
                </div>
                @error('code')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description Field -->
            <div class="field">
                <label class="label">Description</label>
                <div class="control">
                    <textarea class="textarea @error('description') is-danger @enderror"
                              name="description"
                              required>{{ old('description', $delivery->description) }}</textarea>
                </div>
                @error('description')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- Price Field -->
            <div class="field">
                <label class="label">Price (SEK)</label>
                <div class="control">
                    <input class="input @error('price_at_purchase') is-danger @enderror"
                           type="number"
                           step="0.01"
                           name="price_at_purchase"
                           value="{{ old('price_at_purchase', $delivery->price_at_purchase) }}"
                           required>
                </div>
                @error('price_at_purchase')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status Field -->
            <div class="field">
                <label class="label">Status</label>
                <div class="control">
                    <div class="select is-fullwidth @error('status') is-danger @enderror">
                        <select name="status" required>
                            @foreach(['planned', 'active', 'processing', 'delivered'] as $option)
                                <option value="{{ $option }}"
                                    {{ old('status', $delivery->status) === $option ? 'selected' : '' }}>
                                    {{ ucfirst($option) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @error('status')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

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
