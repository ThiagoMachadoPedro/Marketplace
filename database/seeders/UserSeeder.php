<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->insert([
            [
                'name' => 'Thiago Machado',
                'user_name' => 'TM',
                'email' => 'tmachado807@gmail.com',
                'role' => 'admin',
                'status' => 'active',
                'password' => bcrypt('25059090'),
            ],
            [
                'name' => 'Veronica Sarmento',
                'user_name' => 'Maquiagem',
                'email' => 'joaopedro168168@gmail.com',
                'role' => 'vendor',
                'status' => 'active',
                'password' => bcrypt('25059090'),
            ],
            [
                'name' => 'Cliente User',
                'user_name' => 'User Cliente ',
                'email' => 'clayakuza007@gmail.com',
                'role' => 'user',
                'status' => 'active',
                'password' => bcrypt('25059090'),
            ],
        ]);
    }
}
