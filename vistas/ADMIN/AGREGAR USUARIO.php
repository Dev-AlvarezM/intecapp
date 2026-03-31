<?php include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?>
<link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']; ?>/intecapp/wwwroot/AGREGAR USUARIO.css">

<!--Formulario de agregar usuario-->
<body>
    <div class="form-container">
        <h3>Agregar Nuevo Usuario</h3>
        <form action="../../modelos/usuario_add.php" method="post" style="text-align: left;">
            <input type="hidden" id="instructor" name="instructor" value="0" required>

            <center>
                <p class="form-group">
                    <label for="nombre">Nombre</label><br>
                    <input type="text" id="nombre" name="nombre" required>
                </p>

                <p class="form-group">
                    <label for="nombre">Telefono</label><br>
                    <input type="text" id="nombre" name="nombre" required>
                </p>

                <p class="form-group">
                    <label for="direccion">Dirección</label><br>
                    <input type="text" id="direccion" name="direccion" required>
                </p>

                <p class="form-group">
                    <label for="cargo">Cargo</label><br>
                    <select id="cargo" name="cargo" required>
                        <option value="">Seleccione</option>
                        <option value="Admin">Administrador</option>
                        <option value="Instructor">Instructor</option>
                        <option value="Mantenimiento">Mantenimiento</option>
                    </select>
                </p>

                <p class="form-group">
                    <label for="nom_usuario">Usuario</label><br>
                    <input type="text" id="nom_usuario" name="nom_usuario" required>
                </p>

                <p class="form-group">
                    <label for="contraseña">Contraseña</label><br>
                    <input type="password" id="contraseña" name="contraseña" required>
                </p>

                <p class="form-group">
                    <label for="estado">Estado</label><br>
                    <select id="estado" name="estado" required>
                        <option value="">Seleccione</option>
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
                    </select>
                </p>

                <!--Botones de opciones-->
                <button type="submit" class="btn btn-guardar" name="add" id="add">
                    <i class="fa fa-save"></i> Guardar
                </button>
                <button type="reset" class="btn btn-limpiar" name="reset" id="reset">
                    <i class="fa fa-eraser"></i> Limpiar
                </button>
                <button type="button" class="btn btn-salir" name="exit" id="exit"
                    onclick="window.location.href='../ADMIN/USUARIO.php'">
                    <i class="fa fa-sign-out"></i> <i class="fa fa-arrow-right"></i> Salir
                </button>
                <br><br><br>
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