<?php include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?>
<?php include('../../modelos/taller.php'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/intecapp/wwwroot/css/Editar_TALLER.css">
<link rel="stylesheet" href="css/tema.css">

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
            <label for="id_instructor">Instructor a Cargo</label>
            <select name="id_instructor" id="id_instructor" required>
                <option value="">Seleccione</option>
                <?php
                $selectedInstructorId = isset($row['id_instructor']) ? (int) $row['id_instructor'] : 0;
                $instructoresSql = $user['cargo'] === 'Instructor'
                    ? "SELECT id, nombre FROM usuario WHERE id = " . (int) $user['id']
                    : "SELECT id, nombre FROM usuario WHERE cargo IN ('Instructor', 'Admin') ORDER BY nombre";
                $instructoresQuery = $conn->query($instructoresSql);
                while ($instructor = $instructoresQuery->fetch_assoc()) {
                    $selected = $selectedInstructorId === (int) $instructor['id'] ? 'selected' : '';
                    echo '<option value="' . (int) $instructor['id'] . '" ' . $selected . '>' . htmlspecialchars($instructor['nombre']) . '</option>';
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="participantes">Participantes</label>
            <input type="text" id="participantes" name="participantes" value="<?php echo htmlspecialchars($row['participantes']); ?>" required>
        </div>

        <div class="form-group">
            <label for="condicion">Condición</label>
            <input type="text" id="condicion" name="condicion" value="<?php echo htmlspecialchars($row['condicion']); ?>">
        </div>

        <div class="form-group" style="margin-top: 20px;">
            <button type="submit" class="btn-guardar" name="add" id="add">
                <i class="fa fa-save"></i> Guardar
            </button>

            <button type="button" class="btn-salir" name="exit" id="exit"
                onclick="window.location.href='../ADMIN/TALLERES.php'">
                <i class="fa fa-sign-out"></i> Volver
            </button>
        </div>

    </form>

    <!-- Pie de página -->
    <?php include 'footer.php'; ?>
</div>

<!-- jQuery y Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>