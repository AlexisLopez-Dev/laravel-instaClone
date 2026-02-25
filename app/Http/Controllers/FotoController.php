<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $fotos = Foto::all();

        return view('fotos.index', compact('fotos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fotos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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
        // 1. Obtenemos al usuario que está logueado ahora mismo
        $usuario = Auth::user();

        // 2. Magia de Laravel: Usamos toggle en la relación likes()
        // Si no le había dado like, se lo da (añade fila en pivote).
        // Si ya le había dado, se lo quita (borra fila en pivote).
        $usuario->likes()->toggle($foto->id);

        // 3. Volvemos a la página anterior
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Foto $foto) {
        return view('fotos.show', compact('foto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        $foto = Foto::find($id);
        return view('fotos.edit', compact('foto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Foto $foto) {
        $request->validate([
            'foto' => 'required|image',
        ]);

        // Eliminar la foto anterior del almacenamiento
        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($foto->url);
        }

        // Guardar la nueva foto
        $path = $request->file('foto')->store('fotos', 'public');
        $foto->url = $path;
        $foto->user_id = Auth::id();

        $foto->save();

        return redirect()->route('fotos.index')->with('success', 'Foto actualizada exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Foto $foto) {
        Storage::disk('public')->delete($foto->url);
        $foto->delete();

        return redirect()->route('fotos.index')->with('success', 'Foto eliminada exitosamente.');
    }
}
