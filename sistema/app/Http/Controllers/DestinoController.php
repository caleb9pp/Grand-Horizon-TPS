<?php

namespace App\Http\Controllers;

use App\Models\Destino;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DestinoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listarDestinos()
    {
        $buscar = '';
        $destinos = Destino::with('atracciones')
            ->orderBy('id_destino', 'desc')
            ->get();

        return view('Destino.indexDestino', compact('destinos', 'buscar'));
    }

    public function searchDestinos(Request $request)
    {
        $buscar = trim((string) $request->input('buscar'));

        if ($buscar === '') {
            return redirect()->route('destinos.index');
        }

        $destinos = Destino::with('atracciones')
            ->where(function ($query) use ($buscar) {
                $query->where('nom_des', 'like', "%{$buscar}%")
                    ->orWhere('desc_des', 'like', "%{$buscar}%")
                    ->orWhere('ubicacion', 'like', "%{$buscar}%");
            })
            ->orderBy('id_destino', 'desc')
            ->get();

        return view('Destino.indexDestino', compact('destinos', 'buscar'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function createDestino()
    {
        return view('Destino.FormDestino');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeDestino(Request $request)
    {
        $datos = $request->validate([
            'nom_des' => 'required|string|max:100|unique:destinos,nom_des',
            'desc_des' => 'required|string',
            'ubicacion' => 'required|string|max:200',
            'imagen_des' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'nom_des.unique' => 'Este destino ya está registrado.',
        ]);

        $datos['imagen_des'] = $request->file('imagen_des')->store('destinos', 'public');

        Destino::create($datos);

        return redirect()->route('destinos.index')
            ->with('mensaje', 'Destino creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function showDestino(Destino $destino)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editDestino(Destino $destino)
    {
        return view('Destino.EditDestino', compact('destino'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateDestino(Request $request, Destino $destino)
    {
        $datos = $request->validate([
            'nom_des' => 'required|string|max:100|unique:destinos,nom_des,' . $destino->id_destino . ',id_destino',
            'desc_des' => 'required|string',
            'ubicacion' => 'required|string|max:200',
            'imagen_des' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'nom_des.unique' => 'Este destino ya está registrado.',
        ]);

        if ($request->hasFile('imagen_des')) {
            if ($destino->imagen_des) {
                Storage::disk('public')->delete($destino->imagen_des);
            }

            $datos['imagen_des'] = $request->file('imagen_des')->store('destinos', 'public');
        } else {
            unset($datos['imagen_des']);
        }

        $destino->update($datos);

        return redirect()->route('destinos.index')
            ->with('mensaje', 'Destino actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyDestino(Destino $destino)
    {
        if ($destino->hoteles()->exists()) {
            return redirect()->route('destinos.index')
                ->with('error', 'No se puede eliminar este destino porque tiene hoteles asociados.');
        }

        if ($destino->imagen_des) {
            Storage::disk('public')->delete($destino->imagen_des);
        }

        $destino->delete();

        return redirect()->route('destinos.index')
            ->with('mensaje', 'Destino eliminado correctamente.');
    }
}
