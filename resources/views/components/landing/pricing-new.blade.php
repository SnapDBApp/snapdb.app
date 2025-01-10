@props([
    'includedInFreeTier' => [
        'Try out the full experience',
        '7-day trial',
    ],
    'includedInLifetimeLicense' => [
        'Use the SnapDB app without limits',
        'Use it on two devices',
        'All supported database types',
        'All supported database versions',
        'Lifetime updates and support',
        '14-day money-back guarantee',
    ],
])
<div class="relative isolate px-6 lg:px-8">
    <div class="absolute inset-x-0 -top-3 -z-10 transform-gpu overflow-hidden px-36 blur-3xl" aria-hidden="true">
        <div class="mx-auto aspect-[1155/678] w-[72.1875rem] bg-gradient-to-tr to-[#FFD353] from-[#FF9700] opacity-30" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>

    <div class="mx-auto max-w-4xl text-center">
        <h2 class="font-biggo text-pretty sm:text-balance tracking-tight text-5xl sm:text-5xl font-semibold mb-4 gap-2">
            Buy once, <span class="snapdb-underline underline-thick">keep forever</span>
        </h2>

        <p class="mx-auto mt-6 max-w-2xl text-pretty text-lg font-medium text-gray-500 sm:text-xl/8">
            To make SnapDB accessible to everyone, we offer a single lifetime license. No subscriptions, no hidden fees. Just a one-time payment.
        </p>
    </div>
    <div class="mx-auto mt-16 grid max-w-lg grid-cols-1 items-center gap-y-6 sm:mt-20 sm:gap-y-0 lg:max-w-4xl lg:grid-cols-2">
        {{-- Free tier --}}
        <div class="rounded-3xl bg-white/60 p-8 ring-1 ring-gray-900/10 sm:mx-8 sm:rounded-t-none sm:p-10 lg:mx-0 lg:rounded-br-none lg:rounded-tl-3xl">
            <h3 class="text-base/7 font-semibold text-gray-700">
                Try it out
            </h3>
            <p class="mt-4 flex items-baseline gap-x-2">
                <span class="text-5xl font-semibold tracking-tight text-gray-900">Free</span>
            </p>
            <p class="mt-6 text-base/7 text-gray-600">
                Still not convinced? Try SnapDB for free. No credit card required. No strings attached.
            </p>
            <ul role="list" class="mt-8 space-y-3 text-sm/6 text-gray-600 sm:mt-10">
                @foreach ($includedInFreeTier as $feature)
                    <li class="flex gap-x-3">
                        <x-tabler-check class="text-snapdb-900 size-4 flex-none" />

                        {{ $feature }}
                    </li>
                @endforeach
            </ul>
            <x-btn.primary-hollow
                as="a"
                class="mt-4 w-full"
            >
                Try it out
            </x-btn.primary-hollow>
        </div>

        {{-- Premium lifetime tier --}}
        <div class="relative rounded-3xl bg-white p-8 shadow-2xl ring-1 ring-gray-900/10 sm:p-10">
            <h3 class="text-base/7 font-semibold snapdb-underline underline-thick text-gray-700">
                Lifetime
            </h3>
            <p class="mt-4 flex items-baseline gap-x-2">
                <span class="text-5xl font-semibold tracking-tight text-gray-900">$14,99</span>
            </p>
            <p class="mt-6 text-base/7 text-gray-600">
                Enjoy SnapDB without limits. Your license will be delivered to you immediately. Pay once and own it forever.
            </p>
            <ul role="list" class="mt-8 space-y-3 text-sm/6 text-gray-600 sm:mt-10">
                @foreach ($includedInLifetimeLicense as $feature)
                <li class="flex gap-x-3">
                    <x-tabler-check class="text-snapdb-900 size-4 flex-none" />

                    {{ $feature }}
                </li>
                @endforeach
            </ul>
            <x-btn.primary
                as="a"
                class="mt-4 w-full"
                x-data="{
                                paddleItems: [
                                    {
                                        priceId: 'pri_01jgvkbfd9kcw7h80rwdp274qw',
                                        quantity: 1
                                    }
                                ]
                            }"
                @click="Paddle.Checkout.open({items: paddleItems});"
            >
                Purchase
            </x-btn.primary>
            <p class="mt-2 text-xs/5 text-gray-600">Invoices and receipts available for easy company reimbursement</p>
        </div>
    </div>
</div>
