
    {{ $slot }}

    {{ $header }}
@foreach ($posts as $p)

    <div class="card card-white">
        <h3>{{ $p->title }}</h3>
        <p>{{ $p->description }}</p>
        <a href="{{ route('blog.show',$p) }}" class="href">Ir</a>
    </div>
@endforeach

{{ $extra }}
{{ $posts->links() }}


{{ $footer }}
