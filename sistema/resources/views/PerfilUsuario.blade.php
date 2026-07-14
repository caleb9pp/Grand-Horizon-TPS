<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario | Grand Horizon</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/PerfilUsuario.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>
<body>
    <div class="profile-shell">
        <aside class="sidebar" aria-label="Navegación principal">
            <div class="brand-area">
                <div class="brand-mark">
                    <img src="{{ asset('img/logo png.png') }}" alt="Grand Horizon">
                </div>
                <div class="brand-copy">
                    <p class="brand-title">Grand Horizon</p>
                </div>
                <button class="sidebar-toggle" type="button" aria-label="Alternar menú" aria-expanded="true">
                    <svg class="icon" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M4 7h16"></path>
                        <path d="M4 12h16"></path>
                        <path d="M4 17h16"></path>
                    </svg>
                </button>
            </div>

            <nav class="nav-menu">
                <a class="nav-link" href="{{ route('destinos.index') }}">
                 <i class="bi bi-globe-americas-fill"></i>
                      <span class="nav-text">Destinos</span>
                 
                    
                </a>
                <a class="nav-link" href="{{ route('hoteles.index') }}">
                   <i class="bi bi-buildings"></i>
                    <span class="nav-text">Hoteles</span>
                </a>

                <a class="nav-link" href="{{ route('habitaciones.index') }}">
                    <i class="bi bi-door-closed"></i>
                         <span class="nav-text">Habitaciones</span>
                      
                </a>
                <a class="nav-link" href="{{ route('servicios.index') }}">
                   <i class="bi bi-bell"></i>
                    <span class="nav-text">Servicios</span>
                </a>

                 <a class="nav-link" href="{{ route('cuentas.index') }}">
                   <i class="bi bi-check"></i>
                    <span class="nav-text">Gestion de cuentas</span>
                </a>
              
            </nav>

            @php
                $usuarioSesion = auth()->user();
                $iniciales = $usuarioSesion
                    ? strtoupper(substr($usuarioSesion->nombre, 0, 1) . substr($usuarioSesion->apellido, 0, 1))
                    : 'US';
            @endphp

            <div class="sidebar-footer">
                <a class="staff-card staff-card-link" href="{{ route('perfil.edit') }}">
                    <div class="staff-dot">{{ $iniciales }}</div>
                    <div class="staff-copy">
                        <strong>Hola, {{ $usuarioSesion->nombre ?? 'Usuario' }}</strong>
                        <span>{{ $usuarioSesion->rol->nom_rol ?? 'Sesion administrativa' }}</span>
                    </div>
                </a>
            </div>
        </aside>

        <div class="sidebar-backdrop" aria-hidden="true"></div>

        <main class="main-content">
            <div class="mobile-topbar">
                <button class="sidebar-toggle mobile-menu" type="button" aria-label="Abrir menú" aria-expanded="false">
                    <svg class="icon" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M4 7h16"></path>
                        <path d="M4 12h16"></path>
                        <path d="M4 17h16"></path>
                    </svg>
                </button>
                <span class="mobile-brand">Grand Horizon</span>
            </div>

            @yield('contenido')

        </main>
    </div>

    <script src="{{ asset('js/PerfilUsuario.js') }}"></script>
</body>
</html>
