@props([
    'switchingText' => ['Developers', 'Data Scientists', 'Database Administrators', 'Data Analysts', 'DevOps Engineers', 'Students', 'Educators', 'Hobbyists', 'Consultants', 'Champions'],
])
<main class="isolate">
    <div class="relative pt-14">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#FFD353] to-[#FF9700] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="py-24 sm:py-32 lg:pb-40">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center">
                    <h1 class="select-none text-balance text-4xl md:text-6xl font-semibold tracking-tight text-gray-900"
                        x-data="{ active: 0 }"
                        x-init="setInterval(() => { active = (active + 1) % {{ count($switchingText) }} }, 1500)"
                    >
                        Database tool for
                        <p class="h-12 md:h-16 block relative">
                        @foreach ($switchingText as $index => $text)
                            <span x-show="active === {{ $index }}" x-transition:enter="transition ease-out duration-300 delay-300" x-transition:enter-start="opacity-0 translate-y-full" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-full" class="w-full absolute left-1/2 -translate-x-1/2 will-change-transform inline snapdb-underline">{{ $text }}</span>
                        @endforeach
                        </p>
                    </h1>
                    <p class="mt-8 text-pretty text-lg font-medium text-gray-500 sm:text-xl/8">
                        SnapDB manages databases for you, so you can focus on important stuff.
                    </p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <x-btn.primary>Get Started</x-btn.primary>
                        <a href="#" class="text-sm/6 font-semibold text-gray-900">Learn more <span aria-hidden="true">→</span></a>
                    </div>
                </div>

                <div class="flex justify-center mt-16 sm:mt-24">
                    <div class="inline-block -m-2 rounded-xl bg-gray-900/5 p-2 ring-1 ring-inset ring-gray-900/10 lg:-m-4 lg:rounded-2xl lg:p-4">
                        <img src="{{ asset('img/snapdb-window.png') }}" alt="App screenshot" class="rounded-xl shadow-2xl w-full max-w-[950px]">
                    </div>
                </div>

                <span id="features"></span>
            </div>
        </div>
        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr to-[#FFD353] from-[#FF9700] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
    </div>
</main>
