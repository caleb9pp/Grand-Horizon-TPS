@extends('PerfilUsuario')

@section('contenido')
    <section class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Editar destino</h2>
            <a href="{{ route('destinos.index') }}" class="btn btn-secondary">
                Volver
            </a>
        </div>

        <form action="{{ route('destinos.update', $destino) }}" method="POST">
            @csrf
            @method('PUT')

            @include('Destino.Partials.camposDestino')

            <button type="submit" class="btn btn-primary">
                Guardar
            </button>
        </form>
    </section>
@endsection
