<div class="mobile-menu-overlay" id="menuOverlay"></div>
<div class="mobile-menu-left-overlay"></div>

<!-- Drawer de navegación para móviles -->
<nav class="nav-drawer" id="navDrawer" aria-hidden="true">
    <ul class="side-menu-list">
        <li class="menu-logo">
            <a href="../ADMIN/principal.php" aria-label="Ir al inicio">
                <img src="img/intecap.png" alt="INTECAP">
            </a>
        </li>
        <li class="brown">
            <a class="menu-link" href="../ADMIN/principal.php">
                <i class="fas fa-home"></i> 
                <span class="lbl">Inicio</span>
            </a>
        </li>

        <?php if ($user['cargo'] == "Admin" || $user['cargo'] == "Instructor"): ?>
        <li class="gold">
            <a class="menu-link" href="../ADMIN/TALLERES.php">
                <i class="fas fa-tools"></i> 
                <span class="lbl">Talleres</span>
            </a>
        </li>
        <li class="blue">
            <a class="menu-link" href="../ADMIN/EVENTOS.php">
                <i class="fas fa-calendar-alt"></i>
                <span class="lbl">Eventos</span>
            </a>
        </li>
        <?php endif; ?>

        <?php if ($user['cargo'] == "Admin"): ?>
        <li class="orange-red">
            <a class="menu-link" href="../ADMIN/INSTRUCTORES.php">
                <i class="fas fa-chalkboard-teacher"></i> 
                <span class="lbl">Instructores</span>
            </a>
        </li>
        <?php endif; ?>

        <?php if ($user['cargo'] == "Admin" || $user['cargo'] == "Mantenimiento" || $user['cargo'] == "Instructor"): ?>
        <li class="blue-dirty">
            <a class="menu-link" href="../ADMIN/MANTENIMIENTO.php">
                <i class="fas fa-wrench"></i> 
                <span class="lbl">Mantenimiento</span>
            </a>
        </li>
        <?php endif; ?>

        <?php if ($user['cargo'] == "Admin"): ?>
        <li class="blue-dirty">
            <a class="menu-link" href="../ADMIN/USUARIO.php">
                <i class="fas fa-users"></i> 
                <span class="lbl">Usuarios</span>
            </a>
        </li>
        <?php endif; ?>

        <?php if ($user['cargo'] == "Admin" || $user['cargo'] == "Instructor"): ?>
        <li class="blue-dirty">
            <a class="menu-link" href="../ADMIN/ASISTENCIA.php">
                <i class="fas fa-check-circle"></i> 
                <span class="lbl">Asistencia</span>
            </a>
        </li>
        <?php endif; ?>

        <li class="blue-dirty">
            <a class="menu-link" href="../ADMIN/MI_USUARIO.php">
                <i class="fas fa-user"></i> 
                <span class="lbl">Mi Usuario</span>
            </a>
        </li>
        <li class="menu-logout">
            <a class="menu-link" href="../../controladores/logout.php">
                <i class="fas fa-sign-out-alt"></i>
                <span class="lbl">Cerrar sesión</span>
            </a>
        </li>
    </ul>
</nav>

<!-- Menú lateral para PC -->
<nav class="side-menu side-menu-compact">
    <ul class="side-menu-list">
        <li class="menu-logo">
            <a href="../ADMIN/principal.php" aria-label="Ir al inicio">
                <img src="img/intecap.png" alt="INTECAP">
            </a>
        </li>
        <li class="brown">
            <a class="menu-link" href="../ADMIN/principal.php">
                <i class="fas fa-home"></i> 
                <span class="lbl">Inicio</span>
            </a>
        </li>

        <?php if ($user['cargo'] == "Admin" || $user['cargo'] == "Instructor"): ?>
        <li class="gold">
            <a class="menu-link" href="../ADMIN/TALLERES.php">
                <i class="fas fa-tools"></i> 
                <span class="lbl">Talleres</span>
            </a>
        </li>
        <li class="blue">
            <a class="menu-link" href="../ADMIN/EVENTOS.php">
                <i class="fas fa-calendar-alt"></i>
                <span class="lbl">Eventos</span>
            </a>
        </li>
        <?php endif; ?>

        <?php if ($user['cargo'] == "Admin"): ?>
        <li class="orange-red">
            <a class="menu-link" href="../ADMIN/INSTRUCTORES.php">
                <i class="fas fa-chalkboard-teacher"></i> 
                <span class="lbl">Instructores</span>
            </a>
        </li>
        <?php endif; ?>

        <?php if ($user['cargo'] == "Admin" || $user['cargo'] == "Mantenimiento" || $user['cargo'] == "Instructor"): ?>
        <li class="blue-dirty">
            <a class="menu-link" href="../ADMIN/MANTENIMIENTO.php">
                <i class="fas fa-wrench"></i> 
                <span class="lbl">Mantenimiento</span>
            </a>
        </li>
        <?php endif; ?>

        <?php if ($user['cargo'] == "Admin"): ?>
        <li class="blue-dirty">
            <a class="menu-link" href="../ADMIN/USUARIO.php">
                <i class="fas fa-users"></i> 
                <span class="lbl">Usuarios</span>
            </a>
        </li>
        <?php endif; ?>

        <?php if ($user['cargo'] == "Admin" || $user['cargo'] == "Instructor"): ?>
        <li class="blue-dirty">
            <a class="menu-link" href="../ADMIN/ASISTENCIA.php">
                <i class="fas fa-check-circle"></i> 
                <span class="lbl">Asistencia</span>
            </a>
        </li>
        <?php endif; ?>

        <li class="blue-dirty">
            <a class="menu-link" href="../ADMIN/MI_USUARIO.php">
                <i class="fas fa-user"></i> 
                <span class="lbl">Mi Usuario</span>
            </a>
        </li>
        <li class="menu-logout">
            <a class="menu-link" href="../../controladores/logout.php">
                <i class="fas fa-sign-out-alt"></i>
                <span class="lbl">Cerrar sesión</span>
            </a>
        </li>
    </ul>
</nav>

<script src="menu.js"></script>
<link rel="stylesheet" href="../../wwwroot/css/menu.css">