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

        foreach ($fotosMuestra as $index => $fotoOriginal) {

            $extension = pathinfo($fotoOriginal, PATHINFO_EXTENSION);
            $nuevoNombre = 'fotos/img_' . str_pad($index + 1, 2, '0', STR_PAD_LEFT) . '.' . $extension;
            Storage::disk('public')->copy($fotoOriginal, $nuevoNombre);

            if ($index === 0) {
                $usuarioDueño = $demoUser;
            } else {
                $usuarioDueño = User::factory()->create();
            }

            $foto = Foto::create([
                'user_id' => $usuarioDueño->id,
                'url' => $nuevoNombre,
            ]);

            if ($usuarioDueño->id !== $demoUser->id && rand(0, 1) === 1) {
                $demoUser->likes()->attach($foto->id);
            }
        }
    }
}
