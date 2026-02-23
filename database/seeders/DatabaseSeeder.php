<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
          User::factory(5)->create();

//        $usuarios = User::factory()->count(5)->hasFotos(3)->create();
//
//        $todasLasFotos = \App\Models\Foto::all();
//
//        foreach ($usuarios as $usuario) {
//            $fotosAleatorias = $todasLasFotos->random(4);
//            $usuario->likes()->attach($fotosAleatorias->pluck('id'));
//        }

    }
}
