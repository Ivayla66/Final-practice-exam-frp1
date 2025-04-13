<x-main>
    <div class="container">
        <h1 class="title is-2">Create New Delivery</h1>

        @if($errors->any())
            <div class="notification is-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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
                              required>{{ old('description') }}</textarea>
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
                           value="{{ old('price_at_purchase') }}"
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
                            <option value="" disabled selected>Select Status</option>
                            <option value="planned" @if(old('status') == 'planned') selected @endif>Planned</option>
                            <option value="active" @if(old('status') == 'active') selected @endif>Active</option>
                            <option value="processing" @if(old('status') == 'processing') selected @endif>Processing</option>
                            <option value="delivered" @if(old('status') == 'delivered') selected @endif>Delivered</option>
                        </select>
                    </div>
                </div>
                @error('status')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- Order Deadline (Optional) -->
            <div class="field">
                <label class="label">Order Deadline (Optional)</label>
                <div class="control">
                    <input class="input"
                           type="datetime-local"
                           name="order_deadline"
                           value="{{ old('order_deadline') }}">
                </div>
            </div>

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
