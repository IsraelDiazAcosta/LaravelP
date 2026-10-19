@extends('web.blog.layout')

@section('content')
    <x-web.blog.post.index :posts="$posts">
        <h1>Listado principal de post</h1>
        @slot('header')
            <h1>Listado principal de post -- slot con nombre</h1>
        @endslot
        @slot('footer')
            <footer>
                Pie de pagina
            </footer>
        @endslot
        @slot('extra')
            Extra
        @endslot
    </x-web.blog.post.index> 

@endsection