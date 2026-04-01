<?php include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?>
<?php include('../../modelos/usuario.php'); ?>

<body style="background-color:#f0f0f0; color:#333; font-family:Arial,sans-serif; text-align:center;">
    <div style="width:50%; margin:0 auto; background-color:#fff; padding:20px; border-radius:10px; box-shadow:0 0 10px rgba(0,0,0,0.1);">
        <h3 style="color:#007bff;">Editar Usuario</h3>
        <form action="../../modelos/usuario_edit.php" method="post" enctype="multipart/form-data" style="text-align:left;">
            <input type="hidden" id="id"        name="id"        value="<?php echo $row['id']; ?>">
            <input type="hidden" id="instructor" name="instructor" value="<?php echo ($row['cargo'] === 'Instructor') ? '1' : '0'; ?>">

            <center>

                <!-- Foto actual y nueva -->
                <p>
                    <label style="color:#000;">Foto</label><br>
                    <div style="margin-bottom:8px;">
                        <?php if (!empty($row['foto']) && strpos($row['foto'], 'data:image/') === 0): ?>
                            <img id="foto-preview" src="<?php echo $row['foto']; ?>"
                                 style="width:80px; height:80px; border-radius:50%; object-fit:cover; border:2px solid #207ffc;">
                        <?php else: ?>
                            <i class="fa fa-user-circle" id="foto-placeholder"
                               style="font-size:80px; color:#ccc;"></i>
                            <img id="foto-preview" src="#" alt="Vista previa"
                                 style="display:none; width:80px; height:80px; border-radius:50%; object-fit:cover; border:2px solid #207ffc;">
                        <?php endif; ?>
                    </div>
                    <input type="file" id="foto" name="foto" accept="image/*"
                           onchange="previsualizarFoto(this)"
                           style="border:1px solid #207ffc; padding:4px;">
                    <br><small style="color:#888;">Deja vacío para mantener la foto actual</small>
                </p>

                <p>
                    <label style="color:#000;">Nombre</label><br>
                    <input type="text" id="nombre" name="nombre"
                        value="<?php echo htmlspecialchars($row['nombre']); ?>"
                        required style="border:1px solid #207ffc; padding:4px; width:30%;">
                </p>

                <p>
                    <label style="color:#000;">Teléfono</label><br>
                    <input type="text" id="telefono" name="telefono"
                        value="<?php echo htmlspecialchars($row['telefono'] ?? ''); ?>"
                        style="border:1px solid #207ffc; padding:4px; width:30%;">
                </p>

                <p>
                    <label style="color:#000;">Cargo</label><br>
                    <select id="cargo" name="cargo" required onchange="toggleArea(this.value)"
                        style="border:1px solid #207ffc; padding:4px; width:30%; margin:0 auto;">
                        <option value="">Seleccione</option>
                        <option value="Admin"         <?php if ($row['cargo'] == 'Admin')         echo 'selected'; ?>>Administrador</option>
                        <option value="Instructor"    <?php if ($row['cargo'] == 'Instructor')    echo 'selected'; ?>>Instructor</option>
                        <option value="Mantenimiento" <?php if ($row['cargo'] == 'Mantenimiento') echo 'selected'; ?>>Mantenimiento</option>
                    </select>
                </p>

                <!-- Área (solo Instructor) -->
                <div id="area-section" style="<?php echo ($row['cargo'] === 'Instructor') ? '' : 'display:none;'; ?>">
                    <p>
                        <label style="color:#000;">Área de Especialización</label><br>
                        <select id="area_especializacion" name="area_especializacion"
                            style="border:1px solid #207ffc; padding:4px; width:30%; margin:0 auto;">
                            <option value="">Seleccione un área</option>
                            <?php
                            $areas = ['Informática','Electricidad','Mecánica Automotriz','Carpintería',
                                      'Cocina','Corte y Confección','Soldadura','Plomería',
                                      'Refrigeración y A/C','Panadería y Repostería','Belleza y Estética',
                                      'Contabilidad','Administración','Idiomas','Otra'];
                            foreach ($areas as $a) {
                                $sel = ($row['area_especializacion'] === $a) ? 'selected' : '';
                                echo "<option value=\"$a\" $sel>$a</option>";
                            }
                            ?>
                        </select>
                    </p>
                </div>

                <p>
                    <label style="color:#000;">Usuario</label><br>
                    <input type="text" id="nom_usuario" name="nom_usuario"
                        value="<?php echo htmlspecialchars($row['nom_usuario']); ?>"
                        required style="border:1px solid #207ffc; padding:4px; width:30%;">
                </p>

                <p>
                    <label style="color:#000;">Estado</label><br>
                    <select id="estado" name="estado" required
                        style="border:1px solid #207ffc; padding:4px; width:30%; margin:0 auto;">
                        <option value="">Seleccione</option>
                        <option value="activo"   <?php if ($row['estado'] == 'activo')   echo 'selected'; ?>>Activo</option>
                        <option value="inactivo" <?php if ($row['estado'] == 'inactivo') echo 'selected'; ?>>Inactivo</option>
                    </select>
                </p>

                <button type="submit" style="display:inline-block; width:120px; padding:10px 0; background-color:#0368d3; color:white; font-size:13px; font-family:'Times New Roman',serif; border:none; border-radius:1px; cursor:pointer;">
                    <i class="fa fa-save"></i> Guardar
                </button>
                <button type="reset" style="display:inline-block; width:120px; padding:10px 0; background-color:#f44336; color:white; font-size:13px; font-family:'Times New Roman',serif; border:none; border-radius:1px; cursor:pointer;">
                    <i class="fa fa-eraser"></i> Limpiar
                </button>
                <button type="button" onclick="window.location.href='../ADMIN/USUARIO.php'"
                    style="display:inline-block; width:120px; padding:10px 0; background-color:#555; color:white; font-size:13px; font-family:'Times New Roman',serif; border:none; border-radius:1px; cursor:pointer;">
                    <i class="fa fa-sign-out"></i> Salir
                </button>
                <br><br><br>
            </center>
        </form>

        <?php include 'footer.php'; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        function previsualizarFoto(input) {
            var preview     = document.getElementById('foto-preview');
            var placeholder = document.getElementById('foto-placeholder');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.src           = e.target.result;
                    preview.style.display = 'block';
                    if (placeholder) placeholder.style.display = 'none';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function toggleArea(cargo) {
            var section = document.getElementById('area-section');
            var select  = document.getElementById('area_especializacion');
            var hidden  = document.getElementById('instructor');
            if (cargo === 'Instructor') {
                section.style.display = 'block';
                select.setAttribute('required', 'required');
                hidden.value = '1';
            } else {
                section.style.display = 'none';
                select.removeAttribute('required');
                select.value = '';
                hidden.value = '0';
            }
        }
    </script>
</body>
</html>