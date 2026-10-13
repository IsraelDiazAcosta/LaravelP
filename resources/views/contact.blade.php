@extends('master')


@section('contect')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<body>
    <h1>Contac1 </h1>
    <h2>Nombre: {{'Israel'}}</h2>
    
    @if($name != 'israel')
    <p>-------------------------------------------</p>
    <h1>Tu nombre no es israel</h1>
        @else
        <p>-------------------------------------------</p>
        <h1>Tu nombre es {{ $name }}</h1>
    @endif
    <ul>
    @foreach ([1,2,3,4,5] as $item)
    <li>{{$item  }}</li>
    @endforeach
    </ul>
</body>
</html>
@endsection

