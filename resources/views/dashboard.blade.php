<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Posts
        </h2>
    </x-slot>

    <div class="py-12">
        @if ($posts->count() === 0)
            <div class="max-w-7xl mx-auto mb-6 px-8 text-center">
                <p class="text-gray-400 mb-4">Nenhum post encontrado</p>

                @can('post.create')
                <a href="{{ route('post.create') }}"
                   class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    Criar Post
                </a>
                @endcan
            </div>
        @else
            @can('post.create')
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
                <div class="flex justify-start">
                    <a href="{{ route('post.create') }}"
                       class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                        Criar Post
                    </a>
                </div>
            </div>
            @endcan

            @foreach($posts as $post)
                <div class="max-w-7xl mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 mb-6 hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-300">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-gray-600 dark:text-gray-300">Autor: {{ $post->user->name ?? 'Desconhecido' }}</span>
                        </div>
                        <div>
                            <span class="text-gray-600 dark:text-gray-300">Criado em: {{ $post->created_at->format('d/m/Y H:i') }}</span>
                        </div>
                    </div>
                    <h3 class="text-2xl font-semibold mt-3 text-gray-800 dark:text-white">{{ $post->title }}</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">{{ Str::limit($post->content, 150) }}</p>

                    <!-- Botões de Editar e Deletar -->
                    <div class="mt-4 flex justify-end gap-4">
                        @can('post.update', $post)
                            <a href="{{ route('post.edit', $post->id) }}"
                               class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300">
                                Editar
                            </a>
                        @endcan
                        @can('post.delete', $post)
                            <a href="{{ route('post.delete', $post->id) }}"
                               class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300">
                                Deletar
                            </a>
                        @endcan
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</x-app-layout>
