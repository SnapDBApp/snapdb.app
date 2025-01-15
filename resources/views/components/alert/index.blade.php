<div {{ $attributes->merge(['class'=> 'rounded-md bg-green-50 p-4']) }}>
    <div class="flex">
        <div class="flex items-center">
            {{ $icon }}
        </div>
        <div class="ml-3">
            <div class="my-2 text-sm">
                {{ $body }}
            </div>
        </div>
    </div>
</div>
