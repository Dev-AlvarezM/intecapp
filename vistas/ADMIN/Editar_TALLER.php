<?php include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?>
<?php include('../../modelos/taller.php'); ?>

       <!--Formulario agregar taller-->
<body style="background-color: #f0f0f0; color: #333; font-family: Arial, sans-serif; text-align: center;">
    <div style="width: 50%; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h3 style="color: #007bff;">Edtitar Taller</h3>
        <form action="../../modelos/taller_edit.php" method="post" style="text-align: left;">
        <input type="hidden" id="id" name="id" value="<?php echo $row['id'];?>" required style="border: 1px solid #207ffc; padding: 4px; width: 30%;">

            <center>
            <p>
                <label for="nombre" style="color: #000000;">Año</label><br>
                <input type="text" id="anio" name="anio" value="<?php echo $row['anio'];?>" required style="border: 1px solid #207ffc; padding: 4px; width: 30%;">
            </p>
            <p>
                <label for="email" style="color: #000000;">Nombre del Taller</label><br>
                <input type="text" id="nombre_taller" name="nombre_taller" value="<?php echo $row['nombre_taller'];?>" required style="border: 1px solid #207ffc; padding: 4px; width: 30%;">
            </p>
                <p>
                    <label for="nombre" style="color: #000000;">Participantes</label><br>
                    <input type="text" id="participantes" name="participantes" value="<?php echo $row['participantes'];?>" required style="border: 1px solid #207ffc; padding: 4px; width: 30%;">
                </p>

                <p>
                    <label for="nombre" style="color: #000000;">Condicion</label><br>
                    <input type="text" id="condicion" name="condicion" value="<?php echo $row['condicion'];?>" style="border: 1px solid #207ffc; padding: 4px; width: 30%;">
                </p>

                <p>
                    <label for="nombre" style="color: #000000;">Hora de Entrada</label><br>
                    <input type="time" id="hora_entrada" name="hora_entrada" value="<?php echo $row['hora_entrada'];?>" required style="border: 1px solid #207ffc; padding: 4px; width: 30%;">
                </p>

                <p>
                    <label for="nombre" style="color: #000000;">Hora de Salida</label><br>
                    <input type="time" id="hora_salida" name="hora_salida" value="<?php echo $row['hora_salida'];?>" required style="border: 1px solid #207ffc; padding: 4px; width: 30%;">
                </p>
                
                <p style="text-align: center;">
                    <label for="filtro" style="color: #000000;">Estado</label><br>
                    <select id="estado" name="estado" required style="border: 1px solid #207ffc; padding: 4px; width: 30%; margin: 0 auto;">
                    <option value="">Seleccione</option>
                    <option value="Activo" <?php if($row['estado']=="Activo") {echo "selected"; }?> >Activo</option>
                    <option value="Inactivo" <?php if($row['estado']=="Inactivo") {echo "selected"; }?> >Inactivo</option>
                    </select>
                </p>
            <p><br>
                <!--Botones de opciones-->

                <button type="submit" class = "guardar" style="display: inline-block; width: 120px; padding: 10px 0; background-color: #0368d3; color: white; 
                    font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center;" name="add" id="add"><i class="fa fa-save"></i> Guardar</button>
                
                <button type="button" class="salir" style="display: inline-block; width: 120px; padding: 10px 0; background-color: #555555; color: white; 
                    font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center;" name="exit" id="exit" onclick="window.location.href='../ADMIN/TALLERES.php'">
                    <i class="fa fa-sign-out"></i> <i class="fa fa-arrow-right"></i> Salir
                </button> <br><br><br>
        </form>           
    <!-- Pie de página -->
    <?php include 'footer.php'; ?>
</div>
<!--Samayoa-->
    <!-- jQuery y Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>