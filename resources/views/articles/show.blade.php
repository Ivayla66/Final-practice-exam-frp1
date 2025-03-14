<x-article>
    <x-slot name="image">{{ $article->img_url }}</x-slot>
    <x-slot name="title">{{ $article->title }}</x-slot>
    <x-slot name="subtitle">{{ $article->excerpt }}</x-slot>

    <article class="content">
        {!! $article->body !!}
    </article>

</x-article>
@php use Carbon\Carbon @endphp
<x-main>
    <section class="section">
        <div class="container">
            <div class="navbar">
                <div class="navbar-start">
                    <div class="block">
                        <h1 class="title is-4">{{ $category->name }}</h1>
                        <h2 class="title is-6 is-italic">
                            There is the following information for this FooBar item:
                        </h2>
                    </div>
                </div>
                <div class="navbar-end">
                    <div class="buttons">
                        <a href="{{ route('bars.edit', $category) }}" class="button is-info">Edit</a>
                        <x-modal name="delete" title="Confirm delete"
                                 type="danger">
                            <x-slot:trigger class="is-danger">Delete</x-slot:trigger>

                            <form id="delete-post" method="POST" action="{{ route('bars.destroy', $category) }}">
                                @csrf
                                @method('DELETE')
                                Click "Confirm" to delete this Product.
                                <br>
                                <strong>CAUTION!</strong> This action cannot be undone.
                            </form>

                            <x-slot:footer>
                                <div class="control">
                                    <button type="submit" form="delete-post" class="button is-danger">Confirm</button>
                                </div>
                                <div class="control">
                                    <button type="button" class="button is-light cancel">Cancel</button>
                                </div>
                            </x-slot:footer>
                        </x-modal>
                    </div>
                </div>
            </div>
            <table class="table m-6">
                <tbody>
                <tr>
                    <td>Is_Active</td>
                    <td>{{ $category->is_active }}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{ $category->name }}</td>
                </tr>
                <tr>
                </tr>

                <tr>
                    <td>Type</td>
                    <td @if($category->type >= pi()) style="background-color: green" @endif>{{ $category->type }}</td>
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{ Carbon::parse($category->created_at)->diffForHumans() }}</td>
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>{{ Carbon::parse($category->updated_at)->diffForHumans() }}</td>
                </tr>
                <tr>
                    <td>Orden</td>
                    <td>{{ $category->orden }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>
</x-main>
