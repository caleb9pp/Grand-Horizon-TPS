<div class="mb-3">
    <label for="numero_habi" class="form-label">Número de habitación</label>
    <input
        type="number"
        name="numero_habi"
        id="numero_habi"
        class="form-control @error('numero_habi') is-invalid @enderror"
        value="{{ old('numero_habi', $habitacion->numero_habi ?? '') }}"
        required
    >
    @error('numero_habi')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="capacidad" class="form-label">Capacidad (huéspedes)</label>
    <input
        type="number"
        name="capacidad"
        id="capacidad"
        class="form-control @error('capacidad') is-invalid @enderror"
        value="{{ old('capacidad', $habitacion->capacidad ?? '') }}"
        min="1"
        required
    >
    @error('capacidad')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="tarifa_noche" class="form-label">Tarifa por noche</label>
    <input
        type="number"
        name="tarifa_noche"
        id="tarifa_noche"
        class="form-control @error('tarifa_noche') is-invalid @enderror"
        value="{{ old('tarifa_noche', $habitacion->tarifa_noche ?? '') }}"
        step="0.01"
        min="0.01"
        required
    >
    @error('tarifa_noche')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="id_hotel" class="form-label">Hotel</label>
    <select
        name="id_hotel"
        id="id_hotel"
        class="form-select @error('id_hotel') is-invalid @enderror"
        required
    >
        <option value="">Selecciona un hotel</option>
        @foreach ($hoteles as $hotel)
            <option
                value="{{ $hotel->id_hotel }}"
                @selected((string) old('id_hotel', $habitacion->id_hotel ?? '') === (string) $hotel->id_hotel)
            >
                {{ $hotel->nom_hotel }} - {{ $hotel->destino->nom_des ?? 'Sin destino' }}
            </option>
        @endforeach
    </select>
    @error('id_hotel')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="id_estado" class="form-label">Estado de la habitación</label>
    <select
        name="id_estado"
        id="id_estado"
        class="form-select @error('id_estado') is-invalid @enderror"
        required
    >
        <option value="">Selecciona un estado</option>
        @foreach ($estados as $estado)
            <option
                value="{{ $estado->id_estado }}"
                @selected((string) old('id_estado', $habitacion->id_estado ?? '') === (string) $estado->id_estado)
            >
                {{ $estado->tipo_estado }}
            </option>
        @endforeach
    </select>
    @error('id_estado')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="imagen" class="form-label">Imagen de la habitación</label>
    <input
        type="file"
        name="imagen"
        id="imagen"
        class="form-control @error('imagen') is-invalid @enderror"
        accept="image/*"
        @if (!isset($habitacion)) required @endif
    >
    @isset($habitacion)
        @if ($habitacion->imagen)
            <div class="form-text">
                Imagen actual: {{ $habitacion->imagen }}
            </div>
        @endif
    @endisset
    @error('imagen')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
