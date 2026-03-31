<?php include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?>
<link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']; ?>/intecapp/wwwroot/AGREGAR EVENTO.css">


<!--Formulario agregar evento-->
<body>
    <div class="form-container">
        <h3>Agregar Nuevo Evento</h3>
        <form action="../../modelos/evento_add.php" method="post" style="text-align: left;">
            <center>
                <p class="form-group">
                    <label for="anio_evento">Año</label><br>
                    <input type="text" id="anio_evento" name="anio_evento" required>
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
                    <input type="date" id="f_inicio" name="f_inicio" required>
                </p>

                <p class="form-group">
                    <label for="f_fin">Fecha de Finalización</label><br>
                    <input type="date" id="f_fin" name="f_fin" required>
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

                <p class="form-group">
                    <label for="estado">Estado</label><br>
                    <select id="estado" name="estado" required>
                        <option value="">Seleccione</option>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
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
                <br><br>
            </center>
        </form>

        <!-- Pie de página -->
        <?php include 'footer.php'; ?>
    </div><!-- .form-container -->

    <!-- jQuery y Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!--Samayoa-->
</body>
</html>