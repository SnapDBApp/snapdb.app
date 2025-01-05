<div {{ $attributes->merge(['class' => 'relative group select-none macos-notification font-apple bg-macos shadow-md p-4 rounded-3xl flex gap-4']) }}>
    <div class="flex items-center">
        <img class="h-[50px] w-[50px] px-2" src="{{ asset('img/snapdb-logo.svg') }}" alt="SnapDB Logo">
    </div>
    <div class="flex-1">
        <h1 class="font-bold block">{{ $title }}</h1>
        <p>{{ $body }}</p>
    </div>

    <div class="opacity-0 group-hover:opacity-100 transition-all ease-in duration-100 cursor-pointer absolute -top-1 -left-1 rounded-full bg-gray-200 p-1">
        <x-tabler-x class="size-4 text-gray-400" />
    </div>
</div>
