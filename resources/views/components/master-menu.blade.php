<div x-data="{ open: false }" class="relative mb-6">

    <div class="flex items-center gap-4">

        <button @click="open = !open"
                class="p-2 text-white hover:bg-gray-700 rounded-lg">
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

        <h2 class="text-3xl font-bold text-white">
            {{ $slot }}
        </h2>

    </div>

    <div x-show="open"
         @click.away="open = false"
         class="absolute left-0 mt-2 w-48 bg-gray-800 rounded-lg shadow-lg z-50">

        <a href="{{ route('categories.index') }}" class="block px-4 py-2 text-white hover:bg-gray-700">📁 Kategori</a>

        <a href="{{ route('vocabs.index') }}" class="block px-4 py-2 text-white hover:bg-gray-700">📖 Vocabulary</a>

        <a href="{{ route('sentences.index') }}" class="block px-4 py-2 text-white hover:bg-gray-700">✍️ Sentence</a>

        <a href="{{ route('favorites.index') }}" class="block px-4 py-2 text-white hover:bg-gray-700">⭐ Favorite</a>

        <a href="{{ route('histories.index') }}" class="block px-4 py-2 text-white hover:bg-gray-700">🕒 History</a>

    </div>

</div>