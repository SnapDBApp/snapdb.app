@props([
    'includedInLifetimeLicense' => [
        'Use the SnapDB app without limits',
        'Use it on two devices',
        'Lifetime updates and support',
        '14-day money-back guarantee',
    ],
])
<div>
    <span id="pricing"></span>
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-4xl sm:text-center">
            <h2 class="font-biggo text-pretty sm:text-balance tracking-tight text-5xl sm:text-5xl font-semibold mb-4 gap-2">
                Buy once, <span class="snapdb-underline underline-thick">keep forever</span>
            </h2>

            <p class="mx-auto mt-6 max-w-2xl text-pretty text-lg font-medium text-gray-500 sm:text-xl/8">
                To make SnapDB accessible to everyone, we offer a single lifetime license. No subscriptions, no hidden fees. Just a one-time payment.
            </p>
        </div>
        <div class="bg-white mx-auto mt-16 max-w-2xl rounded-3xl ring-1 ring-gray-200 sm:mt-20 lg:mx-0 lg:flex lg:max-w-none">
            <div class="p-8 sm:p-10 lg:flex-auto">
                <h3 class="text-3xl font-semibold tracking-tight text-gray-900">Lifetime license</h3>
                <p class="mt-6 text-base/7 text-gray-600">
                    Enjoy SnapDB without limits. Your license will be delivered to you immediately. Pay once and own it forever.
                </p>
                <div class="mt-10 flex items-center gap-x-4">
                    <h4 class="flex-none text-sm/6 font-semibold">
                        <x-tabler-star-filled class="text-snapdb-900 size-4 inline" />
                        What’s included
                    </h4>
                    <div class="h-px flex-auto bg-gray-100"></div>
                </div>
                <ul role="list" class="mt-8 grid grid-cols-1 gap-4 text-sm/6 text-gray-600 sm:grid-cols-2 sm:gap-6">
                    @foreach($includedInLifetimeLicense as $feature)
                    <li class="flex gap-x-3 items-center">
                        <x-tabler-circle-check-filled class="text-snapdb-900 size-4 inline" />

                        {{ $feature }}
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="-mt-2 p-2 lg:mt-0 lg:w-full lg:max-w-md lg:shrink-0">
                <div class="rounded-2xl bg-gray-50 py-10 text-center ring-1 ring-inset ring-gray-900/5 lg:flex lg:flex-col lg:justify-center lg:py-16">
                    <div class="mx-auto max-w-xs px-8">
                        <p class="text-base font-semibold text-gray-600">Pay once, own it forever</p>
                        <p class="mt-6 flex items-baseline justify-center gap-x-2">
                            <span class="text-5xl font-semibold tracking-tight text-gray-900">$14,99</span>
                            <span class="text-sm/6 font-semibold tracking-wide text-gray-600">USD</span>
                        </p>
                        <x-btn.primary
                            as="a"
                            class="mt-4"
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
                        <p class="mt-6 text-xs/5 text-gray-600">Invoices and receipts available for easy company reimbursement</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
