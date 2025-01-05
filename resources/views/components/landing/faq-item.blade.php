<div
    x-data="{ opened: false }"
    {{ $attributes->merge(['class' => 'pt-6']) }}
>
    <dt>
        <button @click="opened = !opened" type="button" class="cursor-pointer group flex w-full items-start justify-between text-left text-gray-900">
            <span class="text-base/7 group-hover:text-gray-600 font-semibold">{{ $question }}</span>
            <span class="ml-6 flex h-7 items-center">
                <x-tabler-plus x-show="!opened" class="size-6" />
                <x-tabler-chevron-up x-show="opened" class="size-6" />
              </span>
        </button>
    </dt>

    <dd x-show="opened" class="mt-2 pr-12">
        <p class="text-base/7 text-gray-600">
            {{ $answer }}
        </p>
    </dd>
</div>
