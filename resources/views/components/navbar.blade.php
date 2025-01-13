@props([
    'links' => [
        [
            'name' => 'Features',
            'routeName' => 'landing',
            'scrollID' => 'features',
        ],
        [
            'name' => 'Pricing',
            'routeName' => 'landing',
            'scrollID' => 'pricing',
        ],
        [
            'name' => 'FAQ',
            'routeName' => 'landing',
            'scrollID' => 'faq',
        ],
        [
            'name' => 'Databases',
            'routeName' => 'supported-databases',
            'scrollID' => null,
        ]
    ]
])
<header
    x-data="{
        topOfPage: false,
        mobileMenuOpen: false,
        scrollTo(id) {
            document.getElementById(id).scrollIntoView({ behavior: 'smooth' })
        }
    }"
    @scroll.window="topOfPage = (window.pageYOffset>=65);"
    :class="{
        'border-b border-black-500 bg-blur-2xl bg-opacity-100': topOfPage,
        ' bg-opacity-50 bg-blur-none ': !topOfPage }"
    class="select-none bg-gray-50 w-full fixed top-0 left-0 transition-all z-40 bg-opacity-50 bg-blur-none"
>
    <div class="w-full flex justify-between py-4 px-8 md:px-24">
        <div class="flex justify-between w-full max-w-7xl mx-auto">
            <div class="flex items-center">
                <span class="sr-only">SnapDB</span>
                <a href="{{ route('landing') }}">
                    <x-logo class="h-8 w-auto sm:h-10" />
                </a>

                <div class="flex flex-col ml-4">
                    <a href="{{ route('landing') }}" class="font-biggo font-bold text-2xl text-steel-900">SnapDB</a>
                </div>
            </div>

            <div x-data class="hidden md:flex space-x-8 items-center text-sm">
                @foreach ($links as $link)
                    <a
                        class="cursor-pointer text-gray-500 hover:text-gray-600"
                        @click="mobileMenuOpen = false; scrollTo('{{ $link['scrollID'] }}')"
                        @if (!request()->routeIs($link['routeName']))
                            href="{{ route($link['routeName']) }}"
                        @endif
                    >
                        {{ $link['name'] }}
                    </a>
                @endforeach
            </div>

            <div class="items-center text-gray-500">
                <x-btn.secondary as="a" href="{{ route('manage-license') }}">
                    Manage License
                </x-btn.secondary>
            </div>

            <div class="md:hidden flex items-center cursor-pointer" @click="mobileMenuOpen = true">
                <x-tabler-menu-deep class="text-gray-500 size-6" />
            </div>

            <div x-show="mobileMenuOpen === true" class="inset-0 fixed min-h-screen w-screen bg-black/50 backdrop-blur-sm flex">
                <div class="h-64 w-full absolute inset-0 top-2 border border-black/5 rounded-[24px] shadow-lg">
                    <div class="h-full flex flex-col border border-black/10 rounded-[16px] p-8 shadow-sm bg-white">
                        <div @click="mobileMenuOpen = false" class="absolute top-6 right-6 cursor-pointer">
                            <x-tabler-x class="text-gray-500 size-6" />
                        </div>
                        <div class="flex flex-col space-y-4">
                            @foreach ($links as $link)
                                <a
                                    class="cursor-pointer text-gray-500 hover:text-gray-600"
                                    @click="mobileMenuOpen = false; scrollTo('{{ $link['scrollID'] }}')"
                                    @if (!request()->routeIs($link['routeName']))
                                        href="{{ route($link['routeName']) }}"
                                    @endif
                                >
                                    {{ $link['name'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
