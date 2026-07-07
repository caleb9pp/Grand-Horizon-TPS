@extends('PerfilUsuario')

@section('contenido')
    <section class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Lista de destinos</h2>
            <a href="{{ route('destinos.create') }}" class="btn btn-primary">
                Nuevo
            </a>
        </div>

        <div class="destinos-search">
            <div>
                <h3 class="mb-0">Buscar</h3>
                <p>Consulta destinos por nombre, descripcion o ubicacion.</p>
            </div>

            <form action="{{ route('destinos.index') }}" method="GET" class="destinos-search-form">
                <input
                    type="search"
                    name="buscar"
                    class="form-control"
                    placeholder="Ej. Cancun, playa, Riviera Maya"
                    value="{{ $buscar }}"
                >   
                <button type="submit" class="btn btn-primary">Buscar</button>

                @if ($buscar !== '')
                    <a href="{{ route('destinos.index') }}" class="btn btn-secondary">Limpiar</a>
                @endif
            </form>
        </div>

         @if (session('mensaje'))
            <div class="alert alert-success">
                {{ session('mensaje') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Ubicacion</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($destinos as $destino)
                        <tr>
                            <td>{{ $destino->nom_des }}</td>
                            <td>{{ $destino->desc_des }}</td>
                            <td>{{ $destino->ubicacion }}</td>
                            <td>
                                @if ($destino->imagen_des)
                                    <img
                                        src="{{ asset('storage/' . $destino->imagen_des) }}"
                                        alt="{{ $destino->nom_des }}"
                                        class="img-thumbnail"
                                        style="width: 90px; height: 60px; object-fit: cover;"
                                    >
                                @else
                                    Sin imagen
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('destinos.edit', $destino) }}" class="btn btn-warning btn-sm">
                                        Editar
                                    </a>

                                    <form action="{{ route('destinos.destroy', $destino) }}" method="POST">
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
                            <td colspan="5" class="text-center">
                                @if ($buscar !== '')
                                    No se encontraron destinos para "{{ $buscar }}".
                                @else
                                    No hay destinos registrados.
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
