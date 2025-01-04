<x-layout>
    <x-container>
        <x-navbar />
    </x-container>

    <x-landing.hero />

    <section id="features" class="relative z-10">
        <h1 class="text-center text-5xl font-bold font-biggo mb-14">{{ __('Tired of database headache?') }}</h1>

        <div class="grid grid-cols-2 gap-10 mx-auto max-w-[800px] ">
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
</x-layout>
