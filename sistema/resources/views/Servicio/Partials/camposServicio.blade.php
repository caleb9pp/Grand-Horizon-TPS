<div class="mb-3">
    <label for="nom_servicio" class="form-label">Nombre del servicio</label>
    <input
        type="text"
        name="nom_servicio"
        id="nom_servicio"
        class="form-control @error('nom_servicio') is-invalid @enderror"
        value="{{ old('nom_servicio', $servicio->nom_servicio ?? '') }}"
        maxlength="100"
        required
    >
    @error('nom_servicio')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="descripcion" class="form-label">Descripcion</label>
    <textarea
        name="descripcion"
        id="descripcion"
        class="form-control @error('descripcion') is-invalid @enderror"
        rows="4"
        required
    >{{ old('descripcion', $servicio->descripcion ?? '') }}
</textarea>

    @error('descripcion')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
