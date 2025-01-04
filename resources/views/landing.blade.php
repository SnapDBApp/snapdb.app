<x-layout>
    <x-container>
        <x-navbar />
    </x-container>

    <x-landing.hero />

    <x-container class="mb-20">
        <section id="features" class="relative z-10">
            <h1 class="text-center text-5xl font-bold font-biggo mb-14">{{ __('Tired of database headache?') }}</h1>

            <div class="grid md:grid-cols-2 grid-cols-1 gap-10 mx-auto max-w-[800px] ">
                <div class="bg-red-200 bg-opacity-30 border border-red-800 text-red-800 p-4 rounded-md shadow-md">
                    <h3 class="text-xl font-bold font-biggo mb-2">{{ __('Without SnapDB') }}</h3>

                    <ul class="gap-2 flex flex-col">
                        <li><x-tabler-x class="size-4 inline" /> {{ __('Manually install and configure your local databases.') }}</li>
                        <li><x-tabler-x class="size-4 inline" /> {{ __('Tough (or near impossible) to run multiple instances.') }}</li>
                        <li><x-tabler-x class="size-4 inline" /> {{ __('Dependent on Homebrew and/or Docker.') }}</li>
                        <li><x-tabler-x class="size-4 inline" /> {{ __('Waste time figuring out why your stuff\'s not working.') }}</li>
                    </ul>
                </div>

                <div class="bg-green-200 bg-opacity-30 border border-green-800 text-green-800 p-4 rounded-md shadow-md">
                    <h3 class="text-xl font-bold font-biggo mb-2">{{ __('With SnapDB') }}</h3>

                    <ul class="gap-2 flex flex-col">
                        <li><x-tabler-check class="size-4 inline" /> {{ __('Your database up & running with just a couple of clicks.') }}</li>
                        <li><x-tabler-check class="size-4 inline" /> {{ __('Just as easily add multiple instances, even on different versions.') }}</li>
                        <li><x-tabler-check class="size-4 inline" /> {{ __('Dependency-free: no Homebrew, no Docker. Nothing.') }}</li>
                        <li><x-tabler-check class="size-4 inline" /> {{ __('Active monitoring on your services + push notifications if anything goes wrong.') }}</li>
                    </ul>
                </div>
            </div>
        </section>
    </x-container>

    <x-container>
        <div class="text-gray-800 grid grid-cols-1 md:grid-cols-2 gap-6 bg-gradient-to-tr from-snapdblight to-snapdb pt-10 pl-2 md:pl-10 border-2 rounded-lg border-snapdb">
            <div class="px-8 lg:px-0">
                <h2 class="font-biggo text-2xl mb-4 flex items-center gap-2">
                    <x-tabler-bolt-filled class="size-6 inline" />
                    {{ __('Spin up databases lightning fast') }}
                </h2>

                <p class="mb-4">{{ __('You\'re only clicks away from spinning up your favorite database service using SnapDB. Select your desired database service, choose a port and submit. SnapDB provisions and starts up your service without funky dependencies.') }}</p>

                <p>{{ __('It\'s really that easy.') }}</p>
            </div>
            <div class="block pl-8 md:pl-0">
                <div class="h-full min-h-[260px] rounded-2xl border border-theme-border bg-white/10 rounded-b-none border-b-0 rounded-r-none pt-2 pl-2" style="background-image: url('{{ asset('img/fb-1.png') }}')">
                </div>
            </div>
        </div>
    </x-container>
</x-layout>
