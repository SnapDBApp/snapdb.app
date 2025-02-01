<x-layout title="Contact Support">
    <x-container>
        <x-navbar />
    </x-container>

    <x-article>
        <x-slot:title>Contact SnapDB <span class="snapdb-underline underline-thick">Support</span></x-slot:title>
        <x-slot:meta>Questions, remarks, compliment or complaints.</x-slot:meta>
        <x-slot:body>
            @session('success')
                <x-alert.success>{{ session('success') }}</x-alert.success>
            @endsession

            @if ($errors->any())
                <x-alert.error>{{ $errors->first() }}</x-alert.error>
            @endif

            <div x-data="{
                module: null,
                topicId: null,
                topics: [
                    { id: 1, title: 'License Not Received', module: 'no_license' },
                    { id: 2, title: 'Ordering & Payments', module: 'contact' },
                    { id: 3, title: 'Refunds & Returns', module: 'contact' },
                    { id: 4, title: 'Report a Bug', module: 'gh_issues' },
                    { id: 5, title: 'Request a Feature', module: 'gh_issues' },
                    { id: 6, title: 'Something Else', module: 'contact' }
                ],
                selectTopic(id, module) {
                    if(this.module == module && this.topicId == id) {
                        this.module = null;
                        this.topicId = null;
                        return;
                    }

                    this.module = module;
                    this.topicId = id;
                    document.getElementById('module-anchor').scrollIntoView({ behavior: 'smooth' })
                }
            }">
                {{-- Topic Selection --}}
                <section class="flex flex-col gap-4">
                    <h2 class="text-xl font-bold" id="module-anchor">How can we help you?</h2>

                    <div class="grid grid-cols-2 gap-4 text-center select-none">
                        <template x-for="topic in topics">
                            <x-card @click="selectTopic(topic.id, topic.module)"
                                    class="cursor-pointer hover:bg-gray-50"
                            >
                                <span :class="{
                                    'text-orange-500': topicId == topic.id,
                                    'text-gray-500': topicId != topic.id
                                }" x-text="topic.title"></span>
                            </x-card>
                        </template>
                    </div>
                </section>

                {{-- Vertical dotted line --}}
                <div class="h-[100px] w-1 my-2 border-l-4 border-dotted mx-auto block"
                     x-show="module !== null" x-transition.opacity
                ></div>

                {{-- Contact module --}}
                <section x-show="module == 'contact'" x-transition.opacity class="flex flex-col gap-4 mb-4">
                    <x-card>
                        <h2 class="text-xl text-gray-500">Get in touch with us</h2>

                        <form action="{{ route('contact') }}" method="POST" class="my-4">
                            @csrf

                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <div>
                                    <x-form.label for="name" :required="true">Name</x-form.label>
                                    <x-form.input name="name" id="name" required placeholder="John Doe" />
                                </div>
                                <div>
                                    <x-form.label for="company">Company</x-form.label>
                                    <x-form.input name="company" id="company" placeholder="Acme" />
                                </div>
                                <div class="sm:col-span-2">
                                    <x-form.label for="email" :required="true">Email</x-form.label>
                                    <x-form.input type="email" name="email" id="email" required placeholder="john.doe@example.com" />
                                </div>
                                <div class="sm:col-span-2">
                                    <x-form.label for="message" :required="true">Message</x-form.label>
                                    <x-form.textarea maxlength="1000" name="message" rows="4" id="message" required />
                                </div>
                                <div class="sm:col-span-2 flex gap-2">
                                    <div><x-form.checkbox id="agree_privacy" name="agree_privacy" required /></div>
                                    <x-form.label for="agree_privacy" class="flex-1" :required="true">
                                        I agree to the <a href="{{ route('privacy-policy') }}" target="_blank" class="link">Privacy Policy</a>
                                    </x-form.label>
                                </div>
                            </div>
                            <div class="mt-10">
                                <x-btn.primary type="submit" class="w-full">Send</x-btn.primary>
                            </div>
                        </form>
                    </x-card>
                </section>

                {{-- GitHub issues module --}}
                <section x-show="module == 'gh_issues'" x-transition.opacity class="flex flex-col gap-4 mb-4">
                    <x-card>
                        <h2 class="text-xl text-gray-500">Please use our request tracker</h2>

                        <div class="my-4 flex gap-2">
                            <div class="px-4">
                                <x-tabler-brand-github class="text-gray-500 size-12" />
                            </div>
                            <div class="flex-1">
                                <p>
                                    We use GitHub to track feature and bug requests. Please use the link below to report a bug or request a feature.
                                    Use the GitHub issue tracker to raise a new issue or to add to an existing issue.
                                </p>

                                <x-btn.secondary class="mt-4" as="a" href="https://github.com/SnapDBApp/issues" target="_blank">
                                    Open GitHub
                                    <x-tabler-external-link class="size-4 inline" />
                                </x-btn.secondary>
                            </div>
                        </div>
                    </x-card>
                </section>

                {{-- No license received module --}}
                <section x-show="module == 'no_license'" x-transition.opacity class="flex flex-col gap-4 mb-4">
                    <x-card>
                        <h2 class="text-xl text-gray-500">Did you not receive your license after purchase?</h2>

                        <div class="my-4 flex gap-2">
                            <div class="px-4">
                                <x-tabler-mail-x class="text-gray-500 size-12" />
                            </div>
                            <div class="flex-1">
                                <p>
                                    If you did not receive your license after purchase, please check your spam folder first.
                                    <strong>Most customers still find their license key in their spam inbox.</strong>
                                    If you still can't find it 30 minutes after purchase, please contact us and we will help resolve it.
                                </p>
                            </div>
                        </div>
                    </x-card>
                </section>
            </div>
        </x-slot:body>
    </x-article>
</x-layout>
