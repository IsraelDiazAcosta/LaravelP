@extends('master')


@section('contect')

    @include('dashboard.fragment._errors-form')


    <form action=" {{ route('post.store') }}" method="POST">

        @include('dashboard.post._form')
    @endsection
