// vistas/ADMIN/sw.js
self.addEventListener('install', function(e) { self.skipWaiting(); });
self.addEventListener('activate', function(e) { e.waitUntil(self.clients.claim()); });

self.addEventListener('message', function(e) {
    if (e.data && e.data.tipo === 'nueva_notificacion') {
        self.registration.showNotification('🔧 Nuevo Mantenimiento', {
            body: e.data.mensaje || 'Tienes un nuevo mantenimiento asignado',
            icon: 'img/intecap.png',
            tag: 'mant-' + Date.now(),
            renotify: true,
            silent: false
        });
    }
});

self.addEventListener('notificationclick', function(e) {
    e.notification.close();
    e.waitUntil(
        self.clients.matchAll({ type: 'window', includeUncontrolled: true })
            .then(function(clients) {
                for (var i = 0; i < clients.length; i++) {
                    if (clients[i].url.indexOf('MANTENIMIENTO') !== -1) {
                        return clients[i].focus();
                    }
                }
                return self.clients.openWindow('MANTENIMIENTO.php');
            })
    );
});