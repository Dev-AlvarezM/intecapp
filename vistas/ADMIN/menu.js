// Esperar a que el DOM esté completamente cargado
document.addEventListener('DOMContentLoaded', () => {
    const menuToggleBtn = document.getElementById('menuToggleBtn');
    const navDrawer = document.getElementById('navDrawer');
    const menuOverlay = document.getElementById('menuOverlay');

    // Función auxiliar para alternar los estados del menú
    const toggleMenu = () => {
        navDrawer.classList.toggle('open');
        menuOverlay.classList.toggle('active');
    };

    // Función auxiliar para cerrar explícitamente el menú
    const closeMenu = () => {
        navDrawer.classList.remove('open');
        menuOverlay.classList.remove('active');
    };

    // Abrir/Cerrar al presionar el botón de hamburguesa
    if (menuToggleBtn) {
        menuToggleBtn.addEventListener('click', toggleMenu);
    }

    // Cerrar menú al hacer clic en el fondo oscuro (overlay)
    if (menuOverlay) {
        menuOverlay.addEventListener('click', closeMenu);
    }

    // Cerrar menú automáticamente cuando se hace clic en cualquier enlace interno
    const drawerLinks = document.querySelectorAll('.nav-drawer a');
    drawerLinks.forEach(link => {
        link.addEventListener('click', closeMenu);
    });
});