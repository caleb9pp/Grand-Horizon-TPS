<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario | Grand Horizon</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/PerfilUsuario.css') }}">

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
                    <p class="brand-subtitle">Hotel Admin</p>
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
                    <svg class="icon" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="m3 11 9-8 9 8"></path>
                        <path d="M5 10v10h14V10"></path>
                        <path d="M9 20v-6h6v6"></path>
                    </svg>
                    <span class="nav-text">Inicio</span>
                </a>
                <a class="nav-link" href="#">
                    <svg class="icon" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M5 21V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16"></path>
                        <path d="M3 21h18"></path>
                        <path d="M9 8h1"></path>
                        <path d="M14 8h1"></path>
                        <path d="M9 13h1"></path>
                        <path d="M14 13h1"></path>
                    </svg>
                    <span class="nav-text">Recepción</span>
                </a>
                <a class="nav-link" href="#">
                    <svg class="icon" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M7 3v3"></path>
                        <path d="M17 3v3"></path>
                        <path d="M4 8h16"></path>
                        <rect x="4" y="5" width="16" height="16" rx="2"></rect>
                        <path d="M8 12h3"></path>
                        <path d="M13 16h3"></path>
                    </svg>
                    <span class="nav-text">Reservas</span>
                </a>
                <a class="nav-link" href="#">
                    <svg class="icon" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M20 7h-9"></path>
                        <path d="M14 17H4"></path>
                        <circle cx="7" cy="7" r="3"></circle>
                        <circle cx="17" cy="17" r="3"></circle>
                    </svg>
                    <span class="nav-text">Habitaciones</span>
                </a>
                <a class="nav-link active" href="#" aria-current="page">
                    <svg class="icon" viewBox="0 0 24 24" aria-hidden="true">
                        <circle cx="12" cy="12" r="3"></circle>
                        <path d="M19.4 15a1.7 1.7 0 0 0 .34 1.88l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06A1.7 1.7 0 0 0 15 19.4a1.7 1.7 0 0 0-1 .6 1.7 1.7 0 0 0-.4 1.1V21a2 2 0 1 1-4 0v-.09A1.7 1.7 0 0 0 8.6 19.4a1.7 1.7 0 0 0-1.88.34l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06A1.7 1.7 0 0 0 4.6 15a1.7 1.7 0 0 0-.6-1 1.7 1.7 0 0 0-1.1-.4H3a2 2 0 1 1 0-4h.09A1.7 1.7 0 0 0 4.6 8.6a1.7 1.7 0 0 0-.34-1.88l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06A1.7 1.7 0 0 0 9 4.6a1.7 1.7 0 0 0 1-.6 1.7 1.7 0 0 0 .4-1.1V3a2 2 0 1 1 4 0v.09A1.7 1.7 0 0 0 15.4 4.6a1.7 1.7 0 0 0 1.88-.34l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06A1.7 1.7 0 0 0 19.4 9c.23.38.6.67 1 .82.2.07.42.1.6.1H21a2 2 0 1 1 0 4h-.09A1.7 1.7 0 0 0 19.4 15Z"></path>
                    </svg>
                    <span class="nav-text">Configuración</span>
                </a>
            </nav>

            <div class="sidebar-footer">
                <div class="staff-card">
                    <div class="staff-dot">AG</div>
                    <div class="staff-copy">
                        <strong>Ana García</strong>
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

            <header class="profile-header">
                <div>
                    <p class="eyebrow">Perfil de usuario</p>
                    <h1>Administración de cuenta</h1>
                    <p>Información personal, permisos del sistema y ajustes de seguridad para el equipo operativo de Grand Horizon.</p>
                </div>
                <div class="header-actions">
                    <button class="btn-gh secondary" type="button">
                        <svg class="icon" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M12 20h9"></path>
                            <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4Z"></path>
                        </svg>
                        Editar
                    </button>
                    <button class="btn-gh" type="button">
                        <svg class="icon" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2Z"></path>
                            <path d="M17 21v-8H7v8"></path>
                            <path d="M7 3v5h8"></path>
                        </svg>
                        Guardar
                    </button>
                </div>
            </header>

            <section class="profile-grid" aria-label="Contenido del perfil">
                <aside class="panel identity-panel">
                    <div class="avatar-wrap">
                        <div class="avatar" aria-label="Avatar de Ana García">AG</div>
                    </div>
                    <div>
                        <h2>Ana García</h2>
                        <p class="role">Gerente de recepción</p>
                    </div>
                    <div class="status-list">
                        <div class="status-item">
                            <span>Estado</span>
                            <span class="badge-soft">Activo</span>
                        </div>
                        <div class="status-item">
                            <span>ID de empleado</span>
                            <strong>GH-2048</strong>
                        </div>
                        <div class="status-item">
                            <span>Último acceso</span>
                            <strong>09 Jun 2026</strong>
                        </div>
                    </div>
                </aside>

                <div class="details-stack">
                    <section class="panel section-panel" aria-labelledby="personal-info-title">
                        <div class="section-title">
                            <h2 id="personal-info-title">Información personal</h2>
                            <span>Datos visibles para operaciones internas</span>
                        </div>
                        <form class="form-grid">
                            <div class="field">
                                <label for="first-name">Nombre</label>
                                <input id="first-name" type="text" value="Ana">
                            </div>
                            <div class="field">
                                <label for="last-name">Apellido</label>
                                <input id="last-name" type="text" value="García">
                            </div>
                            <div class="field">
                                <label for="email">Correo institucional</label>
                                <input id="email" type="email" value="ana.garcia@grandhorizon.com">
                            </div>
                            <div class="field">
                                <label for="phone">Teléfono</label>
                                <input id="phone" type="tel" value="+52 55 1234 5678">
                            </div>
                            <div class="field">
                                <label for="location">Sede</label>
                                <select id="location">
                                    <option selected>Grand Horizon Cancún</option>
                                    <option>Grand Horizon Los Cabos</option>
                                    <option>Grand Horizon Riviera Maya</option>
                                </select>
                            </div>
                            <div class="field">
                                <label for="department">Departamento</label>
                                <select id="department">
                                    <option selected>Recepción</option>
                                    <option>Reservas</option>
                                    <option>Hospitalidad</option>
                                </select>
                            </div>
                        </form>
                    </section>

                    <section class="panel section-panel" aria-labelledby="roles-title">
                        <div class="section-title">
                            <h2 id="roles-title">Roles de sistema</h2>
                            <span>Permisos asignados</span>
                        </div>
                        <div class="role-grid">
                            <article class="role-card">
                                <div>
                                    <h3>Recepción</h3>
                                    <p>Check-in, check-out, asignación de habitaciones y solicitudes de huéspedes.</p>
                                </div>
                                <span class="badge-soft">Principal</span>
                            </article>
                            <article class="role-card">
                                <div>
                                    <h3>Reservas</h3>
                                    <p>Consulta de disponibilidad, modificación de estancias y tarifas activas.</p>
                                </div>
                                <span class="badge-soft">Activo</span>
                            </article>
                        </div>
                    </section>

                    <section class="panel section-panel" aria-labelledby="settings-title">
                        <div class="section-title">
                            <h2 id="settings-title">Ajustes de cuenta</h2>
                            <span>Preferencias y seguridad</span>
                        </div>
                        <div class="settings-grid">
                            <article class="setting-card">
                                <div>
                                    <h3>Notificaciones operativas</h3>
                                    <p>Alertas de reservas, cambios de habitación y solicitudes prioritarias.</p>
                                </div>
                                <label class="toggle" aria-label="Activar notificaciones operativas">
                                    <input type="checkbox" checked>
                                    <span></span>
                                </label>
                            </article>
                            <article class="setting-card">
                                <div>
                                    <h3>Verificación en dos pasos</h3>
                                    <p>Protección adicional para accesos administrativos.</p>
                                </div>
                                <label class="toggle" aria-label="Activar verificación en dos pasos">
                                    <input type="checkbox" checked>
                                    <span></span>
                                </label>
                            </article>
                        </div>
                    </section>
                </div>
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
