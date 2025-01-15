<x-mail.layout>
    <h1>📩 New Contact Message</h1>

    <p>Message sent from {{ route('contact') }} - by {{ $name }}</p>

    <p><strong>Email:</strong></p>
    <x-mail.code-block>{{ $email }}</x-mail.code-block>

    <p><strong>Company:</strong></p>
    <x-mail.code-block>{{ $company ?? 'n/a' }}</x-mail.code-block>

    <p><strong>Message:</strong> {{ $enteredMessage }}</p>
</x-mail.layout>
