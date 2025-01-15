<x-layout title="Supported Databases">
    <x-container>
        <x-navbar />
    </x-container>

    <main class="isolate">
        <div class="relative pt-14">
            <div class="py-24 sm:py-32 lg:pb-40">
                <x-container>
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="flex items-center">
                            <div>
                                <h1 class="font-bold text-2xl font-biggo">Databases supported by <span class="snapdb-underline underline-thick">SnapDB</span></h1>
                                <p class="text-pretty text-lg font-medium text-gray-500 sm:text-xl/8">
                                    SnapDB is the database management app that supports your favorite databases. Please refer to the list below for the databases and versions that are currently supported by SnapDB.
                                </p>
                            </div>
                        </div>
                        <div class="hidden md:flex items-center">
                            <x-tabler-database class="mx-auto size-40 mb-10 text-gray-200" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 py-10">
                        @foreach (config('supported-databases') as $supportedDatabase)
                            <x-supported-databases.db-card :supported-database="$supportedDatabase" />
                        @endforeach
                    </div>

                    <x-cta-landing-banner />
                </x-container>
            </div>
        </div>
    </main>
</x-layout>
