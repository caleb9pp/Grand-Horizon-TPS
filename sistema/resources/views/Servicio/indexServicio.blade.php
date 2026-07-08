@extends('PerfilUsuario')

@section('contenido')
    <section class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Lista de servicios</h2>
            <a href="{{ route('servicios.create') }}" class="btn btn-primary">
                Nuevo
            </a>
        </div>

        <div class="destinos-search">
            <div>
                <h3 class="mb-0">Buscar</h3>
                <p>Consulta servicios por nombre o descripcion.</p>
            </div>

            <form action="{{ route('servicios.search') }}" method="GET" class="destinos-search-form">
                <input
                    type="search"
                    name="buscar"
                    class="form-control"
                    placeholder="Ej. Spa, transporte, restaurante"
                    value="{{ $buscar }}"
                >
                <button type="submit" class="btn btn-primary">Buscar</button>

                @if ($buscar !== '')
                    <a href="{{ route('servicios.index') }}" class="btn btn-secondary">Limpiar</a>
                @endif
            </form>
        </div>

        @if (session('mensaje'))
            <div id="mensaje" class="alert alert-success">
                {{ session('mensaje') }}
            </div>
        @endif

        @if (session('error'))
            <div id="mensaje" class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($servicios as $servicio)
                        <tr>
                            <td>{{ $servicio->nom_servicio }}</td>
                            <td>{{ $servicio->descripcion }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('servicios.edit', $servicio) }}" class="btn btn-warning btn-sm">
                                        Editar
                                    </a>

                                    <form action="{{ route('servicios.destroy', $servicio) }}"
                                    method="POST"
                                    onsubmit="return confirm('¿Estás seguro de eliminar este servicio?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">
                                @if ($buscar !== '')
                                    No se encontraron servicios para "{{ $buscar }}".
                                @else
                                    No hay servicios registrados.
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <script src="{{ asset('js/alerta.js') }}"></script>
    </section>
@endsection
