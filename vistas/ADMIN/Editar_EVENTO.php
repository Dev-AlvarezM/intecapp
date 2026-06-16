<?php include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?>
<?php include('../../modelos/evento.php'); ?>
<link rel="stylesheet" href="/intecapp/wwwroot/css/Editar_EVENTO.css">
<link rel="stylesheet" href="css/tema.css">

    <div class="form-container">
        <h3 class="evento-titulo">Editar Evento</h3>
        
        <form action="../../modelos/evento_edit.php" method="post" class="evento-form">
            <input type="hidden" id="id_eventos" name="id_eventos" value="<?php echo $row['id_eventos'];?>" class="evento-input" required>

            <div class="text-center">
                <p>
                    <label for="anio_evento" class="evento-label">Año</label><br>
                    <input type="text" id="anio_evento" name="anio_evento" value="<?php echo $row['anio_evento'];?>" class="evento-input" required>
                </p>
                
                <p>
                    <label for="id_talleres" class="evento-label">Taller</label><br>
                    <select id="id_talleres" name="id_talleres" class="evento-select" required>
                        <option value="">Seleccione</option>
                        <?php include 'listas/talleres_comboboxEE.php';?>
                    </select>
                </p>
                
                <p>
                    <label for="programa" class="evento-label">Número del Programa</label><br>
                    <input type="text" id="programa" name="programa" value="<?php echo $row['programa'];?>" class="evento-input" required>
                </p>

                <p>
                    <label for="nombre_evento" class="evento-label">Nombre del Evento</label><br>
                    <input type="text" id="nombre_evento" name="nombre_evento" value="<?php echo $row['nombre_evento'];?>" class="evento-input" required>
                </p>
                
                <p>
                    <label for="f_inicio" class="evento-label">Fecha de inicio</label><br>
                    <input type="date" id="f_inicio" name="f_inicio" value="<?php echo $row['f_inicio'];?>" class="evento-input" required>
                </p>
                
                <p>
                    <label for="f_fin" class="evento-label">Fecha de Finalización</label><br>
                    <input type="date" id="f_fin" name="f_fin" value="<?php echo $row['f_fin'];?>" class="evento-input" required>
                </p>
                
                <p>
                    <label for="hora_entrada" class="evento-label">Hora de Entrada</label><br>
                    <input type="time" id="hora_entrada" name="hora_entrada" value="<?php echo $row['hora_entrada'];?>" class="evento-input" required>
                </p>

                <p>
                    <label for="hora_salida" class="evento-label">Hora de Salida</label><br>
                    <input type="time" id="hora_salida" name="hora_salida" value="<?php echo $row['hora_salida'];?>" class="evento-input" required>
                </p>
                
                <p>
                    <label for="id_instructor" class="evento-label">Instructor</label><br>
                    <select id="id_instructor" name="id_instructor" class="evento-select" required>
                        <option value="">Seleccione</option>
                        <?php include 'listas/instructores_comboboxEE.php';?>
                    </select>
                </p>
                
                <p>
                    <label for="modalidad" class="evento-label">Modalidad</label><br>
                    <select id="modalidad" name="modalidad" class="evento-select" required>
                        <option value="">Seleccione</option>
                        <option value="Presencial" <?php if($row['modalidad']=="Presencial") {echo "selected"; }?> >Presencial</option>
                        <option value="Virtual" <?php if($row['modalidad']=="Virtual") {echo "selected"; }?> >Virtual</option>
                    </select>
                </p>
                
                <div class="botones-container">
                    <button type="submit" class="btn-accion btn-guardar" name="add" id="add">
                        <i class="fa fa-save"></i> Guardar
                    </button>
                    
                    <button type="reset" class="btn-accion btn-limpiar" name="reset" id="reset">
                        <i class="fa fa-eraser"></i> Limpiar
                    </button>
                    
                    <button type="button" class="btn-accion btn-salir" name="exit" id="exit" onclick="window.location.href='../ADMIN/EVENTOS.php'">
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
