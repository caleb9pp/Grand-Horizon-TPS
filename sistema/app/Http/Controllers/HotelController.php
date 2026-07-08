<?php

namespace App\Http\Controllers;

use App\Models\Destino;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listarHoteles()
    {
        $buscar = '';
        $hoteles = Hotel::with('destino')
            ->orderBy('id_hotel', 'desc')
            ->get();

        return view('Hotel.indexHotel', compact('hoteles', 'buscar'));
    }

    public function searchHoteles(Request $request)
    {
        $buscar = trim((string) $request->input('buscar'));

        if ($buscar === '') {
            return redirect()->route('hoteles.index');
        }

        $hoteles = Hotel::with('destino')
            ->where(function ($query) use ($buscar) {
                $query->where('nom_hotel', 'like', "%{$buscar}%")
                    ->orWhere('dir_hotel', 'like', "%{$buscar}%")
                    ->orWhereHas('destino', function ($destinoQuery) use ($buscar) {
                        $destinoQuery->where('nom_des', 'like', "%{$buscar}%");
                    });
            })
            ->orderBy('id_hotel', 'desc')
            ->get();

        return view('Hotel.indexHotel', compact('hoteles', 'buscar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createHotel()
    {
        $destinos = Destino::orderBy('nom_des')->get();

        return view('Hotel.FormHotel', compact('destinos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeHotel(Request $request)
    {
        $datos = $request->validate([
            'nom_hotel' => 'required|string|max:100|unique:hotels,nom_hotel',
            'dir_hotel' => 'required|string',
            'contacto' => 'required|string|max:200',
            'politica' => 'required|string',
            'imagen_hotel' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'id_destino' => 'required|exists:destinos,id_destino',
        ], [
            'nom_hotel.unique' => 'Este hotel ya esta registrado.',
        ]);

        $datos['imagen_hotel'] = $request->file('imagen_hotel')->store('hoteles', 'public');

        Hotel::create($datos);

        return redirect()->route('hoteles.index')
            ->with('mensaje', 'Hotel creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function showHotel(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editHotel(Hotel $hotel)
    {
        $destinos = Destino::orderBy('nom_des')->get();

        return view('Hotel.EditHotel', compact('hotel', 'destinos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateHotel(Request $request, Hotel $hotel)
    {
        $datos = $request->validate([
            'nom_hotel' => 'required|string|max:100|unique:hotels,nom_hotel,' . $hotel->id_hotel . ',id_hotel',
            'dir_hotel' => 'required|string',
            'contacto' => 'required|string|max:200',
            'politica' => 'required|string',
            'imagen_hotel' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'id_destino' => 'required|exists:destinos,id_destino',
        ], [
            'nom_hotel.unique' => 'Este hotel ya esta registrado.',
        ]);

        if ($request->hasFile('imagen_hotel')) {
            if ($hotel->imagen_hotel) {
                Storage::disk('public')->delete($hotel->imagen_hotel);
            }

            $datos['imagen_hotel'] = $request->file('imagen_hotel')->store('hoteles', 'public');
        } else {
            unset($datos['imagen_hotel']);
        }

        $hotel->update($datos);

        return redirect()->route('hoteles.index')
            ->with('mensaje', 'Hotel actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyHotel(Hotel $hotel)
    {
        if ($hotel->imagen_hotel) {
            Storage::disk('public')->delete($hotel->imagen_hotel);
        }

        $hotel->delete();

        return redirect()->route('hoteles.index')
            ->with('mensaje', 'Hotel eliminado correctamente.');
    }
}
