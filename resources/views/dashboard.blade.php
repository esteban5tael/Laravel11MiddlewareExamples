<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ now()->format('Y-m-d') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                
                {{-- First Card --}}
                <h2 class="card">
                    <a href="{{ route('admin.index') }}" class="block p-6 bg-white dark:bg-gray-700 rounded-lg shadow-lg hover:shadow-2xl transition-shadow duration-300 text-center">
                        <span class="text-xl font-bold text-gray-800 dark:text-gray-200">{{ __('Admin Section') }}</span>
                    </a>
                </h2>

                {{-- Second Card --}}
                <h2 class="card">
                    <a href="{{ route('guests.index') }}" class="block p-6 bg-white dark:bg-gray-700 rounded-lg shadow-lg hover:shadow-2xl transition-shadow duration-300 text-center">
                        <span class="text-xl font-bold text-gray-800 dark:text-gray-200">{{ __('Guest Section') }}</span>
                    </a>
                </h2>

                {{-- Third Card --}}
                <h2 class="card">
                    <a href="{{ route('user.index') }}" class="block p-6 bg-white dark:bg-gray-700 rounded-lg shadow-lg hover:shadow-2xl transition-shadow duration-300 text-center">
                        <span class="text-xl font-bold text-gray-800 dark:text-gray-200">{{ __('User Section') }}</span>
                    </a>
                </h2>

            </div>
        </div>
    </div>
</x-app-layout>
