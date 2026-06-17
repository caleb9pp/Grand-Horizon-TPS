@extends('PerfilUsuario')

@section('contenido')
    <section class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Lista de destinos</h2>
            <a href="{{ route('destinos.create') }}" class="btn btn-primary">
                Nuevo
            </a>
        </div>

        <!-- @if (session('mensaje'))
            <div class="alert alert-success">
                {{ session('mensaje') }}
            </div>
        @endif -->

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
                            <td>{{ $destino->imagen_des }}</td>
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
                            <td colspan="5" class="text-center">No hay destinos registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
