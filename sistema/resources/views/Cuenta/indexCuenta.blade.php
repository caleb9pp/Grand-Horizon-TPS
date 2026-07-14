@extends('PerfilUsuario')

@section('contenido')
    <section class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Gestion de cuentas</h2>
            <a href="{{ route('cuentas.create') }}" class="btn btn-primary">
                Nuevo
            </a>
        </div>

        @if (session('mensaje'))
            <div id="mensaje" class="alert alert-success">
                {{ session('mensaje') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Celular</th>
                        <th>Rol</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->nombre }} {{ $usuario->apellido }}</td>
                            <td>{{ $usuario->nom_usuario }}</td>
                            <td>{{ $usuario->celular }}</td>
                            <td>{{ $usuario->rol->nom_rol ?? 'Sin rol' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                No hay cuentas registradas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <script src="{{ asset('js/alerta.js') }}"></script>
    </section>
@endsection
