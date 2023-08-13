<?php

namespace Database\Seeders;

use App\Models\Usuarios;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Usuarios::firstOrCreate([
            'nome' => 'Admin',
            'usuario' => 'Admin',
            'email' => 'Admin@Admin.com',
            'senha' => Hash::make('admin'),
            'token_api' => Str::random(25),
            'tipo' => 'Admin'
        ]);
    }
}
