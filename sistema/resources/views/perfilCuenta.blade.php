@extends('PerfilUsuario')

@section('contenido')
    <section class="profile-page">
        <header class="profile-header">
            <div>
                <p class="eyebrow">Mi cuenta</p>
                <h1>Hola, {{ $usuario->nombre }}</h1>
                <p>Consulta tu informacion de acceso y actualiza los datos de tu cuenta.</p>
            </div>
        </header>

        @if (session('mensaje'))
            <div id="mensaje" class="alert alert-success">
                {{ session('mensaje') }}
            </div>
        @endif

        <div class="profile-grid">
            <aside class="panel identity-panel">
                <div class="avatar-wrap">
                    <div class="avatar profile-avatar">
                        {{ strtoupper(substr($usuario->nombre, 0, 1) . substr($usuario->apellido, 0, 1)) }}
                    </div>
                </div>

                <h2>{{ $usuario->nombre }} {{ $usuario->apellido }}</h2>
                <p class="role">{{ $usuario->rol->nom_rol ?? 'Sin rol' }}</p>

                <div class="status-list">
                    <div class="status-item">
                        <span>Usuario</span>
                        <strong>{{ $usuario->nom_usuario }}</strong>
                    </div>
                    <div class="status-item">
                        <span>Celular</span>
                        <strong>{{ $usuario->celular }}</strong>
                    </div>
                    <div class="status-item">
                        <span>Estado</span>
                        <span class="badge-soft">Activo</span>
                    </div>
                </div>
            </aside>

            <div class="details-stack">
                <section class="panel section-panel">
                    <div class="section-title">
                        <h2>Editar informacion</h2>
                        <span>Los campos de contraseña son opcionales.</span>
                    </div>

                    <form action="{{ route('perfil.update') }}" method="POST" class="profile-edit-form">
                        @csrf
                        @method('PUT')

                        <div class="form-grid">
                            <div class="field">
                                <label for="nombre">Nombre</label>
                                <input
                                    type="text"
                                    name="nombre"
                                    id="nombre"
                                    class="@error('nombre') is-invalid @enderror"
                                    value="{{ old('nombre', $usuario->nombre) }}"
                                    maxlength="100"
                                    required
                                >
                                @error('nombre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="field">
                                <label for="apellido">Apellido</label>
                                <input
                                    type="text"
                                    name="apellido"
                                    id="apellido"
                                    class="@error('apellido') is-invalid @enderror"
                                    value="{{ old('apellido', $usuario->apellido) }}"
                                    maxlength="100"
                                    required
                                >
                                @error('apellido')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="field">
                                <label for="nom_usuario">Usuario</label>
                                <input
                                    type="text"
                                    name="nom_usuario"
                                    id="nom_usuario"
                                    class="@error('nom_usuario') is-invalid @enderror"
                                    value="{{ old('nom_usuario', $usuario->nom_usuario) }}"
                                    maxlength="100"
                                    required
                                >
                                @error('nom_usuario')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="field">
                                <label for="celular">Celular</label>
                                <input
                                    type="text"
                                    name="celular"
                                    id="celular"
                                    class="@error('celular') is-invalid @enderror"
                                    value="{{ old('celular', $usuario->celular) }}"
                                    maxlength="20"
                                    required
                                >
                                @error('celular')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="field">
                                <label for="password">Nueva contrasena</label>
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="@error('password') is-invalid @enderror"
                                    autocomplete="new-password"
                                >
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="field">
                                <label for="password_confirmation">Confirmar contrasena</label>
                                <input
                                    type="password"
                                    name="password_confirmation"
                                    id="password_confirmation"
                                    autocomplete="new-password"
                                >
                            </div>

                            <div class="field full">
                                <button type="submit" class="btn-gh">
                                    Actualizar cuenta
                                </button>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>

        <script src="{{ asset('js/alerta.js') }}"></script>
    </section>
@endsection
