<x-alert {{ $attributes->merge(['class' => 'bg-green-50']) }}>
    <x-slot:icon>
        <x-tabler-check class="size-6 text-green-600" />
    </x-slot:icon>
    <x-slot:body>
        <p class="text-green-700">{{ $slot }}</p>
    </x-slot:body>
</x-alert>
