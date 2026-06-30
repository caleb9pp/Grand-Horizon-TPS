<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de Empleados | Grand Horizon</title>
    <link rel="stylesheet" href="{{ asset('css/style_portal_empleados.css') }}">
</head>
<body>
    <main class="empleados-login">
        <div class="marca-agua" aria-hidden="true">
            <img src="{{ asset('img/logo png.png') }}" alt="">
        </div>

        <section class="login-card" aria-labelledby="login-title">
            <header class="login-brand">
                <img src="{{ asset('img/logo png.png') }}" alt="Grand Horizon" class="login-logo">
                <h1 id="login-title">Grand Horizon</h1>
                <p>Portal de Empleados</p>
            </header>

            <form class="login-form" action="{{ route('portalEmpleados.login') }}" method="post">
                @csrf

                @error('nom_usuario')
                    <p class="login-error">{{ $message }}</p>
                @enderror

                <div class="form-group">
                    <label for="empleado-id">Usuario</label>
                    <input type="text" id="empleado-id" name="nom_usuario" value="{{ old('nom_usuario') }}" placeholder="EMPOO126" autocomplete="username" required>
                </div>

                <div class="form-group">
                    <label for="empleado-password">Contraseña</label>
                    <div class="password-field">
                        <input type="password" id="empleado-password" name="password" placeholder="**********" autocomplete="current-password" required>
                        <button type="button" class="toggle-password" aria-label="Mostrar contraseña">
                            <span class="eye-icon" aria-hidden="true"></span>
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <label for="departamento">Departamento</label>
                    <select id="departamento" name="departamento" required>
                        <option value="">Seleccione un departamento</option>
                        <option value="recepcion">Recepción</option>
                        <option value="reservas">Gerente</option>
                        <option value="administracion">Administración</option>
                    </select>
                </div>

                <label class="remember-option" for="recordarme">
                    <input type="checkbox" id="recordarme" name="recordarme" checked>
                    <span>Recordarme</span>
                </label>

                <button type="submit" class="submit-button">Iniciar Sesion</button>
            </form>

            <footer class="support-box">
                <a  class="support-link">
                    <span class="support-icon" aria-hidden="true"></span>
                    Soporte Tecnico
                </a>
                <p>¿No tienes una cuenta? <a href="#" class="employee-link">Contactanos</a> </p>
            </footer>
        </section>
    </main>
</body>
</html>
