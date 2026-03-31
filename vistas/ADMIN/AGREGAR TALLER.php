<?php include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?>
<link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']; ?>/intecapp/wwwroot/AGREGAR TALLER.css">


<!--Formulario agregar taller-->
<body>
    <div class="form-container">
        <h3>Agregar Nuevo Taller</h3>
        <form action="../../modelos/taller_add.php" method="post" style="text-align: left;">
            <center>
                <p class="form-group">
                    <label for="anio">Año</label><br>
                    <input type="text" id="anio" name="anio" required>
                </p>

                <p class="form-group">
                    <label for="nombre_taller">Nombre del Taller</label><br>
                    <input type="text" id="nombre_taller" name="nombre_taller" required>
                </p>

                <p class="form-group">
                    <label for="participantes">Participantes</label><br>
                    <input type="text" id="participantes" name="participantes" required>
                </p>

                <p class="form-group">
                    <label for="condicion">Condición</label><br>
                    <input type="text" id="condicion" name="condicion">
                </p>

                <p class="form-group">
                    <label for="hora_entrada">Hora de Entrada</label><br>
                    <input type="time" id="hora_entrada" name="hora_entrada" required>
                </p>

                <p class="form-group">
                    <label for="hora_salida">Hora de Salida</label><br>
                    <input type="time" id="hora_salida" name="hora_salida" required>
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
                        onclick="window.location.href='../ADMIN/TALLERES.php'">
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