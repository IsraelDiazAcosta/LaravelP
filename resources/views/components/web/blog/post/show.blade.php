
<x-alert class="mb-4" type="info" :message="$post->title" data-id="1" data-priority="medium"> </x-alert>


<div {{ $attributes->merge(['class' => 'bg-red-100']) }}>
    {{ $changeTitle() }}
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->created_at }}</p>
    <p>{{ $post->content }}</p>
</div>