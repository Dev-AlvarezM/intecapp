<?php include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?>

<!--Formulario agregar mantenimiento-->
<body style="background-color: #f0f0f0; color: #333; font-family: Arial, sans-serif; text-align: center;">
    <div style="width: 50%; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h3 style="color: #007bff;">Agregar Nuevo Encargado de Mantenimiento</h3>
        <form action="../../modelos/mantenimiento_add.php" method="post" style="text-align: left;">
            <center>
                <!--Formulario agregar mantenimiento
                <p>
                    <label for="nombre" style="color: #000000;">Año</label><br>
                    <input type="text" id="anio" name="anio" required style="border: 1px solid #207ffc; padding: 4px; width: 30%;">
                </p>
                                -->
                <p>
                    <label for="nombre" style="color: #000000;">Nombre del Encargado</label><br>
                    <select id="id_encargado" name="id_encargado" required style="border: 1px solid #207ffc; padding: 4px; width: 30%; margin: 0 auto;">
                        <option value="">Seleccione</option>
                        <?php include 'listas/mantenimiento_combobox.php';?>
                    </select>
                </p>

                <p style="text-align: center;">
                    <label for="filtro" style="color: #000000;">Taller</label><br>
                    <select id="id_taller" name="id_taller" required style="border: 1px solid #207ffc; padding: 4px; width: 30%; margin: 0 auto;">
                        <option value="">Seleccione</option>
                        <?php include 'listas/talleres_combobox.php';?>
                    </select>
                </p>                
                <p>
                    <label for="f_reporte" style="color: #000000;">Fecha de Reporte</label><br>
                    <input type="date" id="f_reporte" name="f_reporte" required style="border: 1px solid #207ffc; padding: 4px; width: 30%;">
                </p>
                <!--<p>
                    <label for="f_realizado" style="color: #000000;">Fecha de Finalización</label><br>
                    <input type="date" id="f_realizado" name="f_realizado" required style="border: 1px solid #207ffc; padding: 4px; width: 30%;">
                </p> -->
                <p style="text-align: center;">
                     <label for="descripcion" >Descripción</label><br>
                     <input type="text" id="descripcion" name="descripcion" required style="border: 1px solid #207ffc; padding: 4px; width: 30%; margin: 0 auto;">
                </p>

                <p style="text-align: center;">
                    <label for="filtro" style="color: #000000;">Estado</label><br>
                    <select id="estado" name="estado" required style="border: 1px solid #207ffc; padding: 4px; width: 30%; margin: 0 auto;">
                        <!-- El nuevo mantenimiento se crea siempre como "no realizado" -->
                        <option value="no realizado" selected>No Realizado</option>
                        <option value="Realizada">Realizada</option>
                    </select>
                </p>
            <p>
                <!--Botones de opciones-->
                <td>
                <button type="submit" class = "guardar" style="display: inline-block; width: 120px; padding: 10px 0; background-color: #0368d3; color: white; 
                    font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center;" name="add" id="add"><i class="fa fa-save"></i> Guardar</button>
                
                <button type="reset" class="limpiar" style="display: inline-block; width: 120px; padding: 10px 0; background-color: #f44336; color: white; 
                    font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center;" name="reset" id="reset"><i class="fa fa-eraser"></i> Limpiar</button>
                    <button type="button" class="salir" style="display: inline-block; width: 120px; padding: 10px 0; background-color: #555555; color: white; 
                    font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center;" name="exit" id="exit" onclick="window.location.href='../ADMIN/MANTENIMIENTO.php'">
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