@props(['as' => 'div'])
<{{ $as }}
    {{ $attributes->merge(['class' => 'text-sm/6 text-gray-700 bg-white shadow-md border rounded-lg p-4']) }}
>
    {{ $slot }}
</{{ $as }}>
