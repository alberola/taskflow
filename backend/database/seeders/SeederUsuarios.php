<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//Recordar importar Hash y DB
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class SeederUsuarios extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Forma de insertar valores en base de datos en este caso tabla usuarios
        DB::table('users')->insert([
            'name' => 'Alejandro Alberola',
            'email' => 'alejandroalberola140400@gmail.com',
            'password' => Hash::make('12345'),
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
