<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller {

    public function index() {
        $fotos = Foto::with('user')->withCount('likesRecibidos')->latest()->simplePaginate(9);

        return view('fotos.index', compact('fotos'));
    }

    public function create() {
        return view('fotos.create');
    }


    public function store(Request $request) {
        $request->validate([
            'foto' => 'required|image',
        ]);

        $path = $request->file('foto')->store('fotos', 'public');
        $foto = new Foto();
        $foto->url = $path;

        $foto->user_id = Auth::id();

        $foto->save();

        return redirect()->route('fotos.index')->with('success', 'Foto subida exitosamente.');
    }

    public function darLike(Foto $foto) {
        $usuario = Auth::user();

        $usuario->likes()->toggle($foto->id);

        return back();
    }

    public function show(Foto $foto) {
        $foto->load('user')->loadCount('likesRecibidos');

        return view('fotos.show', compact('foto'));
    }

    public function edit(Foto $foto) {
        return view('fotos.edit', compact('foto'));
    }


    public function update(Request $request, Foto $foto) {
        $request->validate([
            'foto' => 'required|image',
        ]);

        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($foto->url);
        }

        $path = $request->file('foto')->store('fotos', 'public');
        $foto->url = $path;
        $foto->user_id = Auth::id();

        $foto->save();

        return redirect()->route('fotos.index')->with('success', 'Foto actualizada exitosamente.');

    }

    public function destroy(Foto $foto) {
        Storage::disk('public')->delete($foto->url);
        $foto->delete();

        return redirect()->route('fotos.index')->with('success', 'Foto eliminada exitosamente.');
    }

}
