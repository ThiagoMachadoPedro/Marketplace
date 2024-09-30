<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendedor;
use Illuminate\Database\Seeder;
use DB;
use Str;
class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produtos')->insert([
            [
                'nome' => 'Produto Exemplo 1',
                'slug' => Str::slug('Produto Exemplo 1'),
                'capa' => 'caminho/para/imagem1.jpg',
                'id_vendedor' => 1,
                'categoria_id' => 1,
                'id_marca' => 1,
                'qtd' => 100,
                'descricao_curta' => 'Descrição curta do Produto Exemplo 1',
                'descricao_longa' => 'Descrição longa do Produto Exemplo 1, com mais detalhes e informações.',
                'valor' => 299.99,
                'status' => 1,  
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Produto Exemplo 2',
                'slug' => Str::slug('Produto Exemplo 2'),
                'capa' => 'caminho/para/imagem2.jpg',
                'id_vendedor' => 2,
                'categoria_id' => 2,
                'id_marca' => 2,
                'qtd' => 50,
                'descricao_curta' => 'Descrição curta do Produto Exemplo 2',
                'descricao_longa' => 'Descrição longa do Produto Exemplo 2, com mais detalhes e informações.',
                'valor' => 499.99,
                'status' => 1,  // Produto ativo
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
