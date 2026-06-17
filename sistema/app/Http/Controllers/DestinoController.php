<?php

namespace App\Http\Controllers;

use App\Models\Destino;
use Illuminate\Http\Request;

class DestinoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destinos = Destino::orderBy('id_destino', 'desc')->get();

        return view('Destino.indexDestino', compact('destinos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Destino.FormDestino');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'nom_des' => 'required|string|max:100',
            'desc_des' => 'required|string',
            'ubicacion' => 'required|string|max:200',
            'imagen_des' => 'required|string|max:255',
        ]);

        Destino::create($datos);

        return redirect()->route('destinos.index')
            ->with('mensaje', 'Destino creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Destino $destino)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Destino $destino)
    {
        return view('Destino.EditDestino', compact('destino'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Destino $destino)
    {
        $datos = $request->validate([
            'nom_des' => 'required|string|max:100',
            'desc_des' => 'required|string',
            'ubicacion' => 'required|string|max:200',
            'imagen_des' => 'required|string|max:255',
        ]);

        $destino->update($datos);

        return redirect()->route('destinos.index')
            ->with('mensaje', 'Destino actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Destino $destino)
    {
        $destino->delete();

        return redirect()->route('destinos.index')
            ->with('mensaje', 'Destino eliminado correctamente.');
    }
}
