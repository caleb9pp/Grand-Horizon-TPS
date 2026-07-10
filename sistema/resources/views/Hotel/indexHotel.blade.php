@extends('PerfilUsuario')

@section('contenido')
    <section class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Lista de hoteles</h2>
            <a href="{{ route('hoteles.create') }}" class="btn btn-primary">
                Nuevo
            </a>
        </div>

        <div class="destinos-search">
            <div>
                <h3 class="mb-0">Buscar</h3>
                <p>Consulta hoteles por nombre, direccion o destino.</p>
            </div>

            <form action="{{ route('hoteles.search') }}" method="GET" class="destinos-search-form">
                <input
                    type="search"
                    name="buscar"
                    class="form-control"
                    placeholder="Ej. Hotel Maya, Hotel Cancun "
                    value="{{ $buscar }}"
                >
                <button type="submit" class="btn btn-primary">Buscar</button>

                @if ($buscar !== '')
                    <a href="{{ route('hoteles.index') }}" class="btn btn-secondary">Limpiar</a>
                @endif
            </form>
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
                        <th>Direccion</th>
                        <th>Contacto</th>
                        <th>Destino</th>
                        <th>Servicios</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($hoteles as $hotel)
                        <tr>
                            <td>{{ $hotel->nom_hotel }}</td>
                            <td>{{ $hotel->dir_hotel }}</td>
                            <td>{{ $hotel->contacto }}</td>
                            <td>{{ $hotel->destino->nom_des ?? 'Sin destino' }}</td>
                            <td>
                                @forelse ($hotel->servicios as $servicio)
                                    <span class="badge bg-info text-dark">{{ $servicio->nom_servicio }}</span>
                                @empty
                                    Sin servicios
                                @endforelse
                            </td>
                            <td>
                                @if ($hotel->imagen_hotel)
                                    <img
                                        src="{{ asset('storage/' . $hotel->imagen_hotel) }}"
                                        alt="{{ $hotel->nom_hotel }}"
                                        class="img-thumbnail"
                                        style="width: 90px; height: 60px; object-fit: cover;"
                                    >
                                @else
                                    Sin imagen
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('hoteles.edit', $hotel) }}" class="btn btn-warning btn-sm">
                                        Editar
                                    </a>

                                    <form action="{{ route('hoteles.destroy', $hotel) }}"
                                    method="POST"
                                    onsubmit="return confirm('Estas seguro de eliminar este hotel?');">
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
                            <td colspan="7" class="text-center">
                                @if ($buscar !== '')
                                    No se encontraron hoteles para "{{ $buscar }}".
                                @else
                                    No hay hoteles registrados.
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
