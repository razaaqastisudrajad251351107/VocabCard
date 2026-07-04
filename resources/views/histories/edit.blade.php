<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            Edit History
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg border border-gray-300 dark:border-gray-700">
                
                <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50 text-center">
                    <h3 class="text-lg leading-6 font-bold text-gray-900 dark:text-gray-100">
                        Form Edit History
                    </h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        Silakan perbarui data history di bawah ini.
                    </p>
                </div>

                <div class="p-6">
                    <form action="{{ route('histories.update', $history->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="user_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-2">User</label>
                            <select name="user_id" id="user_id" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $history->user_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="score" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-2">Score</label>
                            <input type="number" name="score" id="score" value="{{ $history->score }}" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm">
                        </div>

                        <div class="mb-6">
                            <label for="total_question" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-2">Total Question</label>
                            <input type="number" name="total_question" id="total_question" value="{{ $history->total_question }}" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm">
                        </div>

                        <div class="flex items-center gap-4 mt-8 pt-4 border-t border-gray-200 dark:border-gray-700">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-md transition duration-150 ease-in-out shadow-sm">
                                Update
                            </button>
                            
                            <a href="{{ route('histories.index') }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 underline transition duration-150 ease-in-out">
                                Kembali
                            </a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>