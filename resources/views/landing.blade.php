<x-layout>
    <x-container>
        <x-navbar />
    </x-container>

    <x-landing.hero />

{{--    <x-container class="mb-20">--}}
{{--        <section id="features" class="relative z-10">--}}
{{--            <h1 class="text-center text-5xl font-bold font-biggo mb-14">{{ __('Tired of database headache?') }}</h1>--}}

{{--            <div class="grid md:grid-cols-2 grid-cols-1 gap-10 mx-auto max-w-[800px] ">--}}
{{--                <div class="bg-red-200 bg-opacity-30 border border-red-800 text-red-800 p-4 rounded-md shadow-md">--}}
{{--                    <h3 class="text-xl font-bold font-biggo mb-2">{{ __('Without SnapDB') }}</h3>--}}

{{--                    <ul class="gap-2 flex flex-col">--}}
{{--                        <li><x-tabler-x class="size-4 inline" /> {{ __('Manually install and configure your local databases.') }}</li>--}}
{{--                        <li><x-tabler-x class="size-4 inline" /> {{ __('Tough (or near impossible) to run multiple instances.') }}</li>--}}
{{--                        <li><x-tabler-x class="size-4 inline" /> {{ __('Dependent on Homebrew and/or Docker.') }}</li>--}}
{{--                        <li><x-tabler-x class="size-4 inline" /> {{ __('Waste time figuring out why your stuff\'s not working.') }}</li>--}}
{{--                    </ul>--}}
{{--                </div>--}}

{{--                <div class="bg-green-200 bg-opacity-30 border border-green-800 text-green-800 p-4 rounded-md shadow-md">--}}
{{--                    <h3 class="text-xl font-bold font-biggo mb-2">{{ __('With SnapDB') }}</h3>--}}

{{--                    <ul class="gap-2 flex flex-col">--}}
{{--                        <li><x-tabler-check class="size-4 inline" /> {{ __('Your database up & running with just a couple of clicks.') }}</li>--}}
{{--                        <li><x-tabler-check class="size-4 inline" /> {{ __('Just as easily add multiple instances, even on different versions.') }}</li>--}}
{{--                        <li><x-tabler-check class="size-4 inline" /> {{ __('Dependency-free: no Homebrew, no Docker. Nothing.') }}</li>--}}
{{--                        <li><x-tabler-check class="size-4 inline" /> {{ __('Active monitoring on your services + push notifications if anything goes wrong.') }}</li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
{{--    </x-container>--}}

    <x-container>
        <x-landing.feature-card class="bg-gradient-to-tr grid grid-cols-1 md:grid-cols-2 gap-6 pt-10 pl-2 md:pl-10">
            <div class="px-8 lg:px-0">
                <h2 class="font-biggo text-4xl font-bold mb-4 gap-2">
                    <x-tabler-bolt-filled class="size-6 inline" />
                    Spin up Databases <span class="underline decoration-snapdb" style="text-decoration-thickness: 4px;">Lightning</span> Fast
                </h2>

                <p class="mb-4">{{ __('You\'re only clicks away from spinning up your favorite database service using SnapDB. Select your desired database service, choose a port and submit. SnapDB provisions and starts up your service without funky dependencies.') }}</p>

                <p>{{ __('It is really that easy.') }}</p>
            </div>
            <div class="block pl-8 md:pl-0">
                <div class="h-full min-h-[300px] bg-left-top" style="background-image: url('{{ asset('img/fb-1.png') }}')"></div>
            </div>
        </x-landing.feature-card>

        <div class="grid grid-cols-1 md:grid-cols-7 mt-4 gap-4">
            <x-landing.feature-card class="bg-gradient-to-bl col-span-4 pt-10 pl-10 pr-10">
                <h2 class="font-biggo text-4xl font-bold mb-4 gap-2">
                    <x-tabler-stack-2-filled class="size-6 inline" />
                    <span class="underline decoration-snapdb" style="text-decoration-thickness: 4px;">Multiple</span> Version Management
                </h2>

                <p class="mb-4">{!! __('MySQL version 9.0? MariaDB version 11.2.6? And maybe even Redis 7.4? <strong>All running at once?</strong> Yes, and without breaking sweat.') !!}</p>

                <p>{{ __('SnapDB allows you to run multiple versions and types of database services at once.') }}</p>

                <div class="w-full min-h-[350px] bg-top bg-contain bg-no-repeat lg:bg-auto" style="background-image: url('{{ asset('img/fb-2.png') }}')"></div>
            </x-landing.feature-card>

            <x-landing.feature-card class="bg-gradient-to-br col-span-3 p-10">
                <h2 class="font-biggo text-4xl font-bold mb-4 gap-2">
                    <x-tabler-scan class="size-6 inline" />
                    {{ __('Monitoring') }}
                </h2>

                <p>{{ __('If any issues arise with your database services, SnapDB detects it within seconds and lets you know. Logs and other useful files are made available at your convenience.') }}</p>

                <img src="{{ asset('img/fb-3.png') }}" class="w-full" alt="">
            </x-landing.feature-card>
        </div>
    </x-container>
</x-layout>
