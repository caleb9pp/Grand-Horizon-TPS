<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse | Grand Horizon</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_iniciarsesion.css') }}">
</head>
<body>
    <main class="login-section">
        <section class="login-imagen-panel">
            <div class="login-overlay"></div>

            <div class="GHImagenhero login-logo-imagen">
                <img src="{{ asset('img/logo png.png') }}" alt="Grand Horizon">
            </div>

            <div class="login-imagen-contenido">
                <h1>Empieza tu viaje</h1>
                <p>Crea tu cuenta para reservar experiencias en Grand Horizon.</p>
                <div class="login-indicadores" aria-hidden="true">
                    <span></span>
                    <span class="active"></span>
                    <span></span>
                </div>
            </div>
        </section>

        <section class="login-form-panel">
            <div class="login-top-action">
                <a href="{{ route('clientes.login.form') }}" class="btn btn-login-outline">Iniciar sesion</a>
            </div>

            <div class="login-card">
                <div class="login-header">
                    <h1>Crear cuenta</h1>
                    <p>Completa tus datos para registrarte como cliente</p>
                </div>

                <form class="login-form register-form" action="{{ route('clientes.register') }}" method="POST">
                    @csrf

                    @if ($errors->clienteRegistro->any())
                        <div class="login-alert">
                            Revisa los datos del registro.
                        </div>
                    @endif

                    <div class="register-grid">
                        <div class="mb-3">
                            <label for="registro-nombre" class="form-label">Nombre</label>
                            <input
                                type="text"
                                class="form-control login-control @error('nombre', 'clienteRegistro') is-invalid @enderror"
                                id="registro-nombre"
                                name="nombre"
                                value="{{ old('nombre') }}"
                                maxlength="100"
                                required
                            >
                            @error('nombre', 'clienteRegistro')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="registro-apellido" class="form-label">Apellido</label>
                            <input
                                type="text"
                                class="form-control login-control @error('apellido', 'clienteRegistro') is-invalid @enderror"
                                id="registro-apellido"
                                name="apellido"
                                value="{{ old('apellido') }}"
                                maxlength="100"
                                required
                            >
                            @error('apellido', 'clienteRegistro')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="registro-usuario" class="form-label">Usuario</label>
                        <input
                            type="text"
                            class="form-control login-control @error('nom_usuario', 'clienteRegistro') is-invalid @enderror"
                            id="registro-usuario"
                            name="nom_usuario"
                            value="{{ old('nom_usuario') }}"
                            maxlength="100"
                            autocomplete="username"
                            required
                        >
                        @error('nom_usuario', 'clienteRegistro')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="registro-celular" class="form-label">Celular</label>
                        <input
                            type="text"
                            class="form-control login-control @error('celular', 'clienteRegistro') is-invalid @enderror"
                            id="registro-celular"
                            name="celular"
                            value="{{ old('celular') }}"
                            maxlength="20"
                            required
                        >
                        @error('celular', 'clienteRegistro')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="register-grid">
                        <div class="mb-3">
                            <label for="registro-password" class="form-label">Contrasena</label>
                            <input
                                type="password"
                                class="form-control login-control @error('password', 'clienteRegistro') is-invalid @enderror"
                                id="registro-password"
                                name="password"
                                autocomplete="new-password"
                                required
                            >
                            @error('password', 'clienteRegistro')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="registro-password-confirmation" class="form-label">Confirmar</label>
                            <input
                                type="password"
                                class="form-control login-control"
                                id="registro-password-confirmation"
                                name="password_confirmation"
                                autocomplete="new-password"
                                required
                            >
                        </div>
                    </div>

                    <button type="submit" class="btn btn-login-primary w-100">Crear cuenta</button>
                </form>
            </div>
        </section>
    </main>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
