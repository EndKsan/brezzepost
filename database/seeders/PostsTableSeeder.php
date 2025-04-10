<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; // Certifique-se de importar Carbon

class PostsTableSeeder extends Seeder
{

    public $timestamps = true;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        
        $posts = [
            [
                'user_id' => 1,
                'title' => 'Primeiro post do administrador',
                'content' => 'Este é o primeiro post do administrator do sistema. Sejam bem-vindos à comunidade!(teste)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 1,
                'title' => 'Uma nota importante',
                'content' => 'Todos os usuários devem manter o respeito mútuo e a cordialidade nas interações(teste)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 2,
                'title' => 'Olá a todos!',
                'content' => 'teste',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 2,
                'title' => 'Muito obrigado(teste)',
                'content' => 'Obrigado, adm(teste)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        DB::table('posts')->insert($posts);
    }
}
