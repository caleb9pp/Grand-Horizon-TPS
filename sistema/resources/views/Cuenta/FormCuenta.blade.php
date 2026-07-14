@extends('PerfilUsuario')

@section('contenido')
    <section class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Nueva cuenta</h2>
            <a href="{{ route('cuentas.index') }}" class="btn btn-secondary">
                Volver
            </a>
        </div>

        <form action="{{ route('cuentas.store') }}" method="POST">
            @csrf

            @include('Cuenta.Partials.camposCuenta')

            <button type="submit" class="btn btn-primary">
                Guardar
            </button>
        </form>
    </section>
@endsection
