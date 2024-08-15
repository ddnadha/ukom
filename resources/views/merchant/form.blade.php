<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Merchant') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 font-semibold text-lg">
                    Merchant
                    <p class="font-medium text-sm mt-2">Daftar Merchant</p>
                </div>
                <form action="{{ route('merchant.store') }}" method="POST">
                    @csrf
                    <div class="m-6 mt-1 p-4">
                        <div class="grid grid-cols-2">
                            <div>
                                <div class="mt-4">
                                    <x-input-label for="name" :value="__('Nama')" />

                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                        required autocomplete="name" />

                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                <div class="flex justify-end">
                                    <div class="mt-4">
                                        <x-primary-button class="">
                                            {{ __('Daftar Merchant') }}
                                        </x-primary-button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
