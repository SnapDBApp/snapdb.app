<x-layout>
    <x-container>
        <x-navbar />
    </x-container>

    <main class="isolate">
        <div class="relative pt-14">
            <div class="py-24 sm:py-32 lg:pb-40">
                <x-container>
                    <nav class="flex mb-4" aria-label="Breadcrumb">
                        <ol role="list" class="flex items-center space-x-4">
                            <li>
                                <div>
                                    <a href="{{ route('landing') }}" class="text-gray-400 hover:text-gray-500">
                                        <svg class="size-5 shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                            <path fill-rule="evenodd" d="M9.293 2.293a1 1 0 0 1 1.414 0l7 7A1 1 0 0 1 17 11h-1v6a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-6H3a1 1 0 0 1-.707-1.707l7-7Z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="sr-only">Home</span>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg class="size-5 shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                        <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                    </svg>
                                    <a href="{{ route('supported-databases') }}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">
                                        Supported Databases
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg class="size-5 shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                        <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                    </svg>
                                    <a href="{{ route('supported-databases.show', ['slug' => $database['slug']]) }}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" aria-current="page">
                                        {{ $database['name'] }}
                                    </a>
                                </div>
                            </li>
                        </ol>
                    </nav>

                    <div class="grid grid-cols-1 md:grid-cols-2 md:gap-0 gap-10">
                        <div class="flex items-center">
                            <div>
                                <h1 class="font-bold text-2xl font-biggo">Dependency-free <span class="snapdb-underline underline-thick">{{ $database['name'] }}</span> management with SnapDB</h1>
                                <p class="text-pretty text-lg font-medium text-gray-500 sm:text-xl/8">
                                    SnapDB allows you to manage your local {{ $database['name'] }} databases without the need for any additional dependencies. Our tool supports {{ count($database['versions']) }} {{ $database['name'] }} versions that you can use without Homebrew, Docker, Vagrant, or any other virtualization software on macOS.
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <img src="{{ asset('img/db/' . $database['slug'] . '.png') }}" alt="{{ $database['name'] }} logo" class="mx-auto size-40">
                        </div>
                    </div>

                    <div class="mt-20">
                        <h1 class="font-bold text-2xl font-biggo">Supported <span class="snapdb-underline underline-thick">{{ $database['name'] }}</span> versions</h1>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-2">
                            @foreach ($database['versions'] as $version)
                                <div class="border rounded-md flex p-4 gap-4 bg-white shadow-md">
                                    <x-tabler-database-smile class="size-10 text-gray-300" />

                                    <div class="flex-1">
                                        <p>
                                            <h1>{{ $version }}</h1>
                                            <span><x-tabler-check class="size-4 text-green-700 inline" /> Supported</span>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <x-cta-landing-banner />
                </x-container>
            </div>
        </div>
    </main>
</x-layout>
