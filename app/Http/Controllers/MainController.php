<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;




class MainController extends Controller
{
 
    public function index(): View
    {
        $posts = Post::with('user')->get();
        return view('dashboard', ['posts' => $posts]);
    }

    public function createPost()
    {
        // Gate
        if (Gate::denies('post.create')) {
            abort(403, 'Você não tem permissão para criar um post');
        }

        return view('create-post');
    }

    public function storePost(Request $request)
    {
        // Gate para verificar permissão de criar post
        if (Gate::denies('post.create')) {
            abort(403, 'Você não tem permissão para criar um post');
        }
    
        // Validação precisa
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:100',
                'min:3',
                'regex:/^[\pL\s\-0-9!?,.]+$/u' // permite letras, números, espaços e pontuação básica
            ],
            'content' => [
                'required',
                'string',
                'min:10',
                'max:1000'
            ],
        ], [
            'title.required' => 'O título é obrigatório.',
            'title.max' => 'O título deve ter no máximo 100 caracteres.',
            'title.min' => 'O título deve ter no mínimo 3 caracteres.',
            'title.regex' => 'O título contém caracteres inválidos.',
            'content.required' => 'O conteúdo é obrigatório.',
            'content.min' => 'O conteúdo deve ter no mínimo 10 caracteres.',
            'content.max' => 'O conteúdo deve ter no máximo 1000 caracteres.',
        ]);
    
        // Criação do post
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::user()->id
        ]);
    
        return redirect()->route('dashboard')->with('success', 'Post criado com sucesso!');
    }

    
    public function deletePost($id)
    {
        $post = Post::find($id);
    
        // Gate
        if (Gate::denies('post.delete', $post)) {
            abort(403, 'Você não tem permissão para deletar um post');
        }
     
        // Deleta o post
        if ($post) {
            $post->delete();
        }
    
        return redirect()->route('dashboard')->with('success', 'Post deletado com sucesso.');
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
