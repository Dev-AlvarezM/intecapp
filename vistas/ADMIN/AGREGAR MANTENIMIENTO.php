<?php include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?>
<link rel="stylesheet" href="/intecapp/wwwroot/css/AGREGAR_MANTENIMIENTO.css">

<!--Formulario agregar mantenimiento-->
<body>
    <div class="form-container">
        <h3>Agregar Nuevo Encargado de Mantenimiento</h3>
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
                        <?php include 'listas/talleres_combobox.php'; ?>
                    </select>
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

                <!--Botones de opciones-->
                <p>
                    <button type="submit" class="btn btn-guardar" name="add" id="add">
                        <i class="fa fa-save"></i> Guardar
                    </button>
                    <button type="reset" class="btn btn-limpiar" name="reset" id="reset">
                        <i class="fa fa-eraser"></i> Limpiar
                    </button>
                    <button type="button" class="btn btn-salir" name="exit" id="exit"
                        onclick="window.location.href='../ADMIN/MANTENIMIENTO.php'">
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