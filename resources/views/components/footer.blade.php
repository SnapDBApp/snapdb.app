<footer class="bg-white border-t border-solid">
    <div class="mx-auto max-w-7xl px-6 pb-8 pt-16 sm:pt-24 lg:px-8 lg:pt-32">
        <div class="xl:grid xl:grid-cols-3 xl:gap-8">
            <div class="space-y-8">
                <x-logo class="h-9" />

                <p class="text-balance text-sm/6 text-gray-600">
                    Simplifying database management for productive (and lazy) people.
                </p>

                <div class="flex gap-x-6">
                    <a href="https://x.com/SnapDBApp" class="text-gray-600 hover:text-gray-800">
                        <span class="sr-only">X</span>
                        <x-tabler-brand-x class="size-6" />
                    </a>
                    <a href="https://github.com/SnapDBApp" class="text-gray-600 hover:text-gray-800">
                        <span class="sr-only">GitHub</span>
                        <x-tabler-brand-github class="size-6" />
                    </a>
                </div>
            </div>
            <div class="mt-16 grid grid-cols-2 gap-8 xl:col-span-2 xl:mt-0">
                <div class="md:grid md:grid-cols-2 md:gap-8">
                    <div>
                        <h3 class="text-sm/6 font-semibold text-gray-900">Supported Databases</h3>
                        <ul role="list" class="mt-6 space-y-4">
                            @foreach (config('supported-databases') as $supportedDatabase)
                                <li>
                                    <a href="{{ route('supported-databases.show', ['slug' => $supportedDatabase['slug']]) }}" class="text-sm/6 text-gray-600 hover:text-gray-900">
                                        {{ $supportedDatabase['name'] }}
                                    </a>
                                </li>
                            @endforeach

                            <li>
                                <a href="{{ route('supported-databases') }}" class="text-sm/6 text-gray-600 hover:text-gray-900">
                                    See All Databases
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-10 md:mt-0">
                        <h3 class="text-sm/6 font-semibold text-gray-900">Links</h3>
                        <ul role="list" class="mt-6 space-y-4">
                            <li>
                                <a href="{{ route('downloads') }}" class="text-sm/6 text-gray-600 hover:text-gray-900">Downloads</a>
                            </li>
                            <li>
                                <a href="{{ route('manage-license') }}" class="text-sm/6 text-gray-600 hover:text-gray-900">Manage license</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="md:grid md:grid-cols-2 md:gap-8">
                    <div>
                        <h3 class="text-sm/6 font-semibold text-gray-900">Support</h3>
                        <ul role="list" class="mt-6 space-y-4">
                            <li>
                                <a href="https://github.com/SnapDBApp/issues" target="_blank" class="text-sm/6 text-gray-600 hover:text-gray-900">
                                    Report a bug <x-tabler-external-link class="size-4 inline" />
                                </a>
                            </li>
                            <li>
                                <a href="https://github.com/SnapDBApp/issues" target="_blank" class="text-sm/6 text-gray-600 hover:text-gray-900">
                                    Request a feature <x-tabler-external-link class="size-4 inline" />
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}" class="text-sm/6 text-gray-600 hover:text-gray-900">
                                    Contact us
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-10 md:mt-0">
                        <h3 class="text-sm/6 font-semibold text-gray-900">Legal</h3>
                        <ul role="list" class="mt-6 space-y-4">
                            <li>
                                <a href="{{ route('terms-conditions') }}" class="text-sm/6 text-gray-600 hover:text-gray-900">Terms and conditions</a>
                            </li>
                            <li>
                                <a href="{{ route('returns-policy') }}" class="text-sm/6 text-gray-600 hover:text-gray-900">Returns policy</a>
                            </li>
                            <li>
                                <a href="{{ route('privacy-policy') }}" class="text-sm/6 text-gray-600 hover:text-gray-900">Privacy policy</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-16 border-t border-gray-900/10 pt-8 sm:mt-20 lg:mt-24">
            <p class="text-sm/6 text-gray-600">&copy; {{ date('Y') }} SnapDB. All rights reserved.</p>
        </div>
    </div>
</footer>
