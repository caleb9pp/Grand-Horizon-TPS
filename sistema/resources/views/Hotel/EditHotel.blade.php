@extends('PerfilUsuario')

@section('contenido')
    <section class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Editar hotel</h2>
            <a href="{{ route('hoteles.index') }}" class="btn btn-secondary">
                Volver
            </a>
        </div>

        <form action="{{ route('hoteles.update', $hotel) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @include('Hotel.Partials.camposHotel')

            <button type="submit" class="btn btn-primary">
                Guardar
            </button>
        </form>
    </section>
@endsection
