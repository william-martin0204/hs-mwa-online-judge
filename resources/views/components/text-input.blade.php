@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-2 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg p-2 shadow-sm']) !!}>
