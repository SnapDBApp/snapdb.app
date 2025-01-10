<x-mail.layout>
    <h1>⭐️ You're in for something great!</h1>
    <h2>Your SnapDB license</h2>

    <p>You can activate SnapDB with the credentials below. Please ensure to keep these private to prevent abuse.</p>

    <p><strong>License Email:</strong></p>
    <x-mail.code-block>{{ $licenseEmail }}</x-mail.code-block>

    <p><strong>License key:</strong></p>
    <x-mail.code-block>{{ $licenseKey }}</x-mail.code-block>

    <x-mail.cta-btn href="{{ route('landing') }}">Download SnapDB</x-mail.cta-btn>

    <p>Happy database-ing!</p>
</x-mail.layout>
