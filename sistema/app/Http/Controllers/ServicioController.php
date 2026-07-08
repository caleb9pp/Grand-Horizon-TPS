<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listarServicios()
    {
        $buscar = '';
        $servicios = Servicio::orderBy('id_servicio', 'desc')
            ->get();

        return view('Servicio.indexServicio', compact('servicios', 'buscar'));
    }

    public function searchServicios(Request $request)
    {
        $buscar = trim((string) $request->input('buscar'));

        if ($buscar === '') {
            return redirect()->route('servicios.index');
        }

        $servicios = Servicio::where(function ($query) use ($buscar) {
                $query->where('nom_servicio', 'like', "%{$buscar}%")
                    ->orWhere('descripcion', 'like', "%{$buscar}%");
            })
            ->orderBy('id_servicio', 'desc')
            ->get();

        return view('Servicio.indexServicio', compact('servicios', 'buscar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createServicio()
    {
        return view('Servicio.FormServicio');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeServicio(Request $request)
    {
        $datos = $request->validate([
            'nom_servicio' => 'required|string|max:100|unique:servicios,nom_servicio',
            'descripcion' => 'required|string',
        ], [
            'nom_servicio.unique' => 'Este servicio ya está registrado.',
        ]);

        Servicio::create($datos);

        return redirect()->route('servicios.index')
            ->with('mensaje', 'Servicio creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function showServicio(Servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editServicio(Servicio $servicio)
    {
        return view('Servicio.EditServicio', compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateServicio(Request $request, Servicio $servicio)
    {
        $datos = $request->validate([
            'nom_servicio' => 'required|string|max:100|unique:servicios,nom_servicio,' . $servicio->id_servicio . ',id_servicio',
            'descripcion' => 'required|string',
        ], [
            'nom_servicio.unique' => 'Este servicio ya está registrado.',
        ]);

        $servicio->update($datos);

        return redirect()->route('servicios.index')
            ->with('mensaje', 'Servicio actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyServicio(Servicio $servicio)
    {
        try {
            $servicio->delete();

            return redirect()->route('servicios.index')
                ->with('mensaje', 'Servicio eliminado correctamente.');
        } catch (QueryException $exception) {
            return redirect()->route('servicios.index')
                ->with('error', 'No se puede eliminar este servicio porque tiene registros asociados.');
        }
    }
}
