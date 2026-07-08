@extends('PerfilUsuario')

@section('contenido')
    <section class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Nuevo servicio</h2>
            <a href="{{ route('servicios.index') }}" class="btn btn-secondary">
                Volver
            </a>
        </div>

        <form action="{{ route('servicios.store') }}" method="POST">
            @csrf

            @include('Servicio.Partials.camposServicio')

            <button type="submit" class="btn btn-primary">
                Guardar
            </button>
        </form>
    </section>
@endsection
