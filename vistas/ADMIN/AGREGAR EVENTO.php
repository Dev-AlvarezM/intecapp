<?php include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/intecapp/wwwroot/css/AGREGAR EVENTO.css">
<link rel="stylesheet" href="css/tema.css">

<!--Formulario agregar evento-->
<body>
    <div class="form-container">
        <h3>Agregar Nuevo Evento</h3>
        <form action="../../modelos/evento_add.php" method="post" style="text-align: left;">
            <center>
                <p class="form-group">
                    <label for="anio_evento">Año</label><br>
                    <input type="text" id="anio_evento" name="anio_evento" value="<?php echo date('Y'); ?>" readonly>
                </p>

                <p class="form-group">
                    <label for="id_talleres">Taller</label><br>
                    <select id="id_talleres" name="id_talleres" required>
                        <option value="">Seleccione</option>
                        <?php include 'listas/talleres_combobox.php'; ?>
                    </select>
                </p>

                <p class="form-group">
                    <label for="programa">Número del Programa</label><br>
                    <input type="text" id="programa" name="programa" required>
                </p>

                <p class="form-group">
                    <label for="nombre_evento">Nombre del Evento</label><br>
                    <input type="text" id="nombre_evento" name="nombre_evento" required>
                </p>

                <p class="form-group">
                    <label for="f_inicio">Fecha de Inicio</label><br>
                    <input type="date" id="f_inicio" name="f_inicio" value="<?php echo date('Y-m-d'); ?>" required>
                </p>

                <p class="form-group">
                    <label for="f_fin">Fecha de Finalización</label><br>
                    <input type="date" id="f_fin" name="f_fin" required>
                </p>

                <p class="form-group">
                    <label for="hora_entrada">Hora de Entrada</label><br>
                    <input type="time" id="hora_entrada" name="hora_entrada" step="60" required>
                </p>

                <p class="form-group">
                    <label for="hora_salida">Hora de Salida</label><br>
                    <input type="time" id="hora_salida" name="hora_salida" step="60" required>
                </p>

                <p class="form-group">
                    <label for="id_instructor">Instructor</label><br>
                    <select id="id_instructor" name="id_instructor" required>
                        <option value="">Seleccione</option>
                        <?php include 'listas/instructores_combobox.php'; ?>
                    </select>
                </p>

                <p class="form-group">
                    <label for="modalidad">Modalidad</label><br>
                    <select id="modalidad" name="modalidad" required>
                        <option value="">Seleccione</option>
                        <option value="Presencial">Presencial</option>
                        <option value="Virtual">Virtual</option>
                    </select>
                </p>

                <p class="form-group" id="detalle-modalidad">
                    <label id="detalle-label" for="detalle-input">Detalle</label><br>
                    <input type="text" id="detalle-input" name="detalle_modalidad">
                </p>

                <!--Botones de opciones-->
                <p>
                    <button type="submit" class="btn btn-guardar" name="add" id="add">
                        <i class="fa fa-save"></i> Guardar
                    </button>
                    <button type="reset" class="btn btn-limpiar" name="reset" id="reset">
                        <i class="fa fa-eraser"></i> Limpiar
                    </button>
                    <button type="button" class="btn btn-salir" name="exit" id="exit"
                        onclick="window.location.href='../ADMIN/EVENTOS.php'">
                        <i class="fa fa-sign-out"></i> <i class="fa fa-arrow-right"></i> Salir
                    </button>
                </p>
            </center>
        </form>
        
    </div><!-- .form-container -->
    <br><br><br>
    
    <!-- Pie de página -->
    <?php include 'footer.php'; ?>
    <!-- jQuery y Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fechaInicio = document.getElementById('f_inicio');
            const fechaFin = document.getElementById('f_fin');
            const modalidad = document.getElementById('modalidad');
            const detalleModalidad = document.getElementById('detalle-modalidad');
            const detalleLabel = document.getElementById('detalle-label');
            const detalleInput = document.getElementById('detalle-input');

            function actualizarDetalleModalidad() {
                const valor = modalidad.value;
                if (valor === 'Presencial') {
                    detalleLabel.textContent = 'Módulo';
                    detalleInput.placeholder = 'Escriba el módulo';
                    detalleInput.name = 'detalle_modalidad';
                    detalleModalidad.style.display = 'block';
                } else if (valor === 'Virtual') {
                    detalleLabel.textContent = 'URL';
                    detalleInput.placeholder = 'Escriba la URL';
                    detalleInput.name = 'detalle_modalidad';
                    detalleModalidad.style.display = 'block';
                } else {
                    detalleModalidad.style.display = 'none';
                    detalleInput.name = '';
                }
            }

            if (modalidad) {
                modalidad.addEventListener('change', actualizarDetalleModalidad);
                actualizarDetalleModalidad();
            }

            if (fechaInicio && fechaFin) {
                const hoy = new Date().toISOString().split('T')[0];

                if (!fechaFin.value) {
                    fechaFin.value = fechaInicio.value || hoy;
                }

                fechaInicio.addEventListener('change', function() {
                    if (!fechaFin.value || fechaFin.value < this.value) {
                        fechaFin.value = this.value;
                    }
                });
            }
        });
    </script>
</body>
</html>