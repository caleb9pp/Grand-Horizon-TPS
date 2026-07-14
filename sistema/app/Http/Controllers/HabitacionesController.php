<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\EstadoHabi;
use App\Models\Habitaciones;
use App\Models\Hotel;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HabitacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listarHabitaciones()
    {
        $buscar = '';
        $habitaciones = Habitaciones::with(['hotel', 'estado', 'categoria', 'servicios'])
            ->orderBy('id_habitacion', 'desc')
            ->get();

        return view('Habitaciones.indexHabitaciones', compact('habitaciones', 'buscar'));
    }

    public function searchHabitaciones(Request $request)
    {
        $buscar = trim((string) $request->input('buscar'));

        if ($buscar === '') {
            return redirect()->route('habitaciones.index');
        }

        $habitaciones = Habitaciones::with(['hotel', 'estado', 'categoria', 'servicios'])
            ->where(function ($query) use ($buscar) {
                $query->where('numero_habi', 'like', "%{$buscar}%")
                    ->orWhere('capacidad', 'like', "%{$buscar}%")
                    ->orWhereHas('hotel', function ($hotelQuery) use ($buscar) {
                        $hotelQuery->where('nom_hotel', 'like', "%{$buscar}%");
                    })
                    ->orWhereHas('estado', function ($estadoQuery) use ($buscar) {
                        $estadoQuery->where('tipo_estado', 'like', "%{$buscar}%");
                    })
                    ->orWhereHas('categoria', function ($categoriaQuery) use ($buscar) {
                        $categoriaQuery->where('categoria', 'like', "%{$buscar}%");
                    })
                    ->orWhereHas('servicios', function ($servicioQuery) use ($buscar) {
                        $servicioQuery->where('nom_servicio', 'like', "%{$buscar}%");
                    });
            })
            ->orderBy('id_habitacion', 'desc')
            ->get();

        return view('Habitaciones.indexHabitaciones', compact('habitaciones', 'buscar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createHabitacion()
    {
        $hoteles = Hotel::orderBy('nom_hotel')->get();
        $estados = EstadoHabi::orderBy('tipo_estado')->get();
        $categorias = Categoria::orderBy('categoria')->get();
        $servicios = Servicio::orderBy('nom_servicio')->get();

        return view('Habitaciones.FormHabitacion', compact('hoteles', 'estados', 'categorias', 'servicios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeHabitacion(Request $request)
    {
        $datos = $request->validate([
            'numero_habi' => 'required|integer|unique:habitaciones,numero_habi',
            'capacidad' => 'required|integer|min:1',
            'tarifa_noche' => 'required|numeric|min:0.01',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'id_estado' => 'required|exists:estado_habi,id_estado',
            'id_hotel' => 'required|exists:hotels,id_hotel',
            'categoria' => 'required|string|max:100',
            'servicios' => 'nullable|array',
            'servicios.*' => 'exists:servicios,id_servicio',
        ], [
            'numero_habi.unique' => 'Este numero de habitacion ya esta registrado.',
        ]);

        $servicios = $datos['servicios'] ?? [];
        $datos['id_categoria'] = $this->obtenerCategoriaId($datos['categoria']);
        unset($datos['categoria'], $datos['servicios']);

        $datos['imagen'] = $request->file('imagen')->store('habitaciones', 'public');

        $habitacion = Habitaciones::create($datos);
        $habitacion->servicios()->sync($servicios);

        return redirect()->route('habitaciones.index')
            ->with('mensaje', 'Habitacion creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function showHabitacion(Habitaciones $habitacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editHabitacion(Habitaciones $habitacion)
    {
        $hoteles = Hotel::orderBy('nom_hotel')->get();
        $estados = EstadoHabi::orderBy('tipo_estado')->get();
        $categorias = Categoria::orderBy('categoria')->get();
        $servicios = Servicio::orderBy('nom_servicio')->get();
        $habitacion->load(['hotel', 'estado', 'categoria', 'servicios']);

        return view('Habitaciones.EditHabitacion', compact('habitacion', 'hoteles', 'estados', 'categorias', 'servicios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateHabitacion(Request $request, Habitaciones $habitacion)
    {
        $datos = $request->validate([
            'numero_habi' => 'required|integer|unique:habitaciones,numero_habi,' . $habitacion->id_habitacion . ',id_habitacion',
            'capacidad' => 'required|integer|min:1',
            'tarifa_noche' => 'required|numeric|min:0.01',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'id_estado' => 'required|exists:estado_habi,id_estado',
            'id_hotel' => 'required|exists:hotels,id_hotel',
            'categoria' => 'required|string|max:100',
            'servicios' => 'nullable|array',
            'servicios.*' => 'exists:servicios,id_servicio',
        ], [
            'numero_habi.unique' => 'Este numero de habitacion ya esta registrado.',
        ]);

        $servicios = $datos['servicios'] ?? [];
        $datos['id_categoria'] = $this->obtenerCategoriaId($datos['categoria']);
        unset($datos['categoria'], $datos['servicios']);

        if ($request->hasFile('imagen')) {
            if ($habitacion->imagen) {
                Storage::disk('public')->delete($habitacion->imagen);
            }

            $datos['imagen'] = $request->file('imagen')->store('habitaciones', 'public');
        } else {
            unset($datos['imagen']);
        }

        $habitacion->update($datos);
        $habitacion->servicios()->sync($servicios);

        return redirect()->route('habitaciones.index')
            ->with('mensaje', 'Habitacion actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyHabitacion(Habitaciones $habitacion)
    {
        try {
            if ($habitacion->imagen) {
                Storage::disk('public')->delete($habitacion->imagen);
            }

            $habitacion->delete();

            return redirect()->route('habitaciones.index')
                ->with('mensaje', 'Habitacion eliminada correctamente.');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() === '23000') {
                return redirect()->route('habitaciones.index')
                    ->with('error', 'No se puede eliminar esta habitacion porque tiene reservas o datos asociados.');
            }

            return redirect()->route('habitaciones.index')
                ->with('error', 'Error al eliminar la habitacion: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->route('habitaciones.index')
                ->with('error', 'Error inesperado al eliminar la habitacion.');
        }
    }

    private function obtenerCategoriaId(string $categoria): int
    {
        $categoria = preg_replace('/\s+/', ' ', trim($categoria));

        return Categoria::firstOrCreate([
            'categoria' => $categoria,
        ])->id_categoria;
    }
}
