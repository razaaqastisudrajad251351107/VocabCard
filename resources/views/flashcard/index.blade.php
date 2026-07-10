<x-app-layout>

<div class="min-h-screen bg-gray-900 py-6">

    <div class="max-w-6xl mx-auto px-4">

        <!-- HEADER -->
        <header class="flex items-center justify-between mb-6">

            <div class="flex items-center gap-4">

                <!-- Hamburger -->
                <div x-data="{ open:false }" class="relative">

                    <button @click="open=!open"
                        class="p-3 bg-gray-800 hover:bg-gray-700 rounded-lg text-white transition">

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

                    <!-- Dropdown -->
                    <div
                        x-show="open"
                        x-transition
                        @click.away="open=false"
                        class="absolute left-0 mt-2 w-56 bg-gray-800 rounded-xl shadow-xl border border-gray-700 z-50">

                        <nav class="p-2 space-y-2">

                            @foreach([
                                ['name'=>'Kategori','route'=>'categories.index','icon'=>'📁'],
                                ['name'=>'Vocabulary','route'=>'vocabs.index','icon'=>'📖'],
                                ['name'=>'Sentence','route'=>'sentences.index','icon'=>'✍️'],
                                ['name'=>'Flashcard','route'=>'flashcard.index','icon'=>'🎮'],
                                ['name'=>'Favorite','route'=>'favorites.index','icon'=>'⭐'],
                                ['name'=>'History','route'=>'histories.index','icon'=>'🕒'],
                            ] as $menu)

                                <a href="{{ route($menu['route']) }}"
                                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-white hover:bg-blue-600 transition">

                                    <span class="text-2xl">
                                        {{ $menu['icon'] }}
                                    </span>

                                    <span class="font-semibold">
                                        {{ $menu['name'] }}
                                    </span>

                                </a>

                            @endforeach

                        </nav>

                    </div>

                </div>

                <h2 class="text-3xl font-bold text-white">
                    🎮 Flashcard Game
                </h2>

            </div>

            <!-- Statistik -->
            <div class="flex gap-3">

                <div class="bg-gray-800 border border-gray-700 rounded-xl px-5 py-3 text-center">

                    <p class="text-gray-400 text-sm">
                        Soal
                    </p>

                    <h3 class="text-xl font-bold text-blue-400">
                        {{ session('question',1) }}/10
                    </h3>

                </div>

                <div class="bg-gray-800 border border-gray-700 rounded-xl px-5 py-3 text-center">

                    <p class="text-gray-400 text-sm">
                        Skor
                    </p>

                    <h3 class="text-xl font-bold text-yellow-400">
                        {{ session('score',0) }}
                    </h3>

                </div>

            </div>

        </header>

        <!-- FLASHCARD CARD -->
        <div class="max-w-3xl mx-auto">

    <div class="bg-gray-800 border border-gray-700 rounded-2xl shadow-xl">

        <div class="p-8">

            <h2 class="text-3xl font-bold text-white text-center">
                Flashcard Game
            </h2>

            <p class="text-center text-gray-400 mt-2">
                Tebak apakah arti vocabulary berikut benar atau salah.
            </p>

            <hr class="border-gray-700 my-6">

            {{-- Notifikasi --}}
            @if(session('success'))
                <div class="bg-green-600 text-white rounded-lg p-3 text-center mb-5">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-600 text-white rounded-lg p-3 text-center mb-5">
                    {{ session('error') }}
                </div>
            @endif

            @if(isset($vocab))

            <div class="text-center">

                <p class="uppercase tracking-widest text-gray-500 text-sm">
                    Vocabulary
                </p>

                <h1 class="text-6xl font-bold text-blue-400 mt-3">
                    {{ $vocab->word }}
                </h1>

                <div class="mt-8">

                    <p class="text-gray-400 text-lg">
                        Arti yang ditampilkan
                    </p>

                    <h2 class="text-4xl font-bold text-yellow-400 mt-3">
                        {{ $meaning }}
                    </h2>

                </div>

            </div>

            <form action="{{ route('flashcard.check') }}"
                  method="POST"
                  class="mt-10 space-y-4">

                @csrf

                <button
                    type="submit"
                    name="answer"
                    value="true"
                    class="w-full py-4 rounded-xl border-2 border-green-500 text-green-400 hover:bg-green-600 hover:text-white transition text-xl font-semibold">

                    ✔ Benar

                </button>

                <button
                    type="submit"
                    name="answer"
                    value="false"
                    class="w-full py-4 rounded-xl border-2 border-red-500 text-red-400 hover:bg-red-600 hover:text-white transition text-xl font-semibold">

                    ✖ Salah

                </button>

                <button
                    type="submit"
                    name="answer"
                    value="skip"
                    class="w-full py-4 rounded-xl border-2 border-gray-500 text-gray-300 hover:bg-gray-700 transition text-xl font-semibold">

                    ○ Tidak Tahu

                </button>

            </form>

            @else

                <div class="text-center text-white py-10">

                    <h2 class="text-2xl font-bold">
                        Tidak ada Vocabulary
                    </h2>

                </div>

            @endif
            <div class="mt-10 border-t border-gray-700 pt-6">

                <div class="w-full bg-gray-700 rounded-full h-3">

                    <div
                        class="bg-blue-500 h-3 rounded-full transition-all duration-500"
                        style="width: {{ (session('question',1) / 10) * 100 }}%">
                    </div>

                </div>

                <div class="flex justify-between text-sm text-gray-400 mt-2">

                    <span>
                        Progress Permainan
                    </span>

                    <span>
                        {{ session('question',1) }}/10 Soal
                    </span>

                </div>

            </div>


            <div class="flex justify-center gap-4 mt-8">

                <a href="{{ route('flashcard.index') }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-semibold shadow-lg transition">

                    ➜ Soal Berikutnya

                </a>

                <a href="{{ route('flashcard.restart') }}"
                   class="bg-gray-700 hover:bg-gray-600 text-white px-8 py-3 rounded-xl font-semibold shadow-lg transition">

                    🔄 Mulai Ulang

                </a>

            </div>

        </div>

    </div>

</div>

    </div>

</div>

</x-app-layout>