<div class="mb-3">
    <label for="nom_hotel" class="form-label">Nombre del hotel</label>
    <input
        type="text"
        name="nom_hotel"
        id="nom_hotel"
        class="form-control @error('nom_hotel') is-invalid @enderror"
        value="{{ old('nom_hotel', $hotel->nom_hotel ?? '') }}"
        maxlength="100"
        required
    >
    @error('nom_hotel')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="dir_hotel" class="form-label">Direccion</label>
    <textarea
        name="dir_hotel"
        id="dir_hotel"
        class="form-control @error('dir_hotel') is-invalid @enderror"
        rows="3"
        required
    >{{ old('dir_hotel', $hotel->dir_hotel ?? '') }}</textarea>

    @error('dir_hotel')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="contacto" class="form-label">Contacto</label>
    <input
        type="text"
        name="contacto"
        id="contacto"
        class="form-control @error('contacto') is-invalid @enderror"
        value="{{ old('contacto', $hotel->contacto ?? '') }}"
        maxlength="200"
        required
    >
    @error('contacto')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="politica" class="form-label">Politica</label>
    <textarea
        name="politica"
        id="politica"
        class="form-control @error('politica') is-invalid @enderror"
        rows="4"
        required
    >{{ old('politica', $hotel->politica ?? '') }}</textarea>

    @error('politica')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="id_destino" class="form-label">Destino</label>
    <select
        name="id_destino"
        id="id_destino"
        class="form-select @error('id_destino') is-invalid @enderror"
        required
    >
        <option value="">Selecciona un destino</option>
        @foreach ($destinos as $destino)
            <option
                value="{{ $destino->id_destino }}"
                @selected((string) old('id_destino', $hotel->id_destino ?? '') === (string) $destino->id_destino)
            >
                {{ $destino->nom_des }}
            </option>
        @endforeach
    </select>
    @error('id_destino')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

@php
    $serviciosSeleccionados = old(
        'servicios',
        isset($hotel) ? $hotel->servicios->pluck('id_servicio')->all() : []
    );

    $serviciosSeleccionados = array_map('strval', $serviciosSeleccionados ?? []);
@endphp

<div class="mb-3">
    <label class="form-label">Servicios disponibles</label>

    @if ($servicios->isEmpty())
        <div class="alert alert-warning mb-0">
            No hay servicios registrados. Primero crea servicios para poder asignarlos al hotel.
        </div>
    @else
        <div class="row g-2">
            @foreach ($servicios as $servicio)
                <div class="col-md-6 col-lg-4">
                    <div class="form-check border rounded p-3 h-100">
                        <input
                            type="checkbox"
                            name="servicios[]"
                            id="servicio_{{ $servicio->id_servicio }}"
                            class="form-check-input @error('servicios') is-invalid @enderror @error('servicios.*') is-invalid @enderror"
                            value="{{ $servicio->id_servicio }}"
                            @checked(in_array((string) $servicio->id_servicio, $serviciosSeleccionados, true))
                        >
                        <label class="form-check-label" for="servicio_{{ $servicio->id_servicio }}">
                            <strong>{{ $servicio->nom_servicio }}</strong>
                            <span class="d-block text-muted small">{{ $servicio->descripcion }}</span>
                        </label>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    @error('servicios')
        <div class="text-danger small mt-2">{{ $message }}</div>
    @enderror
    @error('servicios.*')
        <div class="text-danger small mt-2">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="imagen_hotel" class="form-label">Imagen del hotel</label>
    <input
        type="file"
        name="imagen_hotel"
        id="imagen_hotel"
        class="form-control @error('imagen_hotel') is-invalid @enderror"
        accept="image/*"
        @if (!isset($hotel)) required @endif
    >
    @isset($hotel)
        @if ($hotel->imagen_hotel)
            <div class="form-text">
                Imagen actual: {{ $hotel->imagen_hotel }}
            </div>
        @endif
    @endisset
    @error('imagen_hotel')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
