@props(['as' => 'button'])
<x-btn {{ $attributes->merge(['as' => $as, 'class' => 'border border-snapdb-900 hover:bg-white hover:bg-opacity-50 text-gray-700']) }}>
    {{ $slot }}
</x-btn>
