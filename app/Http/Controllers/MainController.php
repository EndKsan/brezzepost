<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MainController extends Controller
{
    public function nova_pagina(): View 
    {
        return view('nova_pagina');
    }

    public function testes(Request $request) {
        //dados do usuario autenticado
        $id = $request->user()->id;
        echo $id;

        $username = $request->user()->email;
        Echo $username;
    }

    public function nova_pagina_publica()
    {
        return view('nova_pagina_publica');
    }

    public function main_logout() 
    {
        //fazer o logout sem POST - limpar o usaurio da sessao
        Auth::logout();

        //invalidar a sessao e regenerar o token
        session()->invalidate();
        session()->regenerateToken();

        return redirect('/');


    }
}
