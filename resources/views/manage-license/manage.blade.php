<div>
    <p class="text-pretty text-lg font-medium text-gray-500 sm:text-xl/8">
        You are currently logged in as <span class="font-bold">{{ $license->email }}</span>.
        <span class="block text-sm">
            @if ($license->isExpired())
                <x-tabler-x class="inline text-red-700" /> Your license has expired on {{ $license->expires_at->format('Y-m-d') }}.
            @else
                <x-tabler-check class="inline text-green-700" /> Your license is valid and
                @if ($license->expires_at === null)
                    will never expire.
                @else
                    expires on {{ $license->expires_at->format('Y-m-d') }}.
                @endif
            @endif
        </span>
    </p>

    @include('manage-license.devices')

    <form action="{{ route('manage-license.logout') }}" method="POST" class="mt-10">
        @csrf

        <x-btn.secondary>Sign Out</x-btn.secondary>
    </form>
</div>
