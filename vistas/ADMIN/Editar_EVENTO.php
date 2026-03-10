<?php include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?>
<?php include('../../modelos/evento.php'); ?>

       <!--Formulario agregar evento-->
<body style="background-color: #f0f0f0; color: #333; font-family: Arial, sans-serif; text-align: center;">
    <div style="width: 50%; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h3 style="color: #007bff;">Editar Evento</h3>
        <form action="../../modelos/evento_edit.php" method="post" style="text-align: left;">
        <input type="hidden" id="id_eventos" name="id_eventos" value="<?php echo $row['id_eventos'];?>" required style="border: 1px solid #207ffc; padding: 4px; width: 30%;">

            <center>
            <p>
                <label for="nombre" style="color: #000000;">Año</label><br>
                <input type="text" id="anio_evento" name="anio_evento" value="<?php echo $row['anio_evento'];?>" required style="border: 1px solid #207ffc; padding: 4px; width: 30%;">
            </p>
            
            <p style="text-align: center;">
                <label for="filtro" style="color: #000000;">Taller</label><br>
                <select id="id_talleres" name="id_talleres" required style="border: 1px solid #207ffc; padding: 4px; width: 30%; margin: 0 auto;">
                    <option value="">Seleccione</option>
                    <?php include 'listas/talleres_comboboxEE.php';?>
                </select>
            </p>
            <p>
                <label for="numero" style="color: #000000;">Número del Programa</label><br>
                <input type="text" id="programa" name="programa" value="<?php echo $row['programa'];?>" required style="border: 1px solid #207ffc; padding: 4px; width: 30%;">
            </p>
            <center>
                <p>
                    <label for="nombre" style="color: #000000;">Nombre del Evento</label><br>
                    <input type="text" id="nombre_evento" name="nombre_evento" value="<?php echo $row['nombre_evento'];?>" required style="border: 1px solid #207ffc; padding: 4px; width: 30%;">
                </p>
                
    
                <p>
                    <label for="fecha_inicio" style="color: #000000;">Fecha de inicio</label><br>
                    <input type="date" id="f_inicio" name="f_inicio" value="<?php echo $row['f_inicio'];?>" required style="border: 1px solid #207ffc; padding: 4px; width: 30%;">
                </p>
                <p>
                    <label for="fecha_fin" style="color: #000000;">Fecha de Finalización</label><br>
                    <input type="date" id="f_fin" name="f_fin" value="<?php echo $row['f_fin'];?>" required style="border: 1px solid #207ffc; padding: 4px; width: 30%;">
                </p>
                
                <p>
                    <label for="nombre" style="color: #000000;">Instructor</label><br>
                    <select id="id_instructor" name="id_instructor" required style="border: 1px solid #207ffc; padding: 4px; width: 30%; margin: 0 auto;">
                        <option value="">Seleccione</option>
                        <?php include 'listas/instructores_comboboxEE.php';?>
                    </select>
                </p>
                <p style="text-align: center;">
                    <label for="filtro" style="color: #000000;">Modalidad</label><br>
                    <select id="modalidad" name="modalidad" required style="border: 1px solid #207ffc; padding: 4px; width: 30%; margin: 0 auto;">
                        <option value="">Seleccione</option>
                        <option value="Presencial" <?php if($row['modalidad']=="Presencial") {echo "selected"; }?> >Presencial</option>
                        <option value="Virtual" <?php if($row['modalidad']=="Virtual") {echo "selected"; }?> >Virtual</option>
                    </select>
                    <p style="text-align: center;">
                        <label for="filtro" style="color: #000000;">Estado</label><br>
                        <select id="estado" name="estado" required style="border: 1px solid #207ffc; padding: 4px; width: 30%; margin: 0 auto;">
                            <option value="">Seleccione</option>
                            <option value="Activo" <?php if($row['estado']=="Activo") {echo "selected"; }?> >Activo</option>
                            <option value="Inactivo" <?php if($row['estado']=="Inactivo") {echo "selected"; }?> >Inactivo</option>
                        </select>
                    </p>
                    <!--Botones de opciones-->
                <td>
                <button type="submit" class = "guardar" style="display: inline-block; width: 120px; padding: 10px 0; background-color: #0368d3; color: white; 
                    font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center;" name="add" id="add"><i class="fa fa-save"></i> Guardar</button>
                
                <button type="reset" class="limpiar" style="display: inline-block; width: 120px; padding: 10px 0; background-color: #f44336; color: white; 
                    font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center;" name="reset" id="reset"><i class="fa fa-eraser"></i> Limpiar</button>
                    <button type="button" class="salir" style="display: inline-block; width: 120px; padding: 10px 0; background-color: #555555; color: white; 
                    font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center;" name="exit" id="exit" onclick="window.location.href='../ADMIN/EVENTOS.php'">
                    <i class="fa fa-sign-out"></i> <i class="fa fa-arrow-right"></i> Salir
                </button><br><br><br>
                   
                </td><br>
        </form>
                
<?php include 'footer.php'; ?>
</div><!-- .main-container -->

<!--Samayoa-->
    <!-- jQuery y Bootstrap JS (importante para el menú desplegable) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>