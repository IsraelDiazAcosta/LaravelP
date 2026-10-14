@extends('master')


@section('contect')
    <form action=" {{ route('post.store') }}" method="POST")>

        @csrf
        <label for="">Title</label>
        <input type="text" name="title">

        <label for="">Slug</label>
        <input type="text" name="slug">

        <textarea name="content"></textarea>

        <label for="">Category</label>
        <select name="category_id" id="">

            @foreach ($categories as $title=>$id)
                <option value="{{ $id }}">{{ $title }}</option>
                
            @endforeach

        </select>

        <label for="">Description</label>
        <textarea name="description"></textarea>

        <label for="">Posted</label>
        <select name="posted" id="">
            <option value="not">not</option>
            <option value="yes">yes</option>

        </select>



        <button type=" submit">Send</button>
    </form>

    @endsection
