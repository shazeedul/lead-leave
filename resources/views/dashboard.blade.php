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
                </div>
                <div class="flex flex-wrap">
                    <div class="w-full md:w-1/3 p-4">
                        <div class="bg-gray-800 dark:bg-gray-900 text-white p-6 rounded-lg shadow-md">
                            <h2 class="text-lg font-semibold">{{ __('Total Pending Leaves') }}</h2>
                            <p>
                                <span class="inline-block text-2xl font-semibold">{{ $pendingLeavesCount }}</span>
                            </p>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 p-4">
                        <div class="bg-gray-800 dark:bg-gray-900 text-white p-6 rounded-lg shadow-md">
                            <h2 class="text-lg font-semibold">{{ __('Total Approved Leaves') }}</h2>
                            <p>
                                <span class="inline-block text-2xl font-semibold">{{ $approvedLeavesCount }}</span>
                            </p>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 p-4">
                        <div class="bg-gray-800 dark:bg-gray-900 text-white p-6 rounded-lg shadow-md">
                            <h2 class="text-lg font-semibold">{{ __('Total Rejected Leaves') }}</h2>
                            <p>
                                <span class="inline-block text-2xl font-semibold">{{ $rejectedLeavesCount }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
