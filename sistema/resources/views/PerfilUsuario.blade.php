<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario | Grand Horizon</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
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
                <a class="nav-link" href="#">
                   <i class="bi bi-buildings"></i>
                    <span class="nav-text">Hoteles</span>
                </a>

                <a class="nav-link" href="#">
                    <i class="bi bi-door-closed"></i>
                         <span class="nav-text">Habitaciones</span>
                      
                </a>
                <a class="nav-link" href="#">
                   <i class="bi bi-bell"></i>
                    <span class="nav-text">Servicios</span>
                </a>

                 <a class="nav-link" href="#">
                   <i class="bi bi-check"></i>
                    <span class="nav-text">Gestion de cuentas</span>
                </a>
              
            </nav>

            <div class="sidebar-footer">
                <div class="staff-card">
                    <div class="staff-dot">UR</div>
                    <div class="staff-copy">
                        <strong>Usuario Rintintin</strong>
                        <span>Sesión administrativa</span>
                    </div>
                </div>
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
