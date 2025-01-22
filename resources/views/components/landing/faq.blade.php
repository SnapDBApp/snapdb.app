<section id="faq">
    <div class="mx-auto max-w-7xl px-6 py-24 sm:py-32 lg:px-8 lg:py-40">
        <div class="mx-auto max-w-4xl divide-y divide-gray-900/10">
            <h2 class="font-biggo text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">
                Frequently asked <span class="snapdb-underline underline-thick">questions</span>
            </h2>

            <dl class="mt-10 space-y-6 divide-y divide-gray-900/10">
                <x-landing.faq-item>
                    <x-slot:question>Which databases and versions does SnapDB support?</x-slot>
                    <x-slot:answer>
                        SnapDB supports a total of {{ round(collect(config('supported-databases'))->pluck('versions')->flatten()->count()) }} of your favorite database versions. This includes MySQL, MariaDB, and more.
                        <a href="{{ route('supported-databases') }}" class="link">Check out the full list</a>.
                    </x-slot:answer>
                </x-landing.faq-item>

                <x-landing.faq-item>
                    <x-slot:question>Do I need other software or libraries to use SnapDB?</x-slot>
                    <x-slot:answer>
                        No, SnapDB is a fully standalone solution. You don't need to install any additional software or libraries to manage databases SnapDB. Just download and start managing your databases.

                        <span class="block text-red-700">
                            <x-tabler-x class="size-4 inline" /> No Homebrew, Docker, Vagrant, or other dependencies required.
                        </span>
                    </x-slot:answer>
                </x-landing.faq-item>

                <x-landing.faq-item>
                    <x-slot:question>Can I use my license on multiple devices?</x-slot>
                    <x-slot:answer>
                        This depends on the type of license you have. If you have a multi-user license, you can use it on multiple devices simultaneously. You can
                        <a href="{{ route('manage-license') }}" class="link">sign in with your license</a> to see how many devices you can use it on.
                    </x-slot:answer>
                </x-landing.faq-item>

                <x-landing.faq-item>
                    <x-slot:question>Which operating systems can I use SnapDB on?</x-slot>
                    <x-slot:answer>
                        SnapDB is currently exclusively available on macOS 14.6 and higher.
                    </x-slot:answer>
                </x-landing.faq-item>

                <x-landing.faq-item>
                    <x-slot:question>I have another question</x-slot>
                    <x-slot:answer>
                        You can always <a href="{{ route('contact') }}" class="link">contact us</a> if you have any other questions. We're happy to help!
                    </x-slot:answer>
                </x-landing.faq-item>
            </dl>
        </div>
    </div>
</section>
