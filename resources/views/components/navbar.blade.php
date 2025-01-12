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

            <div x-data class="hidden md:flex space-x-8 items-center text-sm text-gray-500">
                <a class="cursor-pointer" @click="scrollTo('features')">Features</a>
                <a class="cursor-pointer" @click="scrollTo('pricing')">Pricing</a>
                <a class="cursor-pointer" @click="scrollTo('faq')">FAQ</a>
            </div>

            <div class="hidden md:flex items-center space-x-8 text-gray-500">
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
                            <a class="cursor-pointer" @click="mobileMenuOpen = false; scrollTo('features')">Features</a>
                            <a class="cursor-pointer" @click="mobileMenuOpen = false; scrollTo('pricing')">Pricing</a>
                            <a class="cursor-pointer" @click="mobileMenuOpen = false; scrollTo('faq')">FAQ</a>

                            <div class="flex items-center space-x-4 pt-4">
                                <a href="/register" class="relative items-center font-medium justify-center gap-2 whitespace-nowrap group disabled:opacity-75 dark:disabled:opacity-75 disabled:cursor-default disabled:pointer-events-none h-10 text-sm rounded-lg px-4 inline-flex  bg-white hover:bg-zinc-50 dark:bg-gray-800 dark:hover:bg-zinc-700/50 text-gray-500 dark:text-gray-200 border border-zinc-200 hover:border-zinc-200 border-b-zinc-300/80 dark:border-zinc-700 dark:hover:border-zinc-700 shadow-sm [[data-flux-button-group]_&amp;]:border-l-0 [:is([data-flux-button-group]>&amp;:first-child,_[data-flux-button-group]_:first-child>&amp;)]:border-l-[1px]  bg-white" data-flux-button="data-flux-button" data-flux-group-target="data-flux-group-target">
                                    Sign up
                                </a>
                                <a href="/login" class="text-sm">Sign in</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
