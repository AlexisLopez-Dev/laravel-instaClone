<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Foto;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Storage::disk('public')->deleteDirectory('fotos');
        Storage::disk('public')->makeDirectory('fotos');

        $fotosMuestra = Storage::disk('public')->files('muestras');
        sort($fotosMuestra);

        if (empty($fotosMuestra)) {
            $this->command->error('¡No hay fotos de muestra!');
            return;
        }

        $demoUser = User::factory()->create([
            'name' => 'Invitado',
            'email' => 'invitado@gmail.com',
            'password' => bcrypt('invitado1234'),
        ]);

        User::factory(15)->create();

        $totalFotos = count($fotosMuestra);

        foreach ($fotosMuestra as $index => $fotoOriginal) {

            $extension = pathinfo($fotoOriginal, PATHINFO_EXTENSION);
            $nuevoNombre = 'fotos/img_' . str_pad($index + 1, 2, '0', STR_PAD_LEFT) . '.' . $extension;
            Storage::disk('public')->copy($fotoOriginal, $nuevoNombre);

            if ($index === $totalFotos - 1) {
                $usuarioDueno = $demoUser;
            } else {
                $usuarioDueno = User::factory()->create();
            }

            $foto = new Foto();
            $foto->user_id = $usuarioDueno->id;
            $foto->url = $nuevoNombre;
            $foto->created_at = now()->subMinutes($totalFotos - $index);
            $foto->save();

            $cantidadLikes = rand(5, 15);
            $usuariosLikers = User::inRandomOrder()->limit($cantidadLikes)->get();

            foreach ($usuariosLikers as $liker) {
                if ($liker->id !== $usuarioDueno->id) {
                    $liker->likes()->attach($foto->id);
                }
            }
        }

    }
}
