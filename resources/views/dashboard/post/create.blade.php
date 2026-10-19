@extends('master')


@section('contect')

    @include('dashboard.fragment._errors-form')

    @if ($categories->isEmpty())
        <div class="alert alert-warning" role="alert">
            Create a category before adding a post.
        </div>
    @endif

    <form action=" {{ route('post.store') }}" method="POST">

        @include('dashboard.post._form')
    </form>
    @endsection
