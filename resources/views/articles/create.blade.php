<x-main>
    <div class="container">
        <div class="columns mt-6 mb-6">
            <div class="column">
                <h1 class="title is-2">Create a new article</h1>
            </div>
        </div>
        <br>
        <h2 class="subtitle is-6 is-italic">
            Please fill out all the form fields and click 'Submit'
        </h2>

        {{-- Here are all the form fields --}}
        <div class="field">
            <label for="name" class="label">Name</label>
            <div class="control has-icons-right">
                <input type="text" name="name" placeholder="Enter the bar's name..."
                       class="input @error('name') is-danger @enderror"
                       value="{{ old('name') }}" autocomplete="name" autofocus>
                @error('name')
                <span class="icon has-text-danger is-small is-right">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                @enderror
            </div>
            @error('name')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <label for="type" class="label">Type</label>
            <div class="control has-icons-right">
                <x-wysiwyg name="type" height="120" class="@error('type') is-danger @enderror"
                           placeholder="Enter the bar's waldo..."
                           value="{{ old('type') }}" ></x-wysiwyg>
                @error('type')
                <span class="icon has-text-danger is-small is-right">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                @enderror
            </div>
            @error('type')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <label for="is_active" class="label">Is_Active</label>
            <div class="control has-icons-right">
                <input type="text" name="is_active" placeholder="Enter the categories is_active..."
                       class="input @error('is_active') is-danger @enderror"
                       value="{{ old('is_active') }}" autocomplete="is_active" autofocus>
                @error('is_active')
                <span class="icon has-text-danger is-small is-right">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                @enderror
            </div>
            @error('is_active')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>


        <div class="field is-grouped">
            <div class="control">
                <button type="submit" class="button is-primary">Save</button>
            </div>
            <div class="control">
                <a type="button" href="{{ url()->previous() }}" class="button is-light">Cancel</a>
            </div>
            <div class="control">
                <button type="reset" class="button is-warning">Reset</button>
            </div>
        </div>
        </form>
    </div>
</x-main>
