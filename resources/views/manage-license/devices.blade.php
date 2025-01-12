<div class="mt-8 flow-root max-w-md">
    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow ring-1 ring-black/5 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                            Registered Devices (max. {{ $license->max_devices }})
                        </th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach ($devices as $device)
                            <tr>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                    <span>
                                        <x-tabler-device-imac class="size-4 inline mr-2" />
                                        {{ $device->name }}
                                    </span>
                                    @if ($device->last_seen_at)
                                        <p class="text-gray-400 text-sm block">Last used {{ $device->last_seen_at->diffForHumans() }}</p>
                                    @endif
                                </td>
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <form action="{{ route('manage-license.remove-device') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $device->id }}">

                                        <x-btn.secondary type="submit">
                                            <x-tabler-trash />
                                        </x-btn.secondary>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if (count($devices) <= 0)
                            <tr>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                    <span class="text-gray-400">No devices registered yet.</span>
                                </td>
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    {{-- Actions Empty --}}
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
