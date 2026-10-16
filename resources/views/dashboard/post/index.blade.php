@extends('master')


@section('contect')



 <a class=" my-3 btn btn-success"  href="{{ route('post.create') }}" target="blank">Create</a>


   <table class="table">
    <thead>
        <tr>
            <th scope="col">
                id
            </th>
            <th scope="col">
                Title
            </th>
            <th scope="col">
                Posted
            </th>
            <th scope="col">
                Category
            </th>
            <th scope="col">
                Options
            </th>
        </tr>
    
        
    </thead>

    <tbody>
        
            @foreach ($posts as $p)
                <tr>
                    <td>
                        {{ $p->id }}
                    </td>
                    <td>
                        {{ $p->title }}
                    </td>
                    <td>
                        {{ $p->posted }}
                    </td>
                    <td>
                        {{ $p->category ->title}}
                    </td>
                    <td>
                        <a class=" my-3 btn btn-primary" href="{{ route('post.show',$p) }}">Show</a>
                        <a class=" my-3 btn btn-primary" href="{{ route('post.edit',$p) }}">Edit</a>
                        <form action="{{ route('post.destroy',$p) }}">
                            @method('DELETE')
                            @csrf
                            <button class=" my-3 btn btn-danger" type="submit">Delete</button>    
                        </form>


                

                    </td>

                </tr>
            @endforeach
        
    </tbody>
   </table>
{{ $posts->links() }}

    @endsection
