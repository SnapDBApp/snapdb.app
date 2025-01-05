@props(['as' => 'button'])
<x-btn {{ $attributes->merge(['as' => $as, 'class' => 'bg-white hover:bg-zinc-50 text-gray-500 border border-zinc-200 hover:border-zinc-200 border-b-zinc-300/80']) }}>
    {{ $slot }}
</x-btn>
