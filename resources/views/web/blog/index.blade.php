@extends('web.blog.layout')

@section('content')
    <h1>Listado</h1>
 <x-web.blog.post.index :posts="$posts" />
    <h1>Listado principal de post</h1>
   
@endsection