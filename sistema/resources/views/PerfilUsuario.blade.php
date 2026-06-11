<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario | Grand Horizon</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/PerfilUsuario.css">
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
                <a class="nav-link" href="#">
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
                <!-- <a class="nav-link active" href="#" aria-current="page">
                    <svg class="icon" viewBox="0 0 24 24" aria-hidden="true">
                        <circle cx="12" cy="12" r="3"></circle>
                        <path d="M19.4 15a1.7 1.7 0 0 0 .34 1.88l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06A1.7 1.7 0 0 0 15 19.4a1.7 1.7 0 0 0-1 .6 1.7 1.7 0 0 0-.4 1.1V21a2 2 0 1 1-4 0v-.09A1.7 1.7 0 0 0 8.6 19.4a1.7 1.7 0 0 0-1.88.34l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06A1.7 1.7 0 0 
                        4.6 15a1.7 1.7 0 0 0-.6-1 1.7 1.7 0 0 0-1.1-.4H3a2 2 0 1 1 0-4h.09A1.7 1.7 0 0 0 8.6 8.6a1.7 1.7 0 0 0 .34-1.88l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06A1.7 1.7 0 0 0 15 4.6a1.7 1.7 0 0 0 .6-1V3a2 2 0 1 1 4 0v.09A1.7 1.7 0 0 0 19.4 8.6z"></path>
                    </svg>
                    <span class="nav-text">Configuración</span>
                </a> -->
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

            <section class="destinos-lista">
                <h2>Lista de destinos</h2>

                @foreach($destinos as $destino)
                    <p>{{ $destino }}</p>
                @endforeach
            </section>
        </main>
    </div>

    <script>
        const body = document.body;
        const desktopToggle = document.querySelector('.brand-area .sidebar-toggle');
        const mobileToggle = document.querySelector('.mobile-menu');
        const backdrop = document.querySelector('.sidebar-backdrop');

        function isMobile(){
            return window.matchMedia('(max-width: 820px)').matches;
        }

        function setExpandedState(){
            const desktopExpanded = !body.classList.contains('sidebar-collapsed');
            const mobileExpanded = body.classList.contains('sidebar-open');
            desktopToggle.setAttribute('aria-expanded', String(isMobile() ? mobileExpanded : desktopExpanded));
            mobileToggle.setAttribute('aria-expanded', String(mobileExpanded));
        }

        function toggleSidebar(){
            if(isMobile()){
                body.classList.toggle('sidebar-open');
            }else{
                body.classList.toggle('sidebar-collapsed');
            }
            setExpandedState();
        }

        desktopToggle.addEventListener('click', toggleSidebar);
        mobileToggle.addEventListener('click', toggleSidebar);
        backdrop.addEventListener('click', () => {
            body.classList.remove('sidebar-open');
            setExpandedState();
        });

        window.addEventListener('resize', () => {
            if(!isMobile()){
                body.classList.remove('sidebar-open');
            }
            setExpandedState();
        });

        setExpandedState();
    </script>
</body>
</html>
