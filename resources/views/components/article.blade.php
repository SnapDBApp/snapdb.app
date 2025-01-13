<article class="isolate py-40 max-w-2xl mx-auto px-4">
    <h1 class="font-bold text-2xl font-biggo">
        {{ $title }}
    </h1>
    @isset($meta)
    <p class="text-gray-400">{{ $meta }}</p>
    @endisset

    <p class="mt-4">
        {{ $body }}
    </p>
</article>
