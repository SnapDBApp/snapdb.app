<x-mail.layout>
    <h1>You're in for something great!</h1>
    <h2>Here's your SnapDB license</h2>

    <p>You can activate SnapDB with the credentials below. Please ensure to keep these private to prevent abuse.</p>

    <p><strong>License Email:</strong> {{ $licenseEmail }}</p>
    <p><strong>License key:</strong> {{ $licenseKey }}</p>

    <x-mail.cta-btn>Download SnapDB</x-mail.cta-btn>

    <p>Happy database-ing!</p>
</x-mail.layout>
