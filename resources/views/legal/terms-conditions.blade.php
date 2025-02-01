<x-layout title="Terms and Conditions">
    <x-container>
        <x-navbar />
    </x-container>

    {{-- Templated from https://ploi.io/terms-of-service --}}
    <x-article>
        <x-slot:title>Terms and <span class="snapdb-underline underline-thick">Conditions</span></x-slot:title>
        <x-slot:meta>Last updated Feb 1, 2025.</x-slot:meta>
        <x-slot:body>
            <section class="flex flex-col gap-4 mb-4">
                <h2 class="text-xl font-bold">Agreement to Terms</h2>
                <p>
                    These Terms of Use constitute a legally binding agreement made between you,
                    whether personally or on behalf of an entity ("you")
                    and <strong>SnapDB ("Company", "we", "us", or "our")</strong>, concerning your access to and
                    use of the {{ url('/') }} website as well as any other media form, downloadable app,
                    media channel, mobile website or mobile application related, linked,
                    or otherwise connected thereto (collectively, the "App"). You agree that by
                    accessing SnapDB, you have read, understood, and agree to be bound by all of
                    these Terms of Use. IF YOU DO NOT AGREE WITH ALL OF THESE TERMS OF USE, THEN YOU
                    ARE EXPRESSLY PROHIBITED FROM USING THE SITE AND YOU MUST DISCONTINUE USE IMMEDIATELY.
                </p>

                <p>
                    Supplemental terms and conditions or documents that may be posted on SnapDB
                    from time to time are hereby expressly incorporated herein by reference.
                    We reserve the right, in our sole discretion, to make changes or modifications
                    to these Terms of Use at any time and for any reason. We will alert you about any
                    changes by updating the "Last updated" date of these Terms of Use, and you waive
                    any right to receive specific notice of each such change. It is your responsibility
                    to periodically review these Terms of Use to stay informed of updates. You will be
                    subject to, and will be deemed to have been made aware of and to have accepted, the
                    changes in any revised Terms of Use by your continued use of the App after the date
                    such revised Terms of Use are posted.
                </p>

                <p>
                    The information provided on SnapDB is not intended for distribution to
                    or use by any person or entity in any jurisdiction or country where such
                    distribution or use would be contrary to law or regulation or which would
                    subject us to any registration requirement within such jurisdiction or country.
                    Accordingly, those persons who choose to access SnapDB from other locations do
                    so on their own initiative and are solely responsible for compliance with local laws,
                    if and to the extent local laws are applicable.
                </p>

                <p>
                    SnapDB is intended for users who are at least 18 years of age. If you are a minor,
                    you must have your parent or guardian read and agree to these Terms of Use prior
                    to you using the App.
                </p>
            </section>

            <section class="flex flex-col gap-4 mb-4">
                <h2 class="text-xl font-bold">Intellectual Property Rights</h2>
                <p>
                    Unless otherwise indicated, SnapDB is our proprietary property and all
                    source code, functionality, software, website designs, audio, video, text,
                    photographs, and graphics on SnapDB (collectively, the "Content") and the
                    trademarks, service marks, and logos contained therein (the "Marks") are
                    owned or controlled by us or licensed to us, and are protected by copyright
                    and trademark laws and various other intellectual property rights and unfair
                    competition laws of the United States, foreign jurisdictions, and international
                    conventions. The Content and the Marks are provided on SnapDB "AS IS" for your
                    information and personal use only. Except as expressly provided in these Terms of Use,
                    no part of SnapDB and no Content or Marks may be copied, reproduced, aggregated,
                    republished, uploaded, posted, publicly displayed, encoded, translated, transmitted,
                    distributed, sold, licensed, or otherwise exploited for any commercial purpose whatsoever,
                    without our express prior written permission.
                </p>

                <p>
                    Provided that you are eligible to use SnapDB, you are granted a limited license
                    to access and use the App and to download or print a copy of any portion of the
                    Content to which you have properly gained access solely for your personal, non-commercial use.
                    We reserve all rights not expressly granted to you in and to SnapDB, the Content and the Marks.
                </p>
            </section>

            <section class="flex flex-col gap-4 mb-4">
                <h2 class="text-xl font-bold">Responsible License Usage</h2>
                <p>
                    You may be required to use/purchase/enter License credentials to use (parts of) SnapDB.
                    You agree to use the license responsibly and not share it with others. You agree to
                    not use the license for any illegal activities, including but not limited to hacking,
                    cracking, or any other form of unauthorized access to systems or data.
                </p>

                <p>
                    Your license may be limited to a certain number of devices or users. You agree to
                    not exceed this limit and to purchase additional licenses if needed.
                </p>
            </section>

            <section class="flex flex-col gap-4 mb-4">
                <h2 class="text-xl font-bold">Order Cancellation</h2>
                <strong>Our Rights</strong>
                <p>
                    We reserve the right to refuse or cancel Your Order at any time for certain
                    reasons including but not limited to:
                </p>

                <ul class="list-disc pl-6">
                    <li>Goods availability</li>
                    <li>Errors in the description or prices for Goods</li>
                    <li>Errors in Your Order</li>
                    <li>Fraud or an unauthorized or illegal transaction is suspected</li>
                </ul>

                <strong>Your Rights</strong>
                <p>
                    Any Goods you purchase can only be returned in accordance with these
                    Terms and Conditions and Our <a href="{{ route('returns-policy') }}" class="link">Returns Policy</a>.
                </p>

                <p>
                    Our Returns Policy forms a part of these Terms and Conditions.
                    Please read our <a href="{{ route('returns-policy') }}" class="link">Returns Policy</a> to learn more about your right to
                    cancel Your Order.
                </p>
            </section>

            <section class="flex flex-col gap-4 mb-4">
                <h2 class="text-xl font-bold">Fees and Payment</h2>
                <p>
                    We accept various forms of payment. These can be observed during the checkout process.
                </p>

                <p>
                    You may be required to purchase or pay a fee to access some of our services.
                    You agree to provide current, complete, and accurate purchase and account information
                    for all purchases made via SnapDB. We bill you through an online billing account
                    for purchases made via SnapDB. Sales tax will be added to the price of purchases
                    as deemed required by us. We may change prices at any time. All payments shall be
                    facilitated by our third party payment processor <a href="https://www.paddle.com/" class="link">Paddle</a>. By initiating a payment
                    you agree to all terms and conditions of Paddle.
                </p>

                <p>
                    We reserve the right to correct any errors or mistakes in pricing,
                    even if we have already requested or received payment. We also reserve the right
                    to refuse any order placed through SnapDB.
                </p>
            </section>

            <section class="flex flex-col gap-4 mb-4">
                <h2 class="text-xl font-bold">Free Trial</h2>
                <p>
                    We offer a 7-day free trial to new users of SnapDB. The user will not
                    be charged and the service will be suspended until upgraded to a paid
                    version at the end of the free trial.
                </p>
            </section>

            <section class="flex flex-col gap-4 mb-4">
                <h2 class="text-xl font-bold">Service Dependency and Availability</h2>
                <p>
                    SnapDB requires a functional backend server for full operation. By using
                    this application, you acknowledge and agree that the app's functionality is
                    wholly or partially dependent on the availability and operation of our backend server.
                </p>

                <p>
                    The term "lifetime" as used in our pricing plans refers to the operational
                    lifetime of the service, not the lifetime of the user or any other entity.
                    While we strive to maintain our backend services, we cannot guarantee their
                    availability indefinitely.
                </p>

                <p>
                    We reserve the right to discontinue the service at our sole discretion,
                    with or without prior notice, due to reasons including but not limited to
                    financial viability, technological constraints, or other unforeseen circumstances.
                </p>

                <p>
                    By purchasing a plan, including a lifetime plan, you acknowledge and accept the
                    risk of potential service discontinuation. No refunds, whether full or partial,
                    will be issued in the event the service is terminated.
                </p>

                <p>
                    To the fullest extent permitted by law, we are not liable for any losses,
                    damages, or inconveniences arising from the unavailability or discontinuation
                    of the SnapDB service.
                </p>
            </section>

            <section class="flex flex-col gap-4 mb-4">
                <h2 class="text-xl font-bold">Data Loss and/or Modification</h2>
                <p>
                    SnapDB is a database management tool that allows users to interact with their
                    databases. By using this application, you acknowledge and agree that the app
                    has the potential to modify or delete data in your databases.
                </p>

                <p>
                    We are not responsible for any data loss or modification that may occur as a
                    result of using SnapDB. It is your responsibility to ensure that you have
                    appropriate backups and safeguards in place to protect your data.
                </p>

                <p>
                    We recommend that you thoroughly test the application on non-production databases.
                    It is advised to only use SnapDB in combination with databases that do not contain
                    critical or sensitive data.
                    By using SnapDB, you agree to assume all risks associated with data loss or modification.
                </p>
            </section>

            <section class="flex flex-col gap-4 mb-4">
                <h2 class="text-xl font-bold">Contact Us</h2>
                <p>
                    In order to resolve a complaint regarding SnapDB or to receive further information regarding use of the Site, please get in touch on our <a href="{{ route('contact') }}" class="link">contact page</a>.
                </p>
            </section>
        </x-slot:body>
    </x-article>
</x-layout>
