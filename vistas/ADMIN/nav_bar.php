<body class="with-side-menu-compact">

    <div class="main-container">
        <header class="site-header">
            <div class="container-fluid">
                <a href="#" class="site-logo">
                    <img class="hidden-md-down" src="img/intecap.png" alt="Logo">
                </a>
            </div>

            <?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>

            <div id="notif-activar-wrap"
                 style="position:absolute; right:70px; top:50%; transform:translateY(-50%); display:none;">
                <button id="btn-activar"
                        onclick="pedirPermiso()"
                        style="background:#e53935; border:none; cursor:pointer; border-radius:6px;
                               padding:6px 12px; color:#fff; font-family:Arial,sans-serif;
                               font-size:12px; font-weight:bold; animation:parpadeo 1s infinite;">
                    🔔 Activar notificaciones
                </button>
            </div>
            <style>
                @keyframes parpadeo { 0%,100%{opacity:1} 50%{opacity:0.4} }
            </style>

            <script>
            var swReg       = null;
            var ultimoTotal = 0;
            var audioCtx    = null;
            var audioBuffer = null;

            // ── Desbloquear AudioContext en el primer click ──────────────────
            document.addEventListener('click', function() {
                if (audioCtx) return;
                try {
                    audioCtx = new (window.AudioContext || window.webkitAudioContext)();
                    fetch('img/notificacion.mp3')
                        .then(function(r) { return r.arrayBuffer(); })
                        .then(function(buf) { return audioCtx.decodeAudioData(buf); })
                        .then(function(decoded) {
                            audioBuffer = decoded;
                            console.log('Audio listo en memoria');
                        }).catch(function(){});
                } catch(e) {}
            }, true);

            function reproducirAudio() {
                if (!audioCtx || !audioBuffer) return;
                audioCtx.resume().then(function() {
                    var src = audioCtx.createBufferSource();
                    src.buffer = audioBuffer;
                    src.connect(audioCtx.destination);
                    src.start(0);
                });
            }

            // ── Service Worker ───────────────────────────────────────────────
            if ('serviceWorker' in navigator) {
                navigator.serviceWorker.register('sw.js')
                    .then(function(reg) { swReg = reg; verificarPermiso(); })
                    .catch(function(e) { console.warn('SW error:', e); });
            } else {
                verificarPermiso();
            }

            function verificarPermiso() {
                if (Notification.permission === 'granted') {
                    arrancar();
                } else if (Notification.permission !== 'denied') {
                    document.getElementById('notif-activar-wrap').style.display = 'block';
                }
            }

            function pedirPermiso() {
                Notification.requestPermission().then(function(p) {
                    if (p === 'granted') {
                        document.getElementById('notif-activar-wrap').style.display = 'none';
                        arrancar();
                    }
                });
            }

            function arrancar() {
                verificarNotificaciones();
                setInterval(verificarNotificaciones, 3000);
                refrescarTabla();
                setInterval(refrescarTabla, 3000);
            }

            // ── Verificar → sonar → marcar leídas automáticamente ───────────
            function verificarNotificaciones() {
                fetch('../../controladores/check_notificaciones.php', { cache: 'no-store' })
                    .then(function(r) { return r.json(); })
                    .then(function(data) {
                        var total = parseInt(data.total) || 0;

                        if (total > 0) {
                            reproducirAudio();

                            var msg = (data.notificaciones && data.notificaciones[0])
                                ? data.notificaciones[0].mensaje
                                : 'Nueva notificación';

                            var sw = swReg && (swReg.active || swReg.waiting || swReg.installing);
                            if (sw) {
                                sw.postMessage({ tipo: 'nueva_notificacion', mensaje: msg });
                            } else if (Notification.permission === 'granted') {
                                new Notification('🔧 Nuevo Mantenimiento', {
                                    body: msg, icon: 'img/intecap.png'
                                });
                            }

                            fetch('../../controladores/marcar_leidas.php', { cache: 'no-store' })
                                .catch(function(){});

                            ultimoTotal = 0;
                        }
                    })
                    .catch(function(){});
            }

            // ── Refrescar tabla ──────────────────────────────────────────────
            function refrescarTabla() {
                var params = new URLSearchParams(window.location.search);
                var estado = params.get('estado') || 'General';
                var tbody  = document.querySelector('#table-edit tbody');
                if (!tbody) return;

                fetch('../../controladores/get_mantenimientos.php?estado=' + encodeURIComponent(estado), { cache: 'no-store' })
                    .then(function(r) { return r.json(); })
                    .then(function(data) {
                        if (!data.filas || data.filas.length === 0) return;
                        var html = '';
                        data.filas.forEach(function(f) {
                            html += '<tr>' +
                                '<td>' + f.anio        + '</td>' +
                                '<td>' + f.nombre      + '</td>' +
                                '<td>' + f.taller      + '</td>' +
                                '<td>' + f.f_reporte   + '</td>' +
                                '<td>' + f.f_realizado + '</td>' +
                                '<td>' + f.descripcion + '</td>' +
                                '<td>' + f.estado      + '</td>' +
                                '<td>' + f.acciones    + '</td>' +
                            '</tr>';
                        });
                        tbody.innerHTML = html;
                    })
                    .catch(function(){});
            }
            </script>

            <div class="dropdown user-menu">
                <button class="dropdown-toggle" id="dd-user-menu" type="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="img/perfil.png" alt="Perfil" class="user-avatar">
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                    <a class="dropdown-item" href="../../controladores/logout.php">
                        <span class="font-icon fa fa-sign-out-alt"></span> Cerrar sesión
                    </a>
                </div>
            </div>
        </header>