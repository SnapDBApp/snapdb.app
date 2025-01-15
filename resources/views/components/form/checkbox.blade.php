@props([
    'disabled' => false,
])

@php
    $conditionalClass = $disabled ? 'bg-gray-100 hover:cursor-not-allowed select-none' : 'bg-white';
@endphp

<input
    {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge([
        'type' => 'checkbox',
        'class' => $conditionalClass . ' p-2 border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm'
    ]) !!}
>
