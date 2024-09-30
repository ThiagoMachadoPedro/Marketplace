<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendedor;
use Illuminate\Database\Seeder;
use DB;
class VendedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuario = User::where('email', 'tmachado807@gmail.com')->first();

        $vendedor = new Vendedor();
        $vendedor->banner = 'uploads/capa-loja.jpg';
        $vendedor->fone = '(41)9 7777-7777';
        $vendedor->email = 'joaopedro168168@gmail.com';
        $vendedor->endereco = 'Rua Jesus Te Ama 777';
        $vendedor->descricao = 'Aqui descrição';
        $vendedor->id_usuario = $usuario->id;
        $vendedor->save();
    }
}
