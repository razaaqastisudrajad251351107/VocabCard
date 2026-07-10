<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Generate Sentence AI
        </h2>
    </x-slot>

    <style>
        /* Warna teks dropdown */
        #vocab_id {
            color: white;
        }

        #vocab_id option {
            color: white;
            background-color: #374151;
        }

        /* Warna teks textarea */
        #english,
        #indonesia {
            color: white;
        }

        #english::placeholder,
        #indonesia::placeholder {
            color: white;
        }
    </style>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6">

                    <h2 class="text-2xl font-bold text-white">
                        Form Generate Sentence
                    </h2>

                    <p class="text-sm text-white mb-6">
                        Pilih vocabulary kemudian generate kalimat menggunakan AI.
                    </p>

                    <hr class="mb-6">

                    <form method="POST" action="{{ route('sentences.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="vocab_id" class="block text-sm font-medium text-white mb-2">
                                Vocabulary
                            </label>

                            <select
                                id="vocab_id"
                                name="vocab_id"
                                class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white">

                                <option value="" selected>
                                    -- Pilih Vocabulary --
                                </option>

                                @foreach($vocabs as $vocab)
                                    <option value="{{ $vocab->id }}">
                                        {{ $vocab->word }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="mb-5">
                            <button
                                type="button"
                                id="generate-ai"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                                Generate Sentence AI
                            </button>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-white mb-2">
                                English Sentence
                            </label>

                            <textarea
                                id="english"
                                name="english"
                                rows="4"
                                class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white"></textarea>
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-white mb-2">
                                Indonesia Translation
                            </label>

                            <textarea
                                id="indonesia"
                                name="indonesia"
                                rows="4"
                                class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white"></textarea>
                        </div>

                        <div class="flex items-center gap-3">

                            <button
                                type="submit"
                                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                                Simpan
                            </button>

                            <a href="{{ route('sentences.index') }}"
                               class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded">
                                Kembali
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {

        const button = document.getElementById('generate-ai');

        button.addEventListener('click', async function () {

            const select = document.getElementById('vocab_id');

            if (select.value === "") {
                alert("Pilih vocabulary terlebih dahulu.");
                return;
            }

            const word = select.options[select.selectedIndex].text;

            try {

                const response = await fetch('/generate-sentence/' + encodeURIComponent(word));

                if (!response.ok) {
                    throw new Error("Gagal mengambil data AI");
                }

                const data = await response.json();

                document.getElementById('english').value = data.english ?? '';
                document.getElementById('indonesia').value = data.indonesia ?? '';

            } catch (error) {

                console.error(error);
                alert("Terjadi kesalahan saat generate sentence.");

            }

        });

    });
    </script>

</x-app-layout>