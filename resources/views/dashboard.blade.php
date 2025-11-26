<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                    
                    @auth
                        <p class="mt-2">Welcome, {{ Auth::user()->name ?? 'User' }}!</p>
                    @endauth
                    
                    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <a href="{{ url('/') }}" class="block p-6 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg shadow hover:bg-gray-50 dark:hover:bg-gray-600 transition duration-150 ease-in-out">
                            <div class="flex items-center">
                                <svg class="w-8 h-8 text-blue-500 mr-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                </svg>
                                <div>
                                    <h3 class="text-lg font-semibold">View Public Map</h3>
                                    <p class="text-gray-600 dark:text-gray-400">Lihat peta bencana Malang Raya</p>
                                </div>
                            </div>
                        </a>
                        
                        @auth
                            <a href="{{ route('bencana.index') }}" class="block p-6 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg shadow hover:bg-gray-50 dark:hover:bg-gray-600 transition duration-150 ease-in-out">
                                <div class="flex items-center">
                                    <svg class="w-8 h-8 text-green-500 mr-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                                    </svg>
                                    <div>
                                        <h3 class="text-lg font-semibold">Manage Bencana</h3>
                                        <p class="text-gray-600 dark:text-gray-400">Kelola data bencana</p>
                                    </div>
                                </div>
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>