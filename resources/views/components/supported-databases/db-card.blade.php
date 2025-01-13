@props(['supportedDatabase'])

<a href="{{ route('supported-databases.show', ['slug' => $supportedDatabase['slug']]) }}"
   class="text-sm/6 text-gray-700 hover:text-gray-900 bg-white hover:bg-gray-50 shadow-md border rounded-lg p-6 flex gap-4"
>
    <img src="{{ asset('img/db/' . $supportedDatabase['slug'] . '.png') }}" alt="{{ $supportedDatabase['name'] }} logo" class="size-16">

    <div>
        <h4 class="font-semibold text-xl">{{ $supportedDatabase['name'] }}</h4>

        <span class="inline-block rounded-md border px-1 text-xs">
            <x-tabler-check class="size-4 text-green-700 inline" />
            {{ count($supportedDatabase['versions']) }} versions
        </span>
    </div>
</a>
