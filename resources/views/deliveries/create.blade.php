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

            <!-- Code -->
            <div class="field">
                <label class="label">Code*</label>
                <div class="control">
                    <input class="input @error('code') is-danger @enderror"
                           type="text"
                           name="code"
                           value="{{ old('code') }}"
                           required>
                </div>
                @error('code')<p class="help is-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Description -->
            <div class="field">
                <label class="label">Description*</label>
                <div class="control">
                    <textarea class="textarea @error('description') is-danger @enderror"
                              name="description"
                              required>{{ old('description') }}</textarea>
                </div>
                @error('description')<p class="help is-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Price -->
            <div class="field">
                <label class="label">Price (SEK)*</label>
                <div class="control">
                    <input class="input @error('price_at_purchase') is-danger @enderror"
                           type="number"
                           step="0.01"
                           name="price_at_purchase"
                           value="{{ old('price_at_purchase') }}"
                           required>
                </div>
                @error('price_at_purchase')<p class="help is-danger">{{ $message }}</p>@enderror
            </div>

            <!-- Status -->
            <div class="field">
                <label class="label">Status*</label>
                <div class="control">
                    <div class="select is-fullwidth @error('status') is-danger @enderror">
                        <select name="status" required>
                            <option value="" disabled selected>Select Status</option>
                            <option value="planned" @selected(old('status') == 'planned')>Planned</option>
                            <option value="active" @selected(old('status') == 'active')>Active</option>
                            <option value="processing" @selected(old('status') == 'processing')>Processing</option>
                            <option value="delivered" @selected(old('status') == 'delivered')>Delivered</option>
                        </select>
                    </div>
                </div>
                @error('status')<p class="help is-danger">{{ $message }}</p>@enderror
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
