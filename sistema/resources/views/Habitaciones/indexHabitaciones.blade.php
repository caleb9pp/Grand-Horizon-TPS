@extends('PerfilUsuario')

@section('contenido')
    <section class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Lista de habitaciones</h2>
            <a href="{{ route('habitaciones.create') }}" class="btn btn-primary">
                Nuevo
            </a>
        </div>

        <div class="destinos-search">
            <div>
                <h3 class="mb-0">Buscar</h3>
                <p>Consulta habitaciones por número, capacidad, hotel o estado.</p>
            </div>

            <form action="{{ route('habitaciones.search') }}" method="GET" class="destinos-search-form">
                <input
                    type="search"
                    name="buscar"
                    class="form-control"
                    placeholder="Ej. 101, Doble, Hotel Maya"
                    value="{{ $buscar }}"
                >
                <button type="submit" class="btn btn-primary">Buscar</button>

                @if ($buscar !== '')
                    <a href="{{ route('habitaciones.index') }}" class="btn btn-secondary">Limpiar</a>
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
                        <th>Número</th>
                        <th>Capacidad</th>
                        <th>Tarifa/Noche</th>
                        <th>Hotel</th>
                        <th>Estado</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($habitaciones as $habitacion)
                        <tr>
                            <td>{{ $habitacion->numero_habi }}</td>
                            <td>
                                <span class="badge bg-info text-dark">
                                    {{ $habitacion->capacidad }} huéspedes
                                </span>
                            </td>
                            <td>
                                <strong>${{ number_format($habitacion->tarifa_noche, 2) }}</strong>
                            </td>
                            <td>{{ $habitacion->hotel->nom_hotel ?? 'Sin hotel' }}</td>
                            <td>
                                @php
                                    $estado = $habitacion->estado->tipo_estado ?? 'Desconocido';
                                    $badge = match($estado) {
                                        'Disponible' => 'bg-success',
                                        'Ocupada' => 'bg-warning text-dark',
                                        'Mantenimiento' => 'bg-danger',
                                        'Reservada' => 'bg-primary',
                                        default => 'bg-secondary'
                                    };
                                @endphp
                                <span class="badge {{ $badge }}">{{ $estado }}</span>
                            </td>
                            <td>
                                @if ($habitacion->imagen)
                                    <img
                                        src="{{ asset('storage/' . $habitacion->imagen) }}"
                                        alt="Habitación {{ $habitacion->numero_habi }}"
                                        class="img-thumbnail"
                                        style="width: 90px; height: 60px; object-fit: cover;"
                                    >
                                @else
                                    Sin imagen
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('habitaciones.edit', $habitacion) }}" class="btn btn-warning btn-sm">
                                        Editar
                                    </a>

                                    <form action="{{ route('habitaciones.destroy', $habitacion) }}"
                                    method="POST"
                                    onsubmit="return confirm('¿Estás seguro de eliminar esta habitación?');">
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
                                    No se encontraron habitaciones para "{{ $buscar }}".
                                @else
                                    No hay habitaciones registradas.
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
