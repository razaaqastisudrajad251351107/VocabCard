<div x-data="{ open: false }" class="relative mb-6">

    <!-- Header -->
    <div class="flex items-center gap-4">

        <!-- Tombol Hamburger -->
        <button
            @click="open = !open"
            class="flex items-center justify-center w-11 h-11 bg-gray-800 hover:bg-indigo-600 text-white rounded-xl transition duration-300 shadow-lg">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-6 h-6"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"/>

            </svg>

        </button>

        <h2 class="text-4xl font-bold text-white">
            {{ $slot }}
        </h2>

    </div>

    <!-- Dropdown Menu -->
    <div
        x-show="open"
        x-transition
        @click.away="open = false"
        class="absolute left-0 mt-4 w-64 bg-gray-800 border border-gray-700 rounded-2xl shadow-2xl overflow-hidden z-50">

        <a href="{{ route('categories.index') }}"
           class="flex items-center gap-3 px-5 py-4 text-white hover:bg-indigo-600 transition duration-300">
            📁
            <span>Kategori</span>
        </a>

        <a href="{{ route('vocabs.index') }}"
           class="flex items-center gap-3 px-5 py-4 text-white hover:bg-indigo-600 transition duration-300">
            📖
            <span>Vocabulary</span>
        </a>

        <a href="{{ route('sentences.index') }}"
           class="flex items-center gap-3 px-5 py-4 text-white hover:bg-indigo-600 transition duration-300">
            ✍️
            <span>Sentence</span>
        </a>

        <a href="{{ route('flashcard.index') }}"
           class="flex items-center gap-3 px-5 py-4 text-white hover:bg-indigo-600 transition duration-300">
            🎮
            <span>Flashcard Game</span>
        </a>

        <a href="{{ route('favorites.index') }}"
           class="flex items-center gap-3 px-5 py-4 text-white hover:bg-indigo-600 transition duration-300">
            ⭐
            <span>Favorite</span>
        </a>

        <a href="{{ route('histories.index') }}"
           class="flex items-center gap-3 px-5 py-4 text-white hover:bg-indigo-600 transition duration-300">
            🕒
            <span>History</span>
        </a>

    </div>

</div>