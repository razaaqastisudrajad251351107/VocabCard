<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white">
            📚 Dashboard VocabCard
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gray-900 py-8">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Welcome -->
            <div class="bg-gradient-to-r from-blue-700 to-indigo-800 rounded-xl shadow-lg p-8 mb-8">
                <h1 class="text-3xl font-bold text-white">
                    Selamat Datang Kelompok 3
                </h1>

                <p class="text-gray-200 mt-2">
                    Selamat datang di aplikasi <b>VocabCard</b>.
                    Kelola vocabulary, sentence, flashcard, favorite, dan history dengan mudah.
                </p>
            </div>

            <!-- Statistik -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                <!-- Vocabulary -->
                <div class="bg-gray-800 rounded-xl shadow-lg p-6 hover:bg-gray-700 transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400">Vocabulary</p>

                            <h2 class="text-4xl font-bold text-white mt-2">
                                {{ \App\Models\Vocab::count() }}
                            </h2>
                        </div>

                        <div class="text-5xl">
                            📖
                        </div>
                    </div>
                </div>

                <!-- Sentence -->
                <div class="bg-gray-800 rounded-xl shadow-lg p-6 hover:bg-gray-700 transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400">Sentence</p>

                            <h2 class="text-4xl font-bold text-white mt-2">
                                {{ \App\Models\Sentence::count() }}
                            </h2>
                        </div>

                        <div class="text-5xl">
                            ✍️
                        </div>
                    </div>
                </div>

                <!-- Favorite -->
                <div class="bg-gray-800 rounded-xl shadow-lg p-6 hover:bg-gray-700 transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400">Favorite</p>

                            <h2 class="text-4xl font-bold text-white mt-2">
                                {{ \App\Models\Favorite::count() }}
                            </h2>
                        </div>

                        <div class="text-5xl">
                            ⭐
                        </div>
                    </div>
                </div>

                <!-- Category -->
                <div class="bg-gray-800 rounded-xl shadow-lg p-6 hover:bg-gray-700 transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400">Kategori</p>

                            <h2 class="text-4xl font-bold text-white mt-2">
                                {{ \App\Models\Category::count() }}
                            </h2>
                        </div>

                        <div class="text-5xl">
                            📁
                        </div>
                    </div>
                </div>

            </div>

            <!-- Menu Cepat -->
            <div class="mt-10">

                <h2 class="text-2xl font-bold text-white mb-5">
                    🚀 Menu Cepat
                </h2>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-5">

                    <a href="{{ route('categories.index') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white rounded-xl shadow-lg p-6 text-center transition">

                        <div class="text-4xl">📁</div>

                        <div class="mt-3 font-semibold">
                            Kategori
                        </div>

                    </a>

                    <a href="{{ route('vocabs.index') }}"
                       class="bg-green-600 hover:bg-green-700 text-white rounded-xl shadow-lg p-6 text-center transition">

                        <div class="text-4xl">📖</div>

                        <div class="mt-3 font-semibold">
                            Vocabulary
                        </div>

                    </a>

                    <a href="{{ route('sentences.index') }}"
                       class="bg-purple-600 hover:bg-purple-700 text-white rounded-xl shadow-lg p-6 text-center transition">

                        <div class="text-4xl">✍️</div>

                        <div class="mt-3 font-semibold">
                            Sentence
                        </div>

                    </a>

                    <a href="{{ route('flashcard.index') }}"
                       class="bg-orange-500 hover:bg-orange-600 text-white rounded-xl shadow-lg p-6 text-center transition">

                        <div class="text-4xl">🎮</div>

                        <div class="mt-3 font-semibold">
                            Flashcard
                        </div>

                    </a>

                    <a href="{{ route('favorites.index') }}"
                       class="bg-yellow-500 hover:bg-yellow-600 text-white rounded-xl shadow-lg p-6 text-center transition">

                        <div class="text-4xl">⭐</div>

                        <div class="mt-3 font-semibold">
                            Favorite
                        </div>

                    </a>

                    <a href="{{ route('histories.index') }}"
                       class="bg-red-600 hover:bg-red-700 text-white rounded-xl shadow-lg p-6 text-center transition">

                        <div class="text-4xl">🕒</div>

                        <div class="mt-3 font-semibold">
                            History
                        </div>

                    </a>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>