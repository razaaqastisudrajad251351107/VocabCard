<x-app-layout>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Header -->
            <header class="flex items-center gap-4 mb-6">

                <!-- Menu Hamburger -->
                <div x-data="{ open: false }" class="relative">

                    <button @click="open = !open"
                        class="p-3 bg-gray-700 text-white rounded-lg hover:bg-gray-600 transition">

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
                        @click.away="open = false"
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
                    📖 Daftar Vocabulary
                </h2>

            </header>

            <!-- Tombol Tambah -->
            <div class="mb-5">

                <a href="{{ route('vocabs.create') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow">

                    + Tambah Vocabulary

                </a>

            </div>

            <!-- Notifikasi -->
            @if(session('success'))

                <div class="bg-green-600 text-white px-4 py-3 rounded-lg mb-4">

                    {{ session('success') }}

                </div>

            @endif

            @if(session('error'))

                <div class="bg-red-600 text-white px-4 py-3 rounded-lg mb-4">

                    {{ session('error') }}

                </div>

            @endif

            <!-- Table -->
            <div class="bg-gray-800 rounded-xl shadow-lg overflow-hidden">

                <table class="w-full text-white">

                    <thead class="bg-gray-700">

                        <tr>

                            <th class="p-3 text-left w-20">
                                No
                            </th>

                            <th class="p-3 text-left">
                                Word
                            </th>

                            <th class="p-3 text-left">
                                Meaning
                            </th>

                            <th class="p-3 text-left">
                                Category
                            </th>

                            <th class="p-3 text-center w-48">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($vocabs as $vocab)

                            <tr class="border-b border-gray-700 hover:bg-gray-700 transition">

                                <td class="p-3">

                                    {{ $loop->iteration }}

                                </td>

                                <td class="p-3">

                                    {{ $vocab->word }}

                                </td>

                                <td class="p-3">

                                    {{ $vocab->meaning }}

                                </td>

                                <td class="p-3">

                                    {{ $vocab->category->nama_kategori ?? '-' }}

                                </td>

                                <td class="p-3 text-center">

                                    <a href="{{ route('vocabs.edit',$vocab->id) }}"
                                       class="text-yellow-400 hover:text-yellow-300 mr-4">

                                        Edit

                                    </a>

                                    <form action="{{ route('vocabs.destroy',$vocab->id) }}"
                                          method="POST"
                                          class="inline">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            onclick="return confirm('Yakin ingin menghapus data ini?')"
                                            class="text-red-400 hover:text-red-300">

                                            Hapus

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5"
                                    class="text-center p-6 text-gray-400">

                                    Belum ada data vocabulary.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</x-app-layout>