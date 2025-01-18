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
                @foreach ($releases as $i => $release)
                    @php
                        $isLatest = $i === 0;
                        $downloadURL = 'https://github.com/SnapDBApp/app/releases/download/' . $release['tag_name'] . '/SnapDB.zip';
                    @endphp
                    <x-card
                        id="release-{{ $release['tag_name'] }}"
                        @class([
                            'transition' => true,
                            'opacity-50 hover:opacity-100' => !$isLatest,
                        ])
                    >
                        <div class="flex gap-2">
                            <h1 class="text-xl flex-1 flex items-center">
                                {{ $release['name'] }}

                                @if ($isLatest)
                                    <x-tag.green>Latest</x-tag.green>
                                @else
                                    <x-tag.red>Outdated</x-tag.red>
                                @endif
                            </h1>
                            <div>
                                @if ($isLatest)
                                    <x-btn.primary x-data
                                                   @click="window.location = '{{ $downloadURL }}'"
                                    >
                                        Download
                                    </x-btn.primary>
                                @endif
                            </div>
                        </div>

                        <x-markdown class="markdown-body my-4">
                            @if (empty($release['body']))
                                <span class="text-gray-500">No release notes provided.</span>
                            @else
                                {{ $release['body'] }}
                            @endif
                        </x-markdown>

                        <span class="text-gray-400">{{ Carbon\Carbon::parse($release['published_at'])->format('Y-m-d H:i') }}</span>
                    </x-card>
                @endforeach
            </div>
        </x-slot:body>
    </x-article>
</x-layout>
