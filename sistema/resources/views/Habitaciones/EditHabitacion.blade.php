@extends('PerfilUsuario')

@section('contenido')
    <section class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Editar habitación</h2>
            <a href="{{ route('habitaciones.index') }}" class="btn btn-secondary">
                Volver
            </a>
        </div>

        <form action="{{ route('habitaciones.update', $habitacion) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @include('Habitaciones.Partials.camposHabitacion')

            <button type="submit" class="btn btn-primary">
                Guardar
            </button>
        </form>
    </section>
@endsection
