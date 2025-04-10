<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Novo Post
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto mt-6 bg-white dark:bg-gray-800 rounded shadow-sm p-6">
            <form action="{{ route('post.store') }}" method="POST">
                @csrf

                <!-- Título -->
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Título</label>
                    <input type="text" name="title" id="title"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600"
                        value="{{ old('title') }}">

                    @error('title')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Conteúdo -->
                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Conteúdo</label>
                    <textarea name="content" id="content" rows="5"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600">{{ old('content') }}</textarea>

                    @error('content')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

               <!-- Botões -->
            <div class="flex justify-start gap-4">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition">
                    Criar Post
                </button>

                <a href="{{ route('dashboard') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition">
                    Cancelar
                </a>
            </div>
            </form>
        </div>
    </div>
</x-app-layout>
