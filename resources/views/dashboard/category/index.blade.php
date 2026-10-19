@extends('master')

@section('contect')
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-4 flex justify-end">
            <a class="btn btn-success" href="{{ route('category.create') }}">Create</a>
        </div>

        <div class="overflow-x-auto rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-900">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($categories as $c)
                        <tr>
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->title }}</td>
                            <td>
                                <div class="flex flex-wrap items-center gap-2">
                                    <a class="btn btn-primary" href="{{ route('category.show', $c) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('category.edit', $c) }}">Edit</a>
                                    <form action="{{ route('category.destroy', $c) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="py-8 text-center text-gray-500 dark:text-gray-400" colspan="3">
                                There are no categories yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $categories->links() }}
        </div>
    </div>
@endsection
