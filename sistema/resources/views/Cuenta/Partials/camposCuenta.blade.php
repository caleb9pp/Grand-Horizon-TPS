<div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input
        type="text"
        name="nombre"
        id="nombre"
        class="form-control @error('nombre') is-invalid @enderror"
        value="{{ old('nombre') }}"
        maxlength="100"
        required
    >
    @error('nombre')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="apellido" class="form-label">Apellido</label>
    <input
        type="text"
        name="apellido"
        id="apellido"
        class="form-control @error('apellido') is-invalid @enderror"
        value="{{ old('apellido') }}"
        maxlength="100"
        required
    >
    @error('apellido')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="nom_usuario" class="form-label">Usuario</label>
    <input
        type="text"
        name="nom_usuario"
        id="nom_usuario"
        class="form-control @error('nom_usuario') is-invalid @enderror"
        value="{{ old('nom_usuario') }}"
        maxlength="100"
        required
    >
    @error('nom_usuario')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="celular" class="form-label">Celular</label>
    <input
        type="text"
        name="celular"
        id="celular"
        class="form-control @error('celular') is-invalid @enderror"
        value="{{ old('celular') }}"
        maxlength="20"
        required
    >
    @error('celular')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="id_rol" class="form-label">Rol</label>
    <select
        name="id_rol"
        id="id_rol"
        class="form-control @error('id_rol') is-invalid @enderror"
        required
    >
        <option value="">Seleccione un rol</option>
        @foreach ($roles as $rol)
            <option value="{{ $rol->id_rol }}" @selected((string) old('id_rol') === (string) $rol->id_rol)>
                {{ $rol->nom_rol }}
            </option>
        @endforeach
    </select>
    @error('id_rol')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="password" class="form-label">Contrasena</label>
    <input
        type="password"
        name="password"
        id="password"
        class="form-control @error('password') is-invalid @enderror"
        autocomplete="new-password"
        required
    >
    @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="password_confirmation" class="form-label">Confirmar contrasena</label>
    <input
        type="password"
        name="password_confirmation"
        id="password_confirmation"
        class="form-control"
        autocomplete="new-password"
        required
    >
</div>
