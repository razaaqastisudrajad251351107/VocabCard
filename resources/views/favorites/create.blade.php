<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            Tambah Favorite
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg border border-gray-300 dark:border-gray-700">
                
                <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50 text-center">
                    <h3 class="text-lg leading-6 font-bold text-gray-900 dark:text-gray-100">
                        Form Tambah Favorite
                    </h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        Pilih vocabulary yang ingin kamu masukkan ke daftar favorit.
                    </p>
                </div>

                <div class="p-6">
                    <form action="{{ route('favorites.store') }}" method="POST">
                        @csrf

                        <div class="mb-6">
                            <label for="vocab_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-2">Vocabulary</label>
                            <select name="vocab_id" id="vocab_id" required class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm">
                                <option value="" disabled selected>-- Pilih Vocabulary --</option>
                                @foreach($vocabs as $vocab)
                                    <option value="{{ $vocab->id }}">
                                        {{ $vocab->word }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center gap-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-md transition duration-150 ease-in-out shadow-sm">
                                Simpan
                            </button>
                            
                            <a href="{{ route('favorites.index') }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 underline transition duration-150 ease-in-out">
                                Kembali
                            </a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>