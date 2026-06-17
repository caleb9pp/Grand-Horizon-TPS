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
    <input
        type="text"
        name="ubicacion"
        id="ubicacion"
        class="form-control @error('ubicacion') is-invalid @enderror"
        value="{{ old('ubicacion', $destino->ubicacion ?? '') }}"
        maxlength="200"
        required
    >
    @error('ubicacion')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="imagen_des" class="form-label">Imagen del destino</label>
    <input
        type="text"
        name="imagen_des"
        id="imagen_des"
        class="form-control @error('imagen_des') is-invalid @enderror"
        value="{{ old('imagen_des', $destino->imagen_des ?? '') }}"
        maxlength="255"
        required
    >
    @error('imagen_des')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
