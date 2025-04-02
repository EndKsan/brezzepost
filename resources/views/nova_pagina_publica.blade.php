<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            NOVA PAGINA PUBLICA
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!--  {{-- apresentar dados do usuario logado --}} -->
                      @auth
                     <p>Usuario: <strong>{{Auth::user()->name}}</strong></p>
                     <p>Estou logado</p>
                     <p>Nome: {{Auth::user(name)}}</p>
                     <p>Email: {{Auth::user()->email}}</p>
                     <p><a href="{{route('main_logout')}}">Logout</a></p>
                     @else
                     <p>não existe usuario autenticado</p>
                     <p>Clique <a href="{{'login'}}">Aqui</a> para fazer login</p>
                     @endauth
                     
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
