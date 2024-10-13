<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Guest') }}
            </h2>

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ now()->format('Y-m-d') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-2">
        <div class="mx-auto sm:px-2 lg:px-2">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Main Content --}}
                    <h1 class="text-center text-3xl font-bold text-gray-700 dark:text-gray-200 mb-6">
                        Welcome to the Guest Section
                    </h1>

                    <p class="text-center text-lg text-gray-600 dark:text-gray-300">
                        If you are seeing this, it means you are an system guest.
                    </p>
                    {{-- End Main Content --}}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
