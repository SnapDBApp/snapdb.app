<x-alert {{ $attributes->merge(['class' => 'bg-red-50']) }}>
    <x-slot:icon>
        <x-tabler-x class="size-6 text-red-600" />
    </x-slot:icon>
    <x-slot:body>
        <p class="text-red-700">{{ $slot }}</p>
    </x-slot:body>
</x-alert>
