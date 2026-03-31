<?php include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?>
<?php include('../../modelos/taller.php'); ?>

<link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']; ?>/intecapp/wwwroot/Editar_TALLER.css">


<!-- Formulario editar taller -->
<div class="form-container">
    <h3>Editar Taller</h3>
    <form action="../../modelos/taller_edit.php" method="post">

        <input type="hidden" id="id" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">

        <div class="form-group">
            <label for="anio">Año</label>
            <input type="text" id="anio" name="anio" value="<?php echo htmlspecialchars($row['anio']); ?>" required>
        </div>

        <div class="form-group">
            <label for="nombre_taller">Nombre del Taller</label>
            <input type="text" id="nombre_taller" name="nombre_taller" value="<?php echo htmlspecialchars($row['nombre_taller']); ?>" required>
        </div>

        <div class="form-group">
            <label for="participantes">Participantes</label>
            <input type="text" id="participantes" name="participantes" value="<?php echo htmlspecialchars($row['participantes']); ?>" required>
        </div>

        <div class="form-group">
            <label for="condicion">Condición</label>
            <input type="text" id="condicion" name="condicion" value="<?php echo htmlspecialchars($row['condicion']); ?>">
        </div>

        <div class="form-group">
            <label for="hora_entrada">Hora de Entrada</label>
            <input type="time" id="hora_entrada" name="hora_entrada" value="<?php echo htmlspecialchars($row['hora_entrada']); ?>" required>
        </div>

        <div class="form-group">
            <label for="hora_salida">Hora de Salida</label>
            <input type="time" id="hora_salida" name="hora_salida" value="<?php echo htmlspecialchars($row['hora_salida']); ?>" required>
        </div>

        <div class="form-group">
            <label for="estado">Estado</label>
            <select id="estado" name="estado" required>
                <option value="">Seleccione</option>
                <option value="Activo"   <?php if ($row['estado'] == "Activo")   echo "selected"; ?>>Activo</option>
                <option value="Inactivo" <?php if ($row['estado'] == "Inactivo") echo "selected"; ?>>Inactivo</option>
            </select>
        </div>

        <div class="form-group" style="margin-top: 20px;">
            <button type="submit" class="btn-guardar" name="add" id="add">
                <i class="fa fa-save"></i> Guardar
            </button>

            <button type="button" class="btn-salir" name="exit" id="exit"
                onclick="window.location.href='../ADMIN/TALLERES.php'">
                <i class="fa fa-sign-out"></i> <i class="fa fa-arrow-right"></i> Salir
            </button>
        </div>

    </form>

    <!-- Pie de página -->
    <?php include 'footer.php'; ?>
</div>

<!-- jQuery y Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>