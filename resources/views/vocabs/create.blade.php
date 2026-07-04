<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            Tambah Vocabulary
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg border border-gray-300 dark:border-gray-700">
                
                <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50 text-center">
                    <h3 class="text-lg leading-6 font-bold text-gray-900 dark:text-gray-100">
                        Form Tambah Vocabulary
                    </h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        Silakan masukkan kata bahasa Inggris beserta artinya.
                    </p>
                </div>

                <div class="p-6">
                    <form action="{{ route('vocabs.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="word" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-2">Word</label>
                            <input type="text" name="word" id="word" required placeholder="Contoh: Run" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label for="meaning" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-2">Meaning</label>
                            <input type="text" name="meaning" id="meaning" required placeholder="Contoh: Lari" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm">
                        </div>

                        <div class="mb-6">
                            <label for="category_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-2">Category</label>
                            <select name="category_id" id="category_id" required class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm">
                                <option value="" disabled selected>-- Pilih Kategori --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center gap-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-md transition duration-150 ease-in-out shadow-sm">
                                Simpan
                            </button>
                            
                            <a href="{{ route('vocabs.index') }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 underline transition duration-150 ease-in-out">
                                Kembali
                            </a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>