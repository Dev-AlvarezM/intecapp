<?php include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?>

<!--Formulario agregar mantenimiento-->
<body style="background-color: #f0f0f0; color: #333; font-family: Arial, sans-serif; text-align: center;">
    <div style="width: 50%; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h3 style="color: #007bff;">Registrar Asistencia</h3>
        <form action="../../modelos/asistencia_add.php" method="post" style="text-align: left;">
        <input type="hidden" id="id_usuario" name="id_usuario" value = "<?php echo $user['id'];?>" required style="border: 1px solid #207ffc; padding: 4px; width: 30%;">

            <center>

                <p>
                    <label for="fecha_inicio" style="color: #000000;">Fecha</label><br>
                    <input type="date" id="fecha" name="fecha" required style="border: 1px solid #207ffc; padding: 4px; width: 30%;">
                </p>

                <p style="text-align: center;">
                    <label for="filtro" style="color: #000000;">Evento</label><br>
                    <select id="id_evento" name="id_evento" required style="border: 1px solid #207ffc; padding: 4px; width: 30%; margin: 0 auto;">
                        <option value="">Seleccione</option>
                        <?php include 'listas/eventos_combobox.php';?>
                    </select>
                </p>
                <p style="text-align: center;">
                    <label for="hora_entrada" style="color: #000000;">Hora Entrada</label><br>
                    <div class="input-group" style="text-align: center;">
                        <input type="time" id="hora_entrada" name="hora_entrada" required style="border: 1px solid #207ffc; padding: 4px; width: 30%; margin: 0 auto;">
                    </div>
                </p>
                <p style="text-align: center;">
                    <label for="hora_salida" style="color: #000000;">Hora Salida</label><br>
                    <div class="input-group" style="text-align: center;">
                        <input type="time" id="hora_salida" name="hora_salida" required style="border: 1px solid #207ffc; padding: 4px; width: 30%; margin: 0 auto;">
                    </div>
                </p> <br>

            <p>
                <!--Botones de opciones-->
                <td>
                <button type="submit" class = "guardar" style="display: inline-block; width: 120px; padding: 10px 0; background-color: #0368d3; color: white; 
                    font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center;" name="add" id="add"><i class="fa fa-save"></i> Guardar</button>
                
                <button type="reset" class="limpiar" style="display: inline-block; width: 120px; padding: 10px 0; background-color: #f44336; color: white; 
                    font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center;" name="reset" id="reset"><i class="fa fa-eraser"></i> Limpiar</button>
                    <button type="button" class="salir" style="display: inline-block; width: 120px; padding: 10px 0; background-color: #555555; color: white; 
                    font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center;" name="exit" id="exit" onclick="window.location.href='../ADMIN/principal.php'">
                    <i class="fa fa-sign-out"></i> <i class="fa fa-arrow-right"></i> Salir
                </button>
                </button><br><br><br>

        </form>
                
    <!-- Pie de página -->
    <?php include 'footer.php'; ?>
</div><!-- .main-container -->


</div><!-- .main-container -->

    <!-- jQuery y Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!--Samayoa-->
</body>
</html>