@props(['type', 'message'])

<div {{ $attributes->merge(['class' => 'alert alert-' . $type]) }}>
    {{ $message }}
</div>

<ul>
    <li>whereStartsWith: {{ $attributes->whereStartsWith('data') }}</li>
    <li>whereDoesntStartWith: {{ $attributes->whereDoesntStartWith('data') }}</li>
    <li>has class: {{ $attributes->has('class') ? 'sí' : 'no' }}</li>
    <li>data-id: {{ $attributes->get('data-id') }}</li>
    <li>filter: {{ $attributes->filter(fn ($value, $key) => $key === 'data-id') }}</li>
</ul>