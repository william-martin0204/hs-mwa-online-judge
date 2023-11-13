@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-red-500 font-bold space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
