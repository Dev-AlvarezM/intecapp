// Sistema de Tema Claro/Oscuro

// Aplicar tema inmediatamente (antes de DOMContentLoaded)
(function() {
    const temaGuardado = localStorage.getItem('tema') || 'claro';
    document.documentElement.setAttribute('data-tema', temaGuardado);
})();

// Configurar event listeners cuando el DOM está listo
document.addEventListener('DOMContentLoaded', function() {
    // Cargar tema guardado nuevamente por si acaso
    const temaGuardado = localStorage.getItem('tema') || 'claro';
    aplicarTema(temaGuardado);
    
    // Event listener para el botón de tema
    const btnTema = document.getElementById('btn-cambiar-tema');
    if (btnTema) {
        btnTema.addEventListener('click', cambiarTema);
    }
});

// También aplicar cuando la ventana se carga completamente
window.addEventListener('load', function() {
    const temaGuardado = localStorage.getItem('tema') || 'claro';
    aplicarTema(temaGuardado);
});

function aplicarTema(tema) {
    const html = document.documentElement;
    const btnTema = document.getElementById('btn-cambiar-tema');
    
    if (tema === 'oscuro') {
        html.setAttribute('data-tema', 'oscuro');
        if (btnTema) {
            btnTema.innerHTML = '☀️ Claro';
            btnTema.title = 'Cambiar a modo claro';
        }
        localStorage.setItem('tema', 'oscuro');
    } else {
        html.setAttribute('data-tema', 'claro');
        if (btnTema) {
            btnTema.innerHTML = '🌙 Oscuro';
            btnTema.title = 'Cambiar a modo oscuro';
        }
        localStorage.setItem('tema', 'claro');
    }
}

function cambiarTema() {
    const temaActual = localStorage.getItem('tema') || 'claro';
    const nuevoTema = temaActual === 'claro' ? 'oscuro' : 'claro';
    aplicarTema(nuevoTema);
}
