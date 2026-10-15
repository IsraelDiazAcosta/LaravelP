@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div>
            <h4>{{ $error }}</h4>
        </div>
    @endforeach
@endif