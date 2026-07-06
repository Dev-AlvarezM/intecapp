<?php include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?>
<?php include('../../modelos/usuario.php'); ?>

<link rel="stylesheet" href="/intecapp/wwwroot/css/Editar_USUARIO.css">
<link rel="stylesheet" href="/intecapp/wwwroot/css/tema.css">
<link rel="stylesheet" href="/intecapp/wwwroot/css/Editar_USUARIO.css">

<body>
    <div class="form-container">
        <h3>Editar Usuario</h3>

        <form action="../../modelos/usuario_edit.php" method="post" enctype="multipart/form-data">
            <!-- Campos ocultos -->
            <input type="hidden" id="id"         name="id"         value="<?php echo $row['id']; ?>">
            <input type="hidden" id="instructor"  name="instructor"  value="<?php echo ($row['cargo'] === 'Instructor') ? '1' : '0'; ?>">

            <center>

                <!-- Foto -->
                <p>
                    <label>Foto</label><br>
                    <div style="margin-bottom:8px;">
                        <?php if (!empty($row['foto']) && strpos($row['foto'], 'data:image/') === 0): ?>
                            <img id="foto-preview"
                                 src="<?php echo $row['foto']; ?>"
                                 class="foto-preview">
                        <?php else: ?>
                            <i class="fa fa-user-circle foto-placeholder" id="foto-placeholder"></i>
                            <img id="foto-preview" src="#" alt="Vista previa"
                                 class="foto-preview" style="display:none;">
                        <?php endif; ?>
                    </div>
                    <input type="file" id="foto" name="foto" accept="image/*"
                           onchange="previsualizarFoto(this)"
                           class="form-input">
                    <br><small class="foto-hint">Deja vacío para mantener la foto actual</small>
                </p>

                <!-- Nombre -->
                <p>
                    <label>Nombre</label><br>
                    <input type="text" id="nombre" name="nombre"
                           value="<?php echo htmlspecialchars($row['nombre']); ?>"
                           required class="form-input">
                </p>

                <!-- Teléfono -->
                <p>
                    <label>Teléfono</label><br>
                    <input type="text" id="telefono" name="telefono"
                           value="<?php echo htmlspecialchars($row['telefono'] ?? ''); ?>"
                           class="form-input">
                </p>

                <!-- Correo -->
                <p>
                    <label>Correo electrónico</label><br>
                    <input type="email" id="correo" name="correo"
                           value="<?php echo htmlspecialchars($row['correo'] ?? ''); ?>"
                           required class="form-input">
                    <br><small class="foto-hint">Se usará para recuperar la contraseña si la olvida.</small>
                </p>

                <!-- Cargo -->
                <p>
                    <label>Cargo</label><br>
                    <select id="cargo" name="cargo" required
                            onchange="toggleArea(this.value)"
                            class="form-input">
                        <option value="">Seleccione</option>
                        <option value="Admin"         <?php if ($row['cargo'] == 'Admin')         echo 'selected'; ?>>Administrador</option>
                        <option value="Instructor"    <?php if ($row['cargo'] == 'Instructor')    echo 'selected'; ?>>Instructor</option>
                        <option value="Mantenimiento" <?php if ($row['cargo'] == 'Mantenimiento') echo 'selected'; ?>>Mantenimiento</option>
                    </select>
                </p>

                <!-- Área de especialización (solo visible para Instructor) -->
                <div id="area-section" style="<?php echo ($row['cargo'] === 'Instructor') ? 'display:block;' : 'display:none;'; ?>">
                    <p>
                        <label>Área de Especialización</label><br>
                        <select id="area_especializacion" name="area_especializacion"
                                class="form-input">
                            <option value="">Seleccione un área</option>
                            <?php
                            $areas = [
                                'Informática', 'Electricidad', 'Mecánica Automotriz', 'Carpintería',
                                'Cocina', 'Corte y Confección', 'Soldadura', 'Plomería',
                                'Refrigeración y A/C', 'Panadería y Repostería', 'Belleza y Estética',
                                'Contabilidad', 'Administración', 'Idiomas', 'Otra'
                            ];
                            foreach ($areas as $a) {
                                $sel = ($row['area_especializacion'] === $a) ? 'selected' : '';
                                echo "<option value=\"" . htmlspecialchars($a) . "\" $sel>" . htmlspecialchars($a) . "</option>";
                            }
                            ?>
                        </select>
                    </p>
                </div>

                <!-- Usuario -->
                <p>
                    <label>Usuario</label><br>
                    <input type="text" id="nom_usuario" name="nom_usuario"
                           value="<?php echo htmlspecialchars($row['nom_usuario']); ?>"
                           required class="form-input">
                </p>

                <!-- Estado -->
                <p>
                    <label>Estado</label><br>
                    <select id="estado" name="estado" required class="form-input">
                        <option value="">Seleccione</option>
                        <option value="activo"   <?php if ($row['estado'] == 'activo')   echo 'selected'; ?>>Activo</option>
                        <option value="inactivo" <?php if ($row['estado'] == 'inactivo') echo 'selected'; ?>>Inactivo</option>
                    </select>
                </p>

                <!-- Botones -->
                <button type="submit" class="btn-form btn-guardar">
                    <i class="fa fa-save"></i> Guardar
                </button>
                <button type="reset" class="btn-form btn-limpiar">
                    <i class="fa fa-eraser"></i> Limpiar
                </button>
                <button type="button"
                        onclick="window.location.href='../ADMIN/USUARIO.php'"
                        class="btn-form btn-salir">
                    <i class="fa fa-sign-out"></i> Salir
                </button>                
            </center>
        </form>        
    </div>
    <br><br><br>
    
    <?php include 'footer.php'; ?>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        /**
         * Muestra una vista previa de la foto seleccionada.
         * @param {HTMLInputElement} input
         */
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

        /**
         * Muestra u oculta la sección de área según el cargo seleccionado.
         * @param {string} cargo
         */
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