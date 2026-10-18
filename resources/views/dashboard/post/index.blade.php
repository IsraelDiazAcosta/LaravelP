@extends('master')


@section('contect')

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-4 flex justify-end">
            <a class="btn btn-success" href="{{ route('post.create') }}">Create</a>
        </div>

        <div class="overflow-x-auto rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-900">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Posted</th>
                        <th scope="col">Category</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($posts as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->title }}</td>
                            <td>{{ $p->posted }}</td>
                            <td>{{ $p->category->title }}</td>
                            <td>
                                <div class="flex flex-wrap items-center gap-2">
                                    <a class="btn btn-primary" href="{{ route('post.show', $p) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('post.edit', $p) }}">Edit</a>
                                    <form action="{{ route('post.destroy', $p) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="py-8 text-center text-gray-500 dark:text-gray-400" colspan="5">
                                There are no posts yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
