<x-layout>
    <x-container>
        <x-navbar />
    </x-container>

    <x-landing.hero />

    <x-container>
        <x-landing.feature-card class="bg-gradient-to-tr grid grid-cols-1 lg:grid-cols-2 gap-6 pt-10 pl-2 md:pl-10">
            <div class="px-8 lg:px-0">
                <h2 class="font-biggo text-4xl font-bold mb-4 gap-2">
                    <x-tabler-bolt-filled class="size-6 inline" />
                    Spin up Databases <span class="snapdb-underline underline-thick">Lightning</span> Fast
                </h2>

                <p class="mb-4">You are only clicks away from spinning up your favorite database service using SnapDB. Select your desired database service, choose a port and submit. SnapDB provisions and starts up your service without funky dependencies.</p>

                <p>It is really that easy.</p>
            </div>
            <div class="block pl-8 md:pl-0">
                <video class="md:h-full lg:min-h-[300px] rounded-tl-lg shadow-md" autoplay loop playsInline muted src="{{ asset('video/spin-up-db.mp4') }}"></video>
            </div>
        </x-landing.feature-card>

        <div class="grid grid-cols-1 md:grid-cols-7 mt-4 gap-4">
            <x-landing.feature-card class="bg-gradient-to-bl col-span-4 pt-10 pl-10 pr-10 flex flex-col">
                <div class="flex-1">
                    <h2 class="font-biggo text-4xl font-bold mb-4 gap-2">
                        <x-tabler-stack-2-filled class="size-6 inline" />
                        <span class="snapdb-underline underline-thick">Multiple</span> Version Management
                    </h2>

                    <p class="mb-4">MySQL version 9.0? MariaDB version 11.2.6? And maybe even Redis 7.4? <strong>All running at once?</strong> Yes, and without breaking sweat.</p>

                    <p>SnapDB allows you to run multiple versions and types of database services at once.</p>
                </div>

                <div class="w-full min-h-[350px] bg-top bg-contain bg-no-repeat lg:bg-auto" style="background-image: url('{{ asset('img/fb-2.png') }}')"></div>
            </x-landing.feature-card>

            <x-landing.feature-card class="bg-gradient-to-br col-span-3 p-10">
                <h2 class="font-biggo text-4xl font-bold mb-4 gap-2">
                    <x-tabler-scan class="size-6 inline" />
                    Monitoring
                </h2>

                <p>If any issues arise with your database services, SnapDB detects it within seconds and lets you know. Logs and other useful files are made available at your convenience.</p>

                @php($notifications = [
                    'MySQL is not binding to port correctly. Please inspect the service logs for more details.',
                    'Redis has died in the background due to a failure.',
                    'MariaDB appears to be consuming higher resources than usual.',
                    'PostgreSQL has crashed. Please inspect the service logs for more details.',
                    'MongoDB has died in the background due to a failure.',
                ])
                <div class="notification-holder h-[300px] py-4 flex flex-col gap-4"
                     x-data="{
                        active: 0,
                        previous: null,
                        startTimeout(timeout = 3400) {
                            setTimeout(() => {
                                this.startTimeout(Math.floor(Math.random() * 2000) + 2000);

                                if(this.previous !== null) {
                                    this.previous = null;
                                    return;
                                }

                                this.previous = this.active;
                                this.active = (this.active + 1) % {{ count($notifications) }};
                            }, timeout);
                        }
                     }"
                     x-init="startTimeout()"
                >
                    @foreach ($notifications as $index => $notification)
                        <x-macos-notification
                            x-show="active === {{ $index }} || previous === {{ $index }}"
                            x-transition:enter="transition duration-500 transform ease-out"
                            x-transition:enter-start="opacity-0 translate-x-10"
                            x-transition:enter-end="opacity-100 translate-x-0"
                            x-transition:leave="transition-opacity duration-1000"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                        >
                            <x-slot:title>Service warning</x-slot>
                            <x-slot:body>{{ $notification }}</x-slot>
                        </x-macos-notification>
                    @endforeach
                </div>
            </x-landing.feature-card>
        </div>
    </x-container>

    <x-container class="py-16 md:py-40">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="flex items-center">
                <div>
                    <h2 class="font-biggo text-4xl font-bold mb-4 gap-2">
                        Fast and Reliable, <span class="snapdb-underline underline-thick">Without Dependencies</span>
                    </h2>

                    <p class="mt-8 flex flex-col gap-4 text-pretty text-lg font-medium text-gray-500 sm:text-xl/8">
                        <span>Managing databases on your machine should not be cumbersome and time-consuming. SnapDB is designed to be fast, reliable, and <span class="font-bold">dependency-free</span>. It is the perfect tool for engineers who want to focus on their work and not on managing databases.</span>

                        <span>We will not bloat your system with Homebrew and/or Docker installations. Promised.</span>
                    </p>
                </div>
            </div>
            <div>
                <img class="w-full h-full object-cover" src="{{ asset('img/dependency-free.png') }}" alt="Fast and reliable database management on your machine, without dependencies.">
            </div>
        </div>
    </x-container>

    <span id="pricing"></span>
    <x-landing.pricing />

    <x-landing.faq />
</x-layout>
