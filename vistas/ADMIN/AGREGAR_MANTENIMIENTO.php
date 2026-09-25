<?php include 'header.php'; ?>

<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/intecapp/wwwroot/css/AGREGAR_MANTENIMIENTO.css">
<link rel="stylesheet" href="css/tema.css">

<!--Formulario agregar mantenimiento-->
<body>
    <div class="form-container">
        <h3>Nuevo Mantenimiento</h3>
        <form action="../../modelos/mantenimiento_add.php" method="post" style="text-align: left;">
            <center>
                <p class="form-group">
                    <label for="id_encargado">Nombre del Encargado</label><br>
                    <select id="id_encargado" name="id_encargado" required>
                        <option value="">Seleccione</option>
                        <?php include 'listas/mantenimiento_combobox.php'; ?>
                    </select>
                </p>

                <p class="form-group">
                    <label for="id_taller">Taller</label><br>
                    <select id="id_taller" name="id_taller" required>
                        <option value="">Seleccione</option>
                        <?php include 'listas/talleres_combobox_todos.php'; ?>
                    </select>
                </p>

                <p class="form-group">
                    <label for="modulo">Módulo</label><br>
                    <select id="modulo" name="modulo" required>
                        <option value="">Seleccione</option>
                        <?php include 'listas/modulos_combobox.php'; ?>
                        <option value="__otros__">Otros</option>
                    </select>
                </p>

                <!-- Solo se muestra si eligen "Otros" -->
                <p class="form-group" id="modulo-otro-group" style="display: none;">
                    <label for="modulo_otro">Escriba el módulo</label><br>
                    <input type="text" id="modulo_otro" name="modulo_otro" maxlength="100" placeholder="Ej. Módulo 5">
                </p>

                <p class="form-group">
                    <label for="f_reporte">Fecha de Reporte</label><br>
                    <input type="date" id="f_reporte" name="f_reporte" required
                           value="<?php echo date('Y-m-d'); ?>">
                </p>

                <p class="form-group">
                    <label for="descripcion">Descripción</label><br>
                    <input type="text" id="descripcion" name="descripcion" required>
                </p>

                <p class="form-group">
                    <label for="id_instructor">Quien reporta</label><br>
                    <select id="id_instructor" name="id_instructor" required>
                        <option value="">Seleccione</option>
                        <?php include 'listas/instructores_combobox.php'; ?>
                    </select>
                </p>

                <!--Botones de opciones-->
                <p>
                    <button type="submit" class="btn btn-guardar" name="add" id="add">
                        <i class="fa fa-save"></i> Guardar
                    </button>
                    <button type="reset" class="btn btn-limpiar" name="reset" id="reset">
                        <i class="fa fa-eraser"></i> Limpiar formulario
                    </button>
                    <button type="button" class="btn btn-salir" name="exit" id="exit"
                        onclick="window.location.href='../ADMIN/MANTENIMIENTO.php'">
                        <i class="fa fa-sign-out"></i> Volver
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var selectModulo = document.getElementById('modulo');
            var grupoOtro    = document.getElementById('modulo-otro-group');
            var inputOtro    = document.getElementById('modulo_otro');

            function actualizarModuloOtro() {
                var esOtros = selectModulo.value === '__otros__';
                grupoOtro.style.display = esOtros ? 'block' : 'none';
                inputOtro.required = esOtros;
                if (!esOtros) inputOtro.value = '';
            }

            selectModulo.addEventListener('change', actualizarModuloOtro);
            // "Limpiar formulario": el reset ocurre después del evento, así que se re-evalúa
            document.getElementById('reset').addEventListener('click', function () {
                setTimeout(actualizarModuloOtro, 0);
            });
            actualizarModuloOtro();
        });
    </script>

    <!--Samayoa-->
</body>
</html>