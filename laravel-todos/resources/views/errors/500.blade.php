{{-- resources/views/errors/500.blade.php --}}

<x-app-layout>
    <div class="py-16 flex flex-col items-center justify-center">
        <h1 class="text-5xl font-extrabold mb-4 text-red-600">
            500
        </h1>

        <p class="text-lg text-gray-700 mb-2">
            Възникна вътрешна грешка в сървъра.
        </p>

        <p class="text-sm text-gray-500 mb-6 text-center max-w-md">
            Ако грешката се повтаря, свържете се с администратора на системата
            или опитайте отново след малко.
        </p>

        <a href="{{ url('/') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Към началната страница
        </a>
    </div>
</x-app-layout>
