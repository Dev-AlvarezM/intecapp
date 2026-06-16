<?php include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?>
<?php include('../../modelos/usuario.php'); ?>
<link rel="stylesheet" href="/intecapp/wwwroot/css/Editar_USUARIO_pass.css">
<link rel="stylesheet" href="css/tema.css">

<body>
    <div class="form-container">
        <h3 class="titulo-formulario">Editar Contraseña de Usuario</h3>
        
        <form action="../../modelos/usuario_edit_pass.php" method="post">
            <input type="hidden" id="id" name="id" value="<?php echo $row['id'];?>" required class="form-input">
            <input type="hidden" id="instructor" name="instructor" value="0" required class="form-input">

            <p>
                <label for="nombre" class="label-input">Contraseña Nueva</label><br>
                <input type="password" id="contraseña" name="contraseña" onkeyup="comparar();" required class="form-input">
            </p>
            
            <p>
                <label for="email" class="label-input">Repetir contraseña</label><br>
                <input type="password" id="contraseña1" name="contraseña1" onkeyup="comparar();" required class="form-input">
            </p>

            <div id="error" class="alert alert-danger ocultar" role="alert">
                Las Contraseñas no coinciden!
            </div>

            <div class="acciones">
                <button type="submit" class="btn-form btn-guardar" name="add" id="add">
                    <i class="fa fa-save"></i> Guardar
                </button>
                <button type="reset" class="btn-form btn-limpiar" name="reset" id="reset">
                    <i class="fa fa-eraser"></i> Limpiar
                </button>
                <button type="button" class="btn-form btn-salir" name="exit" id="exit" onclick="window.location.href='../ADMIN/USUARIO.php'">
                    <i class="fa fa-sign-out"></i> Salir
                </button>
            </div>
        </form>
        
        <?php include 'footer.php'; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php include '../../controladores/usuario.php'; ?>