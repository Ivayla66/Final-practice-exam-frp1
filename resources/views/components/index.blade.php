<x-main>
    <section class="section">
        <div class="container">
            <div class="navbar">
                <div class="navbar-start">
                    <div class="block">
                        <h1 class="title is-4">My Categories</h1>
                        <h2 class="subtitle is-6 is-italic">
                            List of categories that are created:
                        </h2>
                    </div>
                </div>
                <div class="navbar-end">
                    <a href="{{ route('categories.create') }}" class="button is-primary">Create a New Category</a>
                </div>
            </div>
            <table class="table m-6">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Is_Active</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <x-bar.table-row :$bar></x-bar.table-row>
                @endforeach
                </tbody>
            </table>
            <div>{{$category->links('pagination::bootstrap-4')}}</div>
        </div>
    </section>
</x-main>
