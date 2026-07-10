<div class="mb-3">
    <label for="nom_des" class="form-label">Nombre del destino</label>
    <input
        type="text"
        name="nom_des"
        id="nom_des"
        class="form-control @error('nom_des') is-invalid @enderror"
        value="{{ old('nom_des', $destino->nom_des ?? '') }}"
        maxlength="100"
        required
    >
    @error('nom_des')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="desc_des" class="form-label">Descripcion</label>
    <textarea
        name="desc_des"
        id="desc_des"
        class="form-control @error('desc_des') is-invalid @enderror"
        rows="4"
        required
    >{{ old('desc_des', $destino->desc_des ?? '') }}
</textarea>

    @error('desc_des')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="ubicacion" class="form-label">Ubicacion</label>
    <select
        name="ubicacion"
        id="ubicacion"
        class="form-select @error('ubicacion') is-invalid @enderror"
        required
    >
        <option value="">Selecciona un estado</option>
        @foreach ($estadosMexico as $estado)
            <option
                value="{{ $estado }}"
                @selected(old('ubicacion', $destino->ubicacion ?? '') === $estado)
            >
                {{ $estado }}
            </option>
        @endforeach
    </select>
    @error('ubicacion')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

@php
    $serviciosSeleccionados = old(
        'servicios',
        isset($destino) ? $destino->servicios->pluck('id_servicio')->all() : []
    );

    $serviciosSeleccionados = array_map('strval', $serviciosSeleccionados ?? []);
@endphp

<div class="mb-3">
    <label class="form-label">Servicios y atracciones disponibles</label>

    @if ($servicios->isEmpty())
        <div class="alert alert-warning mb-0">
            No hay servicios ni atracciones registrados. Primero crea servicios para poder asignarlos al destino.
        </div>
    @else
        <div class="row g-2">
            @foreach ($servicios as $servicio)
                <div class="col-md-6 col-lg-4">
                    <div class="form-check border rounded p-3 h-100">
                        <input
                            type="checkbox"
                            name="servicios[]"
                            id="servicio_destino_{{ $servicio->id_servicio }}"
                            class="form-check-input @error('servicios') is-invalid @enderror @error('servicios.*') is-invalid @enderror"
                            value="{{ $servicio->id_servicio }}"
                            @checked(in_array((string) $servicio->id_servicio, $serviciosSeleccionados, true))
                        >
                        <label class="form-check-label" for="servicio_destino_{{ $servicio->id_servicio }}">
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
    <label for="imagen_des" class="form-label">Imagen del destino</label>
    <input
        type="file"
        name="imagen_des"
        id="imagen_des"
        class="form-control @error('imagen_des') is-invalid @enderror"
        accept="image/*"
        @if (!isset($destino)) required @endif
    >
    @isset($destino)
        @if ($destino->imagen_des)
            <div class="form-text">
                Imagen actual: {{ $destino->imagen_des }}
            </div>
        @endif
    @endisset
    @error('imagen_des')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
