<x-layout>
    <x-container>
        <x-navbar />
    </x-container>

    {{-- Templated from https://ploi.io/terms-of-service --}}
    <x-article>
        <x-slot:title>Returns <span class="snapdb-underline underline-thick">Policy</span></x-slot:title>
        <x-slot:meta>Last updated Jan 13, 2025.</x-slot:meta>
        <x-slot:body>
            <section class="flex flex-col gap-4 mb-4">
                <h2 class="text-xl font-bold">Refunds</h2>

                <p>
                    This Returns Policy is a part of our <a href="{{ route('terms-conditions') }}" class="link">Terms of Conditions</a>.
                </p>

                <p>
                    Your access to SnapDB will be revoked upon refund approval.
                    You will no longer be able to access SnapDB or any of its (paid) features.
                </p>
            </section>

            <section class="flex flex-col gap-4 mb-4">
                <h2 class="text-xl font-bold">
                    <x-tabler-check class="size-6 text-green-700 inline" />
                    Within 14-day money-back guarantee
                </h2>
                <p>
                    If you are not satisfied with SnapDB, you can request a refund within 14 calendar days of your purchase.
                    You may be required to specify details about your refund request. This can include
                    software version(s), operating system(s), reason for return and any other relevant information.
                    To request a refund, please contact us on our contact page.
                </p>
            </section>

            <section class="flex flex-col gap-4 mb-4">
                <h2 class="text-xl font-bold">
                    <x-tabler-question-mark class="size-6 text-orange-500 inline" />
                    Outside of 14-day money-back guarantee
                </h2>
                <p>
                    If you are outside of the 14-day money-back guarantee, we unfortunately
                    cannot offer you a refund under circumstances. If there are special circumstances,
                    you may still be eligible for a refund. Please contact us on our
                    contact page to discuss your refund request.
                </p>

                <p>
                    We reserve the right to refuse a refund if we find that the refund request is
                    abusive or not in line with fair use of SnapDB.
                </p>

                <p>
                    We reserve the right to refuse a refund if we find that the refund request is
                    fraudulent or if it violates our <a href="{{ route('terms-conditions') }}" class="link">Terms of Conditions</a>.
                </p>
            </section>

        </x-slot:body>
    </x-article>
</x-layout>
