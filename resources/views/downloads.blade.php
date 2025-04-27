<x-layout title="Downloads">
    <x-container>
        <x-navbar />
    </x-container>

    <x-article>
        <x-slot:title>SnapDB <span class="snapdb-underline underline-thick">Downloads</span></x-slot:title>
        <x-slot:body>
            <p class="text-gray-500 mb-4 text-pretty">
                Download the latest version of SnapDB below. SnapDB is a standalone database management tool for macOS. It supports MySQL, MariaDB, and more.
            </p>

            <div id="releases" class="flex flex-col gap-4">
                <x-card
                    id="release-latest"
                    class="transition"
                >
                    <div class="flex gap-2">
                        <h1 class="text-xl flex-1 flex items-center">
                            SnapDB for macOS

                            <x-tag.green>Latest</x-tag.green>
                        </h1>
                        <div>
                            <x-btn.primary x-data
                               @click="window.location = 'https://github.com/SnapDBApp/app/releases/latest/download/SnapDB.zip'"
                            >
                                Download
                            </x-btn.primary>
                        </div>
                    </div>

                    <x-markdown class="markdown-body my-4">
                        <span class="text-gray-500">The latest and greatest version of SnapDB for macOS. Find the full and latest release notes on GitHub.</span>
                    </x-markdown>

                    <span class="text-gray-400">recently updated</span>
                </x-card>
            </div>
        </x-slot:body>
    </x-article>
</x-layout>
