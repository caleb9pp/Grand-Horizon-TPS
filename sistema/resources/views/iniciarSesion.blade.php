<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion | Grand Horizon</title>
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
                <h1>Una Vida Refinada</h1>
                <p>Reserva tu estancia perfecta en Grand Horizon.</p>
                <div class="login-indicadores" aria-hidden="true">
                    <span class="active"></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </section>

        <section class="login-form-panel">
            <div class="login-top-action">
                <a href="{{ route('index') }}" class="btn btn-login-outline">Inicio</a>
            </div>

            <div class="login-card">
                <div class="login-header">
                    <h1 id="login-title">Bienvenido a Grand Horizon</h1>
                    <p>Ingresa con tu cuenta de cliente</p>
                </div>

                @if (session('mensaje'))
                    <div class="login-alert login-alert-success">
                        {{ session('mensaje') }}
                    </div>
                @endif

                <form class="login-form" action="{{ route('clientes.login') }}" method="POST">
                    @csrf

                    @error('nom_usuario', 'clienteLogin')
                        <div class="login-alert">{{ $message }}</div>
                    @enderror
                    @error('password', 'clienteLogin')
                        <div class="login-alert">{{ $message }}</div>
                    @enderror

                    <div class="mb-4">
                        <label for="login-usuario" class="form-label">Usuario</label>
                        <input
                            type="text"
                            class="form-control login-control @error('nom_usuario', 'clienteLogin') is-invalid @enderror"
                            id="login-usuario"
                            name="nom_usuario"
                            value="{{ old('nom_usuario') }}"
                            placeholder="usuario123"
                            autocomplete="username"
                            required
                        >
                    </div>

                    <div class="mb-2">
                        <label for="login-password" class="form-label">Contrasena</label>
                        <div class="login-password-control">
                            <input
                                type="password"
                                class="form-control login-control @error('password', 'clienteLogin') is-invalid @enderror"
                                id="login-password"
                                name="password"
                                placeholder="************"
                                autocomplete="current-password"
                                required
                            >
                            <button type="button" class="login-password-btn" aria-label="Mostrar contrasena">
                                <span aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>

                    <div class="login-options">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="remember-me" name="recordarme" checked>
                            <label class="form-check-label" for="remember-me">
                                Recordarme
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-login-primary w-100">Iniciar Sesion</button>
                </form>

                <p class="login-register">
                    No tienes una cuenta? <a href="{{ route('clientes.register.form') }}">Registrate</a>
                </p>
            </div>
        </section>
    </main>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
