<button class="menu-toggle-btn" id="menuToggleBtn">
    <i class="fas fa-bars"></i>
</button>

<div class="mobile-menu-overlay" id="menuOverlay"></div>
<div class="mobile-menu-left-overlay"></div>

<!-- Drawer de navegación para móviles -->
<nav class="nav-drawer" id="navDrawer">
    <ul class="side-menu-list">
        <li class="brown">
            <a href="../ADMIN/principal.php">
                <i class="fas fa-home"></i> 
                <span class="lbl">Inicio</span>
            </a>
        </li>

        <?php if ($user['cargo'] == "Admin" || $user['cargo'] == "Instructor"): ?>
        <li class="gold">
            <a href="../ADMIN/TALLERES.php">
                <i class="fas fa-tools"></i> 
                <span class="lbl">Talleres</span>
            </a>
        </li>
        <li class="blue">
            <a href="../ADMIN/EVENTOS.php">
                <i class="fas fa-calendar-alt"></i>
                <span class="lbl">Eventos</span>
            </a>
        </li>
        <?php endif; ?>

        <?php if ($user['cargo'] == "Admin"): ?>
        <li class="orange-red">
            <a href="../ADMIN/INSTRUCTORES.php">
                <i class="fas fa-chalkboard-teacher"></i> 
                <span class="lbl">Instructores</span>
            </a>
        </li>
        <?php endif; ?>

        <?php if ($user['cargo'] == "Admin" || $user['cargo'] == "Mantenimiento" || $user['cargo'] == "Instructor"): ?>
        <li class="blue-dirty">
            <a href="../ADMIN/MANTENIMIENTO.php">
                <i class="fas fa-wrench"></i> 
                <span class="lbl">Mantenimiento</span>
            </a>
        </li>
        <?php endif; ?>

        <li class="blue-dirty">
            <a href="../ADMIN/USUARIO.php">
                <i class="fas fa-users"></i> 
                <span class="lbl">Usuarios</span>
            </a>
        </li>
    </ul>
</nav>

<!-- Menú lateral para PC -->
<nav class="side-menu side-menu-compact">
    <ul class="side-menu-list">
        <li class="brown">
            <a href="../ADMIN/principal.php">
                <i class="fas fa-home"></i> 
                <span class="lbl">Inicio</span>
            </a>
        </li>

        <?php if ($user['cargo'] == "Admin" || $user['cargo'] == "Instructor"): ?>
        <li class="gold">
            <a href="../ADMIN/TALLERES.php">
                <i class="fas fa-tools"></i> 
                <span class="lbl">Talleres</span>
            </a>
        </li>
        <li class="blue">
            <a href="../ADMIN/EVENTOS.php">
                <i class="fas fa-calendar-alt"></i>
                <span class="lbl">Eventos</span>
            </a>
        </li>
        <?php endif; ?>

        <?php if ($user['cargo'] == "Admin"): ?>
        <li class="orange-red">
            <a href="../ADMIN/INSTRUCTORES.php">
                <i class="fas fa-chalkboard-teacher"></i> 
                <span class="lbl">Instructores</span>
            </a>
        </li>
        <?php endif; ?>

        <?php if ($user['cargo'] == "Admin" || $user['cargo'] == "Mantenimiento" || $user['cargo'] == "Instructor"): ?>
        <li class="blue-dirty">
            <a href="../ADMIN/MANTENIMIENTO.php">
                <i class="fas fa-wrench"></i> 
                <span class="lbl">Mantenimiento</span>
            </a>
        </li>
        <?php endif; ?>

        <li class="blue-dirty">
            <a href="../ADMIN/USUARIO.php">
                <i class="fas fa-users"></i> 
                <span class="lbl">Usuarios</span>
            </a>
        </li>
    </ul>
</nav>
<br><br>

<script src="menu.js"></script>
<link rel="stylesheet" href="../../wwwroot/css/menu.css">