<x-layout>
    <x-container>
        <x-navbar />
    </x-container>

    <main class="isolate">
        <div class="relative pt-14">
            <div class="py-24 sm:py-32 lg:pb-40">
                <x-container>
                    <h1 class="font-bold text-2xl font-biggo">Manage your <span class="snapdb-underline underline-thick">License</span></h1>
                    @if ($license)
                        @include('manage-license.manage')
                    @else
                        @include('manage-license.guest')
                    @endif
                </x-container>
            </div>
        </div>
    </main>
</x-layout>
