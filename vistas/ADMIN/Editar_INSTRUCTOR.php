<?php include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?>
<?php include('../../modelos/usuario.php'); ?>

<link rel="stylesheet" href="/intecapp/wwwroot/css/Editar_INSTRUCTOR.css">
<link rel="stylesheet" href="css/tema.css">

<body class="editar-usuario-body">
    <div class="usuario-container">
        <h3 class="usuario-titulo">Editar Usuario</h3>
        
        <form action="../../modelos/usuario_edit.php" method="post" class="usuario-form">
            <input type="hidden" id="id" name="id" value="<?php echo $row['id'];?>" required class="usuario-input">
            <input type="hidden" id="instructor" name="instructor" value="1" required class="usuario-input">

            <div style="text-align: center;">
                <p>
                    <label for="nombre">Nombre</label><br>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre'];?>" required class="usuario-input">
                </p>
                
                <p>
                    <label for="cargo">Cargo</label><br>
                    <select id="cargo" name="cargo" required class="usuario-select">
                        <option value="Instructor" <?php if($row['cargo']=="Instructor") {echo "selected"; }?> >Instructor</option>
                    </select>
                </p>

                <p>
                    <label for="nom_usuario">Usuario</label><br>
                    <input type="text" id="nom_usuario" name="nom_usuario" value="<?php echo $row['nom_usuario'];?>" required class="usuario-input">
                </p>

                <p>
                    <label for="estado">Estado</label><br>
                    <select id="estado" name="estado" required class="usuario-select">
                        <option value="">Seleccione</option>
                        <option value="activo" <?php if($row['estado']=="activo") {echo "selected"; }?> >Activo</option>
                        <option value="inactivo" <?php if($row['estado']=="inactivo") {echo "selected"; }?> >Inactivo</option>
                    </select>
                </p>

                <div class="botones-container">
                    <button type="submit" class="btn-accion btn-guardar" name="add" id="add">
                        <i class="fa fa-save"></i> Guardar
                    </button>

                    <button type="reset" class="btn-accion btn-limpiar" name="reset" id="reset">
                        <i class="fa fa-eraser"></i> Limpiar
                    </button>

                    <button type="button" class="btn-accion btn-salir" name="exit" id="exit" onclick="window.location.href='../ADMIN/INSTRUCTORES.php'">
                        <i class="fa fa-sign-out"></i> Salir
                    </button>
                </div>
            </div>
        </form>
        
        <?php include 'footer.php'; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>