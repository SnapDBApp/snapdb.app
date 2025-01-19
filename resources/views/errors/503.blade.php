<x-layout title="Service Unavailable" class="overflow-hidden">
    <div class="fixed inset-0 bg-gray-800 opacity-80 z-[500]">
        <x-container class="my-40">
            <x-card class="max-w-2xl mx-auto">
                <h1 class="text-2xl font-semibold">
                    503 - Service <span class="snapdb-underline underline-thick">Unavailable</span>
                </h1>

                <p class="my-4">
                    SnapDB is currently unavailable. This could be due to maintenance, system upgrades
                    or an unexpected issue.
                    Please check back later. We apologize for any inconvenience this may cause.
                </p>

                <div class="grid grid-cols-2 gap-4">
                    <x-btn.primary as="a" href="{{ config('app.status_page') }}" target="_blank">
                        Open Status Page
                    </x-btn.primary>

                    <x-btn.primary-hollow as="a" href="mailto:{{ config('app.contact_mail') }}">
                        Contact Support
                    </x-btn.primary-hollow>
                </div>
            </x-card>
        </x-container>
    </div>

    <div class="min-h-[400px]"></div>
</x-layout>
