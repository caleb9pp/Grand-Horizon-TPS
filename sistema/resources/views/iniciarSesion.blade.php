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
                <a href="{{ url('/') }}" class="btn btn-login-outline">Inicio</a>
            </div>

            <div class="login-card">
                <div class="login-header">
                    <h1 id="login-title">Bienvenido a Grand Horizon</h1>
                    <p>Ingresa con tu cuenta</p>
                </div>

                <form class="login-form">
                    <div class="mb-4">
                        <label for="login-usuario" class="form-label">Usuario</label>
                        <input type="text" class="form-control login-control" id="login-usuario" name="usuario" placeholder="usuario123">
                    </div>

                    <div class="mb-2">
                        <label for="login-password" class="form-label">Contraseña</label>
                        <div class="login-password-control">
                            <input type="password" class="form-control login-control" id="login-password" name="password" placeholder="************">
                            <button type="button" class="login-password-btn" aria-label="Mostrar contrasena">
                                <span aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>

                    <div class="login-options">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="remember-me" checked>
                            <label class="form-check-label" for="remember-me">
                                Recordarme
                            </label>
                        </div>
                        <a href="#">¿Olvidaste tu contraseña?</a>
                    </div>

                    <button type="submit" class="btn btn-login-primary w-100">Iniciar Sesión</button>

                    <p class="login-register">
                        ¿No tienes una cuenta? <a href="#">Regístrate</a>
                    </p>
                </form>
            </div>
        </section>
    </main>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
