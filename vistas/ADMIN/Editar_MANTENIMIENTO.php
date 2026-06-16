<?php include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?>
<?php include('../../modelos/mantenimiento.php'); ?>

<link rel="stylesheet" href="/intecapp/wwwroot/css/Editar_MANTENIMIENTO.css">
<link rel="stylesheet" href="css/tema.css">

<body class="mantenimiento-body">
    <div class="mantenimiento-container">
        <h3 class="mantenimiento-titulo">Editar Encargado de Mantenimiento</h3>
        
        <form action="../../modelos/mantenimiento_edit.php" method="post" class="mantenimiento-form">
            <input type="hidden" id="id" name="id" value="<?php echo $row['id'];?>" required>

            <div style="text-align: center;">
                <p>
                    <label for="id_encargado">Nombre del Encargado</label><br>
                    <select id="id_encargado" name="id_encargado" required class="mantenimiento-select">
                        <option value="">Seleccione</option>
                        <?php include 'listas/instructores_comboboxEM.php';?>
                    </select>
                </p>

                <p>
                    <label for="id_taller">Taller</label><br>
                    <select id="id_taller" name="id_taller" required class="mantenimiento-select">
                        <option value="">Seleccione</option>
                        <?php include 'listas/talleres_comboboxEM.php';?>
                    </select>
                </p>

                <p>
                    <label for="f_reporte">Fecha de Reporte</label><br>
                    <input type="date" id="f_reporte" name="f_reporte" value="<?php echo $row['f_reporte'];?>" required class="mantenimiento-input">
                </p>

                <p>
                    <label for="f_realizado">Fecha de Finalización</label><br>
                    <input type="date" id="f_realizado" name="f_realizado" value="<?php echo $row['f_realizado'];?>" required class="mantenimiento-input">
                </p>

                <p>
                    <label for="descripcion">Descripción</label><br>
                    <input type="text" id="descripcion" name="descripcion" value="<?php echo $row['descripcion'];?>" required class="mantenimiento-input">
                </p>

                <p>
                    <label for="estado">Estado</label><br>
                    <select id="estado" name="estado" required class="mantenimiento-select">
                        <option value="">Seleccione</option>
                        <option value="Realizada" <?php if($row['estado']=="Realizada") echo "selected"; ?> >Realizada</option>
                        <option value="no realizado" <?php if($row['estado']=="no realizado") echo "selected"; ?> >No Realizado</option>
                    </select>
                </p>

                <div class="mantenimiento-botones">
                    <button type="submit" class="btn-accion btn-guardar" name="add" id="add">
                        <i class="fa fa-save"></i> Guardar
                    </button>
                    <button type="reset" class="btn-accion btn-limpiar" name="reset" id="reset">
                        <i class="fa fa-eraser"></i> Limpiar
                    </button>
                    <button type="button" class="btn-accion btn-salir" name="exit" id="exit" onclick="window.location.href='../ADMIN/MANTENIMIENTO.php'">
                        <i class="fa fa-sign-out"></i> <i class="fa fa-arrow-right"></i> Salir
                    </button>
                </div>
            </div>
        </form>
    </div>
    <br><br><br>

    <?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>