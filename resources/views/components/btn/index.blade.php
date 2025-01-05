@props(['as' => 'button'])
<{{ $as }} {{ $attributes->merge(['class' => 'relative cursor-pointer items-center font-medium justify-center gap-2 whitespace-nowrap group disabled:opacity-75 disabled:cursor-default disabled:pointer-events-none h-10 text-sm rounded-lg px-4 inline-flex shadow-sm']) }}>
    {{ $slot }}
</{{ $as }}>
