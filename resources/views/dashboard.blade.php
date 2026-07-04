<x-app-layout>
    <main class="p-6">

        <!-- Header -->
        <header class="flex items-center gap-4 mb-6">
            <div x-data="{ open: false }" class="relative">

                <button @click="open = !open"
                        class="p-2 text-white hover:bg-gray-700 rounded-lg transition">

                    <svg class="w-6 h-6"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 6h16M4 12h16m-7 6h7"/>
                    </svg>

                </button>

                <div
                    x-show="open"
                    @click.away="open = false"
                    x-transition
                    class="absolute left-0 mt-2 w-48 bg-gray-800 border border-gray-700 rounded-lg shadow-xl z-50">

                    <nav class="p-2 space-y-1">

                        <a href="{{ route('categories.index') }}" class="flex items-center px-4 py-2 text-white hover:bg-gray-700 rounded-md">
                            📁 Kategori
                        </a>

                        <a href="{{ route('vocabs.index') }}" class="flex items-center px-4 py-2 text-white hover:bg-gray-700 rounded-md">
                            📖 Vocabulary
                        </a>

                        <a href="{{ route('sentences.index') }}" class="flex items-center px-4 py-2 text-white hover:bg-gray-700 rounded-md">
                            ✍️ Sentence
                        </a>

                        <a href="{{ route('favorites.index') }}" class="flex items-center px-4 py-2 text-white hover:bg-gray-700 rounded-md">
                            ⭐ Favorite
                        </a>

                        <a href="{{ route('histories.index') }}" class="flex items-center px-4 py-2 text-white hover:bg-gray-700 rounded-md">
                            🕒 History
                        </a>

                    </nav>

                </div>
            </div>

            <h2 class="text-xl font-semibold text-white">
                Dashboard
            </h2>
        </header>

        <div class="bg-gray-800 p-6 rounded-lg border border-gray-700">
            <h3 class="text-lg font-bold text-white">
                Selamat Datang, {{ Auth::user()->name }}! 👋
            </h3>

            <p class="text-sm text-white">
                Berikut adalah ringkasan progres belajar Anda.
            </p>
        </div>

    </main>
</x-app-layout>