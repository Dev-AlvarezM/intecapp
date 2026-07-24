<?php include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/intecapp/wwwroot/css/AGREGAR TALLER.css">
<link rel="stylesheet" href="css/tema.css">

<!--Formulario agregar taller-->
<body>
    <div class="form-container">
        <h3>Agregar Nuevo Taller</h3>
        <form action="../../modelos/taller_add.php" method="post" style="text-align: left;">
            <center>
                <p class="form-group">
                    <label for="anio">Año</label><br>
                    <input type="text" id="anio" name="anio" value="<?php echo date('Y'); ?>" readonly>
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
                </p><br>

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
            </center>
        </form>

        <!-- Pie de página -->
        <?php include 'footer.php'; ?>
        <br><br>
    </div><!-- .form-container -->

    <!-- jQuery y Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!--Samayoa-->
</body>
</html>