// Esperar a que el DOM esté completamente cargado
document.addEventListener('DOMContentLoaded', () => {
    const menuToggleBtn = document.getElementById('menuToggleBtn');
    const navDrawer = document.getElementById('navDrawer');
    const menuOverlay = document.getElementById('menuOverlay');
    if (!menuToggleBtn || !navDrawer || !menuOverlay) {
        return;
    }

    const setMenuState = (isOpen) => {
        navDrawer.classList.toggle('open', isOpen);
        menuOverlay.classList.toggle('active', isOpen);
        document.body.classList.toggle('menu-open', isOpen);
        menuToggleBtn.setAttribute('aria-expanded', String(isOpen));
        menuToggleBtn.setAttribute('aria-label', isOpen ? 'Cerrar menú' : 'Abrir menú');
        navDrawer.setAttribute('aria-hidden', String(!isOpen));
    };

    const toggleMenu = () => setMenuState(!navDrawer.classList.contains('open'));
    const closeMenu = () => setMenuState(false);

    // Abrir/Cerrar al presionar el botón de hamburguesa
    if (menuToggleBtn) {
        menuToggleBtn.addEventListener('click', toggleMenu);
    }

    // Cerrar menú al hacer clic en el fondo oscuro (overlay)
    if (menuOverlay) {
        menuOverlay.addEventListener('click', closeMenu);
    }

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeMenu();
        }
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth > 768) {
            closeMenu();
        }
    });

    // Cerrar menú automáticamente cuando se hace clic en cualquier enlace interno
    const drawerLinks = document.querySelectorAll('.nav-drawer a');
    drawerLinks.forEach(link => {
        link.addEventListener('click', closeMenu);
    });
});