<x-app-layout>
    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <h1 class="text-3xl font-bold mb-6">Каталог с книги</h1>

            {{-- Форма за търсене и филтри --}}
            <form method="GET"
                  action="{{ route('home') }}"
                  class="mb-6 bg-white p-4 rounded shadow flex flex-wrap gap-4">

                <div>
                    <label class="block text-sm font-semibold mb-1">
                        Търсене по заглавие
                    </label>
                    <input type="text"
                         name="q"
                        value="{{ request('q') }}"
                        placeholder="Въведете заглавие…"
                        class="border rounded px-3 py-2 w-64">

                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">
                        Автор
                    </label>
                    <select name="author_id" class="border rounded px-3 py-2 w-48">
                        <option value="">-- всички --</option>
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}" @selected(request('author_id') == $author->id)>
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">
                        Жанр
                    </label>
                    <select name="genre_id" class="border rounded px-3 py-2 w-48">
                        <option value="">-- всички --</option>
                        @foreach($genres as $genre)
                            <option value="{{ $genre->id }}" @selected(request('genre_id') == $genre->id)>
                                {{ $genre->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex items-end">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md transition">
                        Търси
                    </button>

                </div>
            </form>

            {{-- Списък с книги --}}
            <div class="space-y-4">
                @forelse($books as $book)
                    <a href="{{ route('books.show', $book) }}"
                       class="bg-white rounded shadow hover:shadow-lg transition flex justify-between items-center gap-4 overflow-hidden p-4">

                        {{-- Лява част – текст --}}
                        <div class="flex-1">
                            <h2 class="font-bold text-lg mb-1">
                                {{ $book->title }}
                            </h2>

                            <p class="text-sm text-gray-700 mb-1">
                                Автор: {{ $book->author->name }}
                            </p>

                            <p class="text-xs text-gray-500 mb-2">
                                Жанрове:
                                @foreach($book->genres as $genre)
                                    <span>{{ $genre->name }}@if(!$loop->last), @endif</span>
                                @endforeach
                            </p>

                            @if($book->year)
                                <p class="text-xs text-gray-500">
                                    Година: {{ $book->year }}
                                </p>
                            @endif
                        </div>

                        {{-- Дясна част – малка корица --}}
                        @if($book->cover_path)
                            <img
                                src="{{ asset('storage/' . $book->cover_path) }}"
                                alt="Корица на {{ $book->title }}"
                                class="w-24 h-32 md:w-28 md:h-40 object-cover rounded shadow"
                            >
                        @endif

                    </a>
                @empty
                    <p>Няма намерени книги.</p>
                @endforelse
            </div>

            <div class="mt-6">
                {{ $books->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
