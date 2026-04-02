<?php include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?>
<link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']; ?>/intecapp/wwwroot/AGREGAR USUARIO.css">

<body>
<div class="form-container">
    <h3>Agregar Nuevo Usuario</h3>

    <!-- PASO 1: Tipo de usuario -->
    <div id="paso1">
        <center>
            <p class="form-group">
                <label for="tipo_usuario">¿Qué tipo de usuario desea agregar?</label><br><br>
                <select id="tipo_usuario" name="tipo_usuario" onchange="mostrarFormulario(this.value)">
                    <option value="">-- Seleccione --</option>
                    <option value="Admin">Administrador</option>
                    <option value="Instructor">Instructor</option>
                    <option value="Mantenimiento">Mantenimiento</option>
                </select>
            </p>
        </center>
    </div>

    <!-- PASO 2: Formulario -->
    <form action="../../modelos/usuario_add.php" method="post" id="formulario-usuario" enctype="multipart/form-data">
        <input type="hidden" id="instructor"   name="instructor" value="0">
        <input type="hidden" id="cargo_hidden" name="cargo"      value="">
        <input type="hidden" id="foto_base64"  name="foto_base64" value="">

        <center>
            <h5 id="titulo-formulario"></h5>

            <!-- ── SECCIÓN FOTO ── -->
            <div id="foto-section">
                <div class="foto-titulo">
                    <span class="label-principal"><i class="fa fa-camera"></i> Fotografía</span>
                    <span class="badge-opcional">Opcional</span>
                </div>

                <!-- Botones fuente -->
                <div class="foto-fuente-btns">
                    <button type="button" id="btn-archivo" onclick="mostrarFuente('archivo')">
                        <i class="fa fa-upload"></i> Subir archivo
                    </button>
                    <button type="button" id="btn-camara" onclick="mostrarFuente('camara')">
                        <i class="fa fa-camera"></i> Usar cámara
                    </button>
                </div>

                <!-- Panel: subir archivo -->
                <div id="input-archivo">
                    <label class="drop-zone" for="foto_instructor" ondragover="event.preventDefault()" ondrop="soltarArchivo(event)">
                        <i class="fa fa-cloud-upload"></i>
                        <span class="drop-texto">Arrastra una imagen o haz clic aquí</span>
                        <small>JPG, PNG o GIF · Máx. 2 MB</small>
                    </label>
                    <input type="file" id="foto_instructor" name="foto" accept="image/*" onchange="cargarArchivo(this)">
                </div>

                <!-- Panel: cámara -->
                <div id="input-camara">
                    <video id="video-camara" autoplay playsinline></video>
                    <canvas id="canvas-camara" style="display:none;"></canvas>
                    <br>
                    <button type="button" id="btn-capturar" onclick="capturarFoto()">
                        <i class="fa fa-circle"></i> Capturar foto
                    </button>
                </div>

                <!-- Vista previa -->
                <div id="preview-container">
                    <div class="preview-inner">
                        <span class="preview-label">Vista previa</span>
                        <img id="foto-preview" src="#" alt="Vista previa">
                        <button type="button" id="btn-quitar-foto" onclick="quitarFoto()">
                            <i class="fa fa-times"></i> Quitar foto
                        </button>
                    </div>
                </div>
            </div>
            <!-- ── FIN SECCIÓN FOTO ── -->

            <p class="form-group">
                <label for="nombre">Nombre</label><br>
                <input type="text" id="nombre" name="nombre" required>
            </p>

            <p class="form-group">
                <label for="telefono">Teléfono</label><br>
                <input type="text" id="telefono" name="telefono">
            </p>

            <!-- Solo Instructor -->
            <div id="area-section">
                <p class="form-group">
                    <label for="area_especializacion">Área de Especialización</label><br>
                    <select id="area_especializacion" name="area_especializacion">
                        <option value="">Seleccione un área</option>
                        <option value="Soldadura Industrial">Soldadura Industrial</option>
                        <option value="Electricidad">Electricidad</option>
                        <option value="Gastronomía">Gastronomía</option>
                        <option value="Confección">Confección</option>
                        <option value="Belleza y Estética">Belleza y Estética</option>
                        <option value="Informática">Informática</option>
                        <option value="Mecánica Automotriz">Mecánica Automotriz</option>
                        <option value="Otra">Otra</option>
                    </select>
                </p>
            </div>

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
                <select id="estado" name="estado">
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>
            </p>

            <button type="submit" class="btn btn-guardar" name="add">
                <i class="fa fa-save"></i> Guardar
            </button>
            <button type="reset" class="btn btn-limpiar" onclick="resetFormulario()">
                <i class="fa fa-eraser"></i> Limpiar
            </button>
            <button type="button" class="btn btn-salir" onclick="window.location.href='../ADMIN/USUARIO.php'">
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
var streamCamara = null;

