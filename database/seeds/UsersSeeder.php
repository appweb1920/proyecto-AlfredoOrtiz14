<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([//Administrador
            'name' => 'Alfredo Ortiz',
            'email' => 'alfre@gmail.com',
            'password' => bcrypt('alfre123'),//Encripta la contraseña
            'rol' => '1'
        ]);
    }
}
