<div class="mt-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="{{ Auth::user()->id === $post->user_id ? 'bg-black' : 'bg-gray-700' }} p-6 text-white">

                            <div class="flex justify-between">
                                <div>
                                    <span class="text-white me-3">Author:</span>
                                    <span class="text-white">{{ $post->user->name ?? 'Desconhecido' }}</span>
                                </div>
                                <div>
                                    <span class="text-white me-3">Created at:</span>
                                    <span>{{ optional($post->created_at)->format('d/m/Y H:i') }}</span>
                                </div>
                            </div>
                            <div class="mt-3 ps-5">
                                <h1 class="text-xl font-bold">{{ $post->title }}</h1>
                                <p class="mt-3">{{ $post->content }}</p>
                                {{-- Se quiser link para detalhes do post no futuro --}}
                                {{-- <a href="{{ route('posts.show', $post) }}" class="text-indigo-600 underline mt-2 inline-block">Ver mais</a> --}}
                            </div>

                            <div class="mt-1 ps-5 text-end">
                            <!-- POST DELETE -->
                            @can('post.delete', $post)
                                <a href="{{ route('post.delete', ['id' => $post->id]) }}"
                                class="bg-red-500 hover:bg-red-600 text-black font-bold py-2 px-4 rounded transition duration-150 ease-in-out">
                                    Delete
                                </a>
                            @endcan
                        </div>

                        </div>
                    </div>
                </div>
            </div>