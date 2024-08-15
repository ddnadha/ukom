<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Master Data Merchant') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 font-semibold text-lg">
                    Merchant
                    <p class="font-medium text-sm mt-2">Daftar Merchant yang ada di sistem</p>
                </div>
                <div class="m-6 mt-1 p-4 border border-gray-200 rounded">
                    <table class="w-full divide-y divide-gray-200 bg-white text-sm">
                        <thead class="text-left">
                            <tr>
                                <th class="whitespace-nowrap p-4 font-bold text-gray-900 text-center">No</th>
                                <th class="whitespace-nowrap p-4 font-bold text-gray-900">Nama Merchant</th>
                                <th class="whitespace-nowrap p-4 font-bold text-gray-900">Status</th>
                                <th class="whitespace-nowrap p-4 font-bold text-gray-900">Action</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200">
                            @foreach ($merchants as $merchant)
                                <tr>
                                    <td class="whitespace-nowrap p-4 text-gray-900 text-center">{{ $loop->iteration }}
                                    </td>
                                    <td class="whitespace-nowrap p-4 text-gray-900">{{ $merchant->name }}</td>
                                    <td class="whitespace-nowrap p-4 text-gray-700">
                                        @if ($merchant->status == 'pending')
                                            <span
                                                class="px-3 py-1 rounded-full text-white bg-yellow-500">{{ $merchant->status }}</span>
                                        @endif
                                        @if ($merchant->status == 'active')
                                            <span
                                                class="px-3 py-1 rounded-full text-white bg-green-700">{{ $merchant->status }}</span>
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap p-4">
                                        <form action="{{ route('merchant.destroy', $merchant) }}">
                                            @csrf
                                            @method('DELETE')
                                            @if ($merchant->status != 'active')
                                                <a href="{{ route('merchant.activate', $merchant) }}"
                                                    class="inline-block rounded bg-green-600 px-4 py-2 text-xs font-medium text-white hover:bg-green-700">Aktivasi</a>
                                            @endif
                                            @if ($merchant->status != 'deactive')
                                                <a href="{{ route('merchant.deactivate', $merchant) }}"
                                                    class="inline-block rounded text-white bg-yellow-500 px-4 py-2 text-xs font-medium text-white hover:bg-yellow-600">Deaktivasi</a>
                                            @endif
                                            <button type="submit"
                                                class="inline-block rounded text-white bg-red-500 px-4 py-2 text-xs font-medium text-white hover:bg-red-600">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="px-6 mb-6">
                    {{ $merchants->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
