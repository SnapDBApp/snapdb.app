<x-layout>
    <x-container>
        <x-navbar />
    </x-container>

    <x-article>
        <x-slot:title>SnapDB <span class="snapdb-underline underline-thick">Downloads</span></x-slot:title>
        <x-slot:body>
            <div id="releases" class="flex flex-col gap-4">
                @foreach($releases as $i => $release)
                    <x-card id="release-{{ $release['tag_name'] }}">
                        <div class="flex gap-2">
                            <h1 class="text-xl flex-1">
                                {{ $release['name'] }}

                                @if($i === 0)
                                    <span class="border">Latest</span>
                                @endif
                            </h1>
                            <span>{{ Carbon\Carbon::parse($release['published_at'])->format('Y-m-d H:i') }}</span>
                        </div>

                        <x-markdown class="markdown-body my-4">{{ $release['body'] }}</x-markdown>
                    </x-card>
                @endforeach
            </div>
        </x-slot:body>
    </x-article>
</x-layout>
