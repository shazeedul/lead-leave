<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto">
                        <x-table>
                            <x-slot name="header">
                                <x-table-column class="bg-white text-black font-semibold"
                                    style='width: 40%;'>{{ __('Name') }}</x-table-column>
                                <x-table-column class="bg-white text-black font-semibold"
                                    style='width: 15%;'>{{ __('Role') }}</x-table-column>
                                <x-table-column class="bg-white text-black font-semibold"
                                    style='width: 15%;'>{{ __('Status') }}</x-table-column>
                                <x-table-column class="bg-white text-black font-semibold"
                                    style='width: 30%;'>{{ __('Action') }}</x-table-column>
                            </x-slot>
                            @foreach ($users as $item)
                                <tr>
                                    <x-table-column>{{ $item->name }}</x-table-column>
                                    <x-table-column>{{ $item->role }}</x-table-column>
                                    <x-table-column>{{ $item->status == 'active' ? __('Active') : __('Blocked') }}</x-table-column>
                                    <x-table-column>
                                        <div class="inline-flex rounded-md shadow-sm">
                                            {{-- <a href="{{ route('user.show', $item->id) }}" aria-current="page"
                                                class="px-4 py-2 text-sm font-medium text-blue-700 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                                {{ __('Show') }}
                                            </a> --}}
                                            @if ($item->status == 'blocked')
                                                <form action="{{ route('user.active', $item->id) }}" method="post">
                                                    @csrf
                                                    <button type="submit"
                                                        class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                                        {{ __('Active') }}
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('user.block', $item->id) }}" method="post">
                                                    @csrf
                                                    <button type="submit"
                                                        class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                                        {{ __('Block') }}
                                                    </button>
                                                </form>
                                            @endif
                                            <a href="{{ route('user.edit', $item->id) }}"
                                                class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                                {{ __('Edit') }}
                                            </a>
                                            {{-- <form action="{{ route('user.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form> --}}
                                        </div>

                                    </x-table-column>
                                </tr>
                            @endforeach
                        </x-table>
                        <br>
                        {{ $users->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
