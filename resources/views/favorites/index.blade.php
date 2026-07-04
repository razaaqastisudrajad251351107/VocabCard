<x-app-layout>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Header -->
            <header class="flex items-center gap-4 mb-4">
                <div x-data="{ open: false }" class="relative">

                    <!-- Tombol Hamburger -->
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

                    <!-- Dropdown Menu -->
                    <div x-show="open"
                         @click.away="open = false"
                         x-transition
                         class="absolute left-0 mt-2 w-48 bg-gray-800 border border-gray-700 rounded-lg shadow-xl z-50">

                        <nav class="p-2 space-y-1">
                            @foreach([
                                ['name' => 'Kategori', 'route' => 'categories.index', 'icon' => '📁'],
                                ['name' => 'Vocabulary', 'route' => 'vocabs.index', 'icon' => '📖'],
                                ['name' => 'Sentence', 'route' => 'sentences.index', 'icon' => '✍️'],
                                ['name' => 'Favorite', 'route' => 'favorites.index', 'icon' => '⭐'],
                                ['name' => 'History', 'route' => 'histories.index', 'icon' => '🕒']
                            ] as $menu)

                                <a href="{{ route($menu['route']) }}"
                                   class="flex items-center px-4 py-2 text-white hover:bg-gray-700 rounded-md">
                                    <span class="mr-3">{{ $menu['icon'] }}</span>
                                    {{ $menu['name'] }}
                                </a>

                            @endforeach
                        </nav>
                    </div>
                </div>

                <h2 class="text-3xl font-bold text-white">
                    Daftar Favorite
                </h2>
            </header>

            <!-- Tombol Tambah -->
            <a href="{{ route('favorites.create') }}"
               class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4">
                Tambah Favorite
            </a>

            <!-- Table (tidak diubah) -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full border-collapse border border-gray-300 dark:border-gray-700">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-700">
                                <th class="border border-gray-300 dark:border-gray-600 p-2 text-center w-16">ID</th>
                                <th class="border border-gray-300 dark:border-gray-600 p-2 text-left">User</th>
                                <th class="border border-gray-300 dark:border-gray-600 p-2 text-left">Vocabulary</th>
                                <th class="border border-gray-300 dark:border-gray-600 p-2 text-center w-48">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($favorites as $favorite)
                            <tr>
                                <td class="border border-gray-300 dark:border-gray-600 p-2 text-center">
                                    {{ $favorite->id }}
                                </td>
                                <td class="border border-gray-300 dark:border-gray-600 p-2">
                                    {{ $favorite->user->name }}
                                </td>
                                <td class="border border-gray-300 dark:border-gray-600 p-2 font-medium">
                                    {{ $favorite->vocab->word }}
                                </td>
                                <td class="border border-gray-300 dark:border-gray-600 p-2 text-center space-x-2">

                                    <a href="{{ route('favorites.show', $favorite->id) }}"
                                       class="text-blue-500 hover:underline">
                                        Lihat
                                    </a>

                                    <a href="{{ route('favorites.edit', $favorite->id) }}"
                                       class="text-yellow-500 hover:underline">
                                        Edit
                                    </a>

                                    <form action="{{ route('favorites.destroy', $favorite->id) }}"
                                          method="POST"
                                          class="inline-block">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="text-red-500 hover:underline"
                                                onclick="return confirm('Yakin ingin menghapus?')">
                                            Hapus
                                        </button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>