/* ── Paso 1: mostrar formulario según cargo ── */
function mostrarFormulario(cargo) {
    var form        = document.getElementById('formulario-usuario');
    var areaSection = document.getElementById('area-section');
    var areaSelect  = document.getElementById('area_especializacion');
    var titulo      = document.getElementById('titulo-formulario');
    var hiddenCargo = document.getElementById('cargo_hidden');
    var hiddenInst  = document.getElementById('instructor');

    if (!cargo) { form.style.display = 'none'; return; }

    form.style.display   = 'block';
    form.style.opacity   = '0';
    form.style.transition = 'opacity 0.4s ease';
    setTimeout(function() { form.style.opacity = '1'; }, 10);

    hiddenCargo.value = cargo;

    if (cargo === 'Instructor') {
        titulo.textContent        = 'Datos del Instructor';
        areaSection.style.display = 'block';
        areaSelect.setAttribute('required', 'required');
        hiddenInst.value          = '1';
    } else if (cargo === 'Admin') {
        titulo.textContent        = 'Datos del Administrador';
        areaSection.style.display = 'none';
        areaSelect.removeAttribute('required');
        areaSelect.value = '';
        hiddenInst.value = '0';
    } else {
        titulo.textContent        = 'Datos del Usuario de Mantenimiento';
        areaSection.style.display = 'none';
        areaSelect.removeAttribute('required');
        areaSelect.value = '';
        hiddenInst.value = '0';
    }
}

/* ── Fuente de foto ── */
function mostrarFuente(fuente) {
    document.getElementById('input-archivo').style.display = 'none';
    document.getElementById('input-camara').style.display  = 'none';
    document.querySelectorAll('.foto-fuente-btns button').forEach(function(b) {
        b.classList.remove('activo');
    });

    if (fuente === 'archivo') {
        document.getElementById('input-archivo').style.display = 'block';
        document.getElementById('btn-archivo').classList.add('activo');
        detenerCamara();
    } else {
        document.getElementById('input-camara').style.display = 'block';
        document.getElementById('btn-camara').classList.add('activo');
        iniciarCamara();
    }
}

/* ── Subir archivo ── */
function cargarArchivo(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) { mostrarPreview(e.target.result); };
        reader.readAsDataURL(input.files[0]);
    }
}

function soltarArchivo(e) {
    e.preventDefault();
    var archivo = e.dataTransfer.files[0];
    if (archivo && archivo.type.startsWith('image/')) {
        var reader = new FileReader();
        reader.onload = function(ev) { mostrarPreview(ev.target.result); };
        reader.readAsDataURL(archivo);
    }
}

/* ── Cámara ── */
function iniciarCamara() {
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(function(stream) {
            streamCamara = stream;
            document.getElementById('video-camara').srcObject = stream;
        })
        .catch(function() { alert('No se pudo acceder a la cámara.'); });
}

function detenerCamara() {
    if (streamCamara) {
        streamCamara.getTracks().forEach(function(t) { t.stop(); });
        streamCamara = null;
    }
}

function capturarFoto() {
    var video  = document.getElementById('video-camara');
    var canvas = document.getElementById('canvas-camara');
    canvas.width  = video.videoWidth;
    canvas.height = video.videoHeight;
    canvas.getContext('2d').drawImage(video, 0, 0);
    var dataUrl = canvas.toDataURL('image/jpeg');
    mostrarPreview(dataUrl);
    detenerCamara();
    document.getElementById('input-camara').style.display = 'none';
}

/* ── Vista previa y base64 ── */
function mostrarPreview(dataUrl) {
    document.getElementById('foto-preview').src          = dataUrl;
    document.getElementById('preview-container').style.display = 'block';
    document.getElementById('foto_base64').value         = dataUrl;
}

function quitarFoto() {
    document.getElementById('foto-preview').src               = '#';
    document.getElementById('preview-container').style.display = 'none';
    document.getElementById('foto_base64').value               = '';
    document.getElementById('foto_instructor').value           = '';
    document.getElementById('input-archivo').style.display     = 'none';
    document.getElementById('input-camara').style.display      = 'none';
    document.querySelectorAll('.foto-fuente-btns button').forEach(function(b) {
        b.classList.remove('activo');
    });
    detenerCamara();
}

/* ── Limpiar todo ── */
function resetFormulario() {
    document.getElementById('tipo_usuario').value               = '';
    document.getElementById('formulario-usuario').style.display = 'none';
    document.getElementById('area-section').style.display       = 'none';
    document.getElementById('area_especializacion').value       = '';
    document.getElementById('instructor').value                 = '0';
    document.getElementById('cargo_hidden').value               = '';
    quitarFoto();
}
</script>
</body>
</html>