<div>
    <p class="text-pretty text-lg font-medium text-gray-500 sm:text-xl/8">
        If you already own a SnapDB license, fill in the details below to manage your license.
    </p>

    <form action="{{ route('manage-license.login') }}" method="POST" class="max-w-lg flex flex-col gap-4 mt-6">
        @csrf

        <div>
            <x-form.label for="email" :required="true">Email</x-form.label>
            <x-form.input type="email" name="email" id="email" required placeholder="john.doe@example.com" />
            <x-form.error name="email" />
        </div>

        <div>
            <x-form.label for="key" :required="true">License Key</x-form.label>
            <x-form.input id="key" name="key" required placeholder="c11c52fb-4db4-4f0e-96d4-8c8de23975e8" autocomplete="off" />
            <x-form.error name="key" />
        </div>

        <x-btn.primary type="submit" class="mt-2">Login</x-btn.primary>
    </form>

</div>
