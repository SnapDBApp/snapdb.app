<header
    x-data="{ topOfPage: false, mobileMenuOpen: false }"
    @scroll.window="topOfPage = (window.pageYOffset>=65);"
    :class="{
        'border-b border-black-500 bg-blur-2xl bg-opacity-100': topOfPage,
        ' bg-opacity-50 bg-blur-none ': !topOfPage }"
    class="bg-gray-50 w-full fixed top-0 left-0 transition-all z-40 bg-opacity-50 bg-blur-none"
>
    <div class="w-full flex justify-between py-4 px-8 md:px-24">
        <div class="flex justify-between w-full max-w-7xl mx-auto">
            <div class="flex items-center">
                <span class="sr-only">SnapDB</span>
                <a href="{{ route('landing') }}">
                    <img class="h-8 w-auto sm:h-10" src="{{ asset('img/snapdb-logo.svg') }}" alt="{{ __('SnapDB Logo') }}">
                </a>

                <div class="flex flex-col ml-4">
                    <a href="{{ route('landing') }}" class="font-biggo font-bold text-2xl text-steel-900">SnapDB</a>
                </div>
            </div>

            <div class="hidden md:flex space-x-8 items-center text-sm text-gray-500">
                <a href="#">Features</a>
                <a href="#">Docs</a>
                <a href="#">Pricing</a>
                <a href="#">Support</a>
            </div>

            <div class="hidden md:flex items-center space-x-8 text-gray-500">
                <a href="#" class="relative items-center font-medium justify-center gap-2 whitespace-nowrap group disabled:opacity-75 dark:disabled:opacity-75 disabled:cursor-default disabled:pointer-events-none h-10 text-sm rounded-lg px-4 inline-flex  bg-white hover:bg-zinc-50 dark:bg-gray-800 dark:hover:bg-zinc-700/50 text-gray-500 dark:text-gray-200 border border-zinc-200 hover:border-zinc-200 border-b-zinc-300/80 dark:border-zinc-700 dark:hover:border-zinc-700 shadow-sm [[data-flux-button-group]_&amp;]:border-l-0 [:is([data-flux-button-group]>&amp;:first-child,_[data-flux-button-group]_:first-child>&amp;)]:border-l-[1px]  bg-white" data-flux-button="data-flux-button" data-flux-group-target="data-flux-group-target">
                    {{ __('Manage License') }}
                </a>
            </div>

            <div class="md:hidden flex items-center cursor-pointer" @click="showMenu = true">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 6.75C11.8011 6.75 11.6103 6.67098 11.4697 6.53033C11.329 6.38968 11.25 6.19891 11.25 6C11.25 5.80109 11.329 5.61032 11.4697 5.46967C11.6103 5.32902 11.8011 5.25 12 5.25C12.1989 5.25 12.3897 5.32902 12.5303 5.46967C12.671 5.61032 12.75 5.80109 12.75 6C12.75 6.19891 12.671 6.38968 12.5303 6.53033C12.3897 6.67098 12.1989 6.75 12 6.75ZM12 12.75C11.8011 12.75 11.6103 12.671 11.4697 12.5303C11.329 12.3897 11.25 12.1989 11.25 12C11.25 11.8011 11.329 11.6103 11.4697 11.4697C11.6103 11.329 11.8011 11.25 12 11.25C12.1989 11.25 12.3897 11.329 12.5303 11.4697C12.671 11.6103 12.75 11.8011 12.75 12C12.75 12.1989 12.671 12.3897 12.5303 12.5303C12.3897 12.671 12.1989 12.75 12 12.75ZM12 18.75C11.8011 18.75 11.6103 18.671 11.4697 18.5303C11.329 18.3897 11.25 18.1989 11.25 18C11.25 17.8011 11.329 17.6103 11.4697 17.4697C11.6103 17.329 11.8011 17.25 12 17.25C12.1989 17.25 12.3897 17.329 12.5303 17.4697C12.671 17.6103 12.75 17.8011 12.75 18C12.75 18.1989 12.671 18.3897 12.5303 18.5303C12.3897 18.671 12.1989 18.75 12 18.75Z" stroke="#71717A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </div>

            <div x-show="mobileMenuOpen === true" class="inset-0 fixed min-h-screen w-screen bg-black/50 backdrop-blur-sm flex" style="display: none;">
                <div class="h-64 w-full max-w-xs absolute right-4 top-2 border border-black/5 rounded-[24px] p-2 shadow-lg">
                    <div class="h-full flex flex-col border border-black/10 rounded-[16px] p-8 shadow-sm bg-white">
                        <div @click="mobileMenuOpen = false" class="absolute top-6 right-6 cursor-pointer">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 18L18 6M6 6L18 18" stroke="#71717A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                        <div class="flex flex-col space-y-4">
                            <a @click="mobileMenuOpen = false" href="/#pricing">Pricing</a>
                            <a @click="mobileMenuOpen = false" href="/docs">Docs</a>
                            <a @click="mobileMenuOpen = false" href="https://github.com/beyondcode/expose">Open Source</a>

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
