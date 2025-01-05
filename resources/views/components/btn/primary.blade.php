@props(['as' => 'button'])
<x-btn {{ $attributes->merge(['as' => $as, 'class' => 'bg-snapdb-900 hover:bg-snapdb-500 text-gray-700']) }}>
    {{ $slot }}
</x-btn>
