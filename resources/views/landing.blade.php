<x-layout>
    <x-container>
        <x-navbar />
    </x-container>

    <main class="isolate">
        <div class="relative pt-14">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#FFD353] to-[#FF9700] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
            <div class="py-24 sm:py-32 lg:pb-40">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div class="mx-auto max-w-2xl text-center">
                        <h1 class="text-balance text-6xl font-semibold tracking-tight text-gray-900">
                            {{ __('Database tool for ') }} <span class="inline underline decoration-snapdb">{{ __('champions') }}</span><span>.</span>
                        </h1>
                        <p class="mt-8 text-pretty text-lg font-medium text-gray-500 sm:text-xl/8">
                            SnapDB manages databases for you, so you can focus on building your app.
                        </p>
                        <div class="mt-10 flex items-center justify-center gap-x-6">
                            <a href="#" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get started</a>
                            <a href="#" class="text-sm/6 font-semibold text-gray-900">Learn more <span aria-hidden="true">→</span></a>
                        </div>
                    </div>
                    <div class="mt-16 flow-root sm:mt-24">
                        <div class="-m-2 rounded-xl bg-gray-900/5 p-2 ring-1 ring-inset ring-gray-900/10 lg:-m-4 lg:rounded-2xl lg:p-4">
                            <img src="https://tailwindui.com/plus/img/component-images/project-app-screenshot.png" alt="App screenshot" width="2432" height="1442" class="rounded-md shadow-2xl ring-1 ring-gray-900/10">
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr to-[#FFD353] from-[#FF9700] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
        </div>
    </main>

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
