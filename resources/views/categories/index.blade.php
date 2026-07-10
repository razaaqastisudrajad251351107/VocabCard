<x-app-layout>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Header -->
            <div class="flex items-center gap-4 mb-6">

                <!-- Menu Hamburger -->
                <div x-data="{ open: false }" class="relative">

                    <button @click="open = !open"
                        class="p-3 bg-gray-700 hover:bg-gray-600 rounded-lg text-white shadow">
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
                    <div x-show="open"
                        x-transition
                        @click.away="open=false"
                        class="absolute left-0 mt-2 w-56 bg-gray-800 rounded-xl shadow-xl border border-gray-700 z-50">

                        <nav class="p-2 space-y-2">

                            <a href="{{ route('categories.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 text-white">
                                📁 <span>Kategori</span>
                            </a>

                            <a href="{{ route('vocabs.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 text-white">
                                📖 <span>Vocabulary</span>
                            </a>

                            <a href="{{ route('sentences.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 text-white">
                                ✍️ <span>Sentence</span>
                            </a>

                            <a href="{{ route('flashcard.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 text-white">
                                🎮 <span>Flashcard</span>
                            </a>

                            <a href="{{ route('favorites.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 text-white">
                                ⭐ <span>Favorite</span>
                            </a>

                            <a href="{{ route('histories.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 text-white">
                                🕒 <span>History</span>
                            </a>

                        </nav>

                    </div>

                </div>

                <h1 class="text-4xl font-bold text-white">
                    📂 Daftar Kategori
                </h1>

            </div>

            <!-- Tombol Tambah -->
            <div class="mb-5">

                <a href="{{ route('categories.create') }}"
                    class="bg-blue-600 hover:bg-blue-700 px-5 py-2 rounded-lg text-white shadow">

                    + Tambah Kategori

                </a>

            </div>

            <!-- Notifikasi -->

            @if(session('success'))

                <div class="bg-green-600 text-white rounded-lg px-4 py-3 mb-4">

                    {{ session('success') }}

                </div>

            @endif

            @if(session('error'))

                <div class="bg-red-600 text-white rounded-lg px-4 py-3 mb-4">

                    {{ session('error') }}

                </div>

            @endif

            <!-- Card -->

            <div class="bg-gray-800 rounded-xl shadow-lg overflow-hidden">

                <table class="w-full text-white">

                    <thead class="bg-gray-700">

                        <tr>

                            <th class="text-left px-6 py-4">
                                Nama Kategori
                            </th>

                            <th class="text-center px-6 py-4 w-48">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($categories as $category)

                        <tr class="border-b border-gray-700 hover:bg-gray-700">

                            <td class="px-6 py-4 font-medium">

                                {{ $category->nama_kategori }}

                            </td>

                            <td class="px-6 py-4 text-center">

                                <a href="{{ route('categories.edit',$category->id) }}"
                                    class="text-yellow-400 hover:text-yellow-300 font-semibold">

                                    Edit

                                </a>

                                <span class="mx-2 text-gray-500">|</span>

                                <form action="{{ route('categories.destroy',$category->id) }}"
                                    method="POST"
                                    class="inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Yakin ingin menghapus kategori?')"
                                        class="text-red-400 hover:text-red-300 font-semibold">

                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="2"
                                class="text-center py-10 text-gray-400">

                                Belum ada data kategori.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</x-app-layout>