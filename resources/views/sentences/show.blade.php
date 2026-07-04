<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detail Sentence
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg border border-gray-200 dark:border-gray-700">
                
                <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg leading-6 font-bold text-gray-900 dark:text-gray-100">
                        Informasi Sentence
                    </h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        Detail kalimat bahasa Inggris beserta terjemahannya.
                    </p>
                </div>

                <div class="px-6 py-6 space-y-6">
                    
                    <div>
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">ID</div>
                        <div class="text-base text-gray-900 dark:text-gray-100 font-bold">{{ $sentence->id }}</div>
                    </div>

                    <div>
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Vocabulary</div>
                        <div class="text-base text-gray-900 dark:text-gray-100 font-bold">{{ $sentence->vocab->word }}</div>
                    </div>

                    <div>
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">English Sentence</div>
                        <div class="text-base text-gray-900 dark:text-gray-100 font-bold">
                            {{ $sentence->english }}
                        </div>
                    </div>

                    <div>
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Arti Indonesia</div>
                        <div class="text-base text-gray-900 dark:text-gray-100 font-bold">
                            {{ $sentence->indonesia }}
                        </div>
                    </div>

                </div>
                
                <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 flex justify-end">
                    <a href="{{ route('sentences.index') }}" class="inline-flex items-center px-6 py-2 bg-gray-200 dark:bg-gray-100 border border-transparent rounded font-bold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300 dark:hover:bg-white transition ease-in-out duration-150 shadow-sm">
                        Kembali
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>