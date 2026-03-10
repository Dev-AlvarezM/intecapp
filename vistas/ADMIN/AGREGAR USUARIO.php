<?php include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?>

<!--Formulario de agregar usuario-->
<body style="background-color: #f0f0f0; color: #333; font-family: Arial, sans-serif; text-align: center;">
    <div style="width: 50%; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h3 style="color: #007bff;">Agregar Nuevo Usuario</h3>
        <form action="../../modelos/usuario_add.php" method="post" style="text-align: left;">
        <input type="hidden" id="instructor" name="instructor" value = "0" required style="border: 1px solid #207ffc; padding: 4px; width: 30%;">

            <center>
            <p>
                <label for="nombre" style="color: #000000;">Nombre</label><br>
                <input type="text" id="nombre" name="nombre" required style="border: 1px solid #207ffc; padding: 4px; width: 30%;">
            </p>
            
            <p>
                <label for="email" style="color: #000000;">Dirección</label><br>
                <input type="text" id="direccion" name="direccion" required style="border: 1px solid #207ffc; padding: 4px; width: 30%;">
            </p>
            <center>
                <p>
                    <label for="nombre" style="color: #000000;">Cargo</label><br>
                    <select id="cargo" name="cargo" required style="border: 1px solid #207ffc; padding: 4px; width: 30%; margin: 0 auto;">
                        <option value="">Seleccione</option>
                        <option value="Admin">Administrador</option>
                        <option value="Instructor">Instructor</option>
                        <option value="Mantenimiento">Mantenimiento</option>
                    </select>
                </p>
                <p>
                    <label for="nombre" style="color: #000000;">Usuario</label><br>
                    <input type="text" id="nom_usuario" name="nom_usuario" required style="border: 1px solid #207ffc; padding: 4px; width: 30%;">
                </p>
                <p>
                    <label for="nombre" style="color: #000000;">Contraseña</label><br>
                    <input type="password" id="contraseña" name="contraseña" required style="border: 1px solid #207ffc; padding: 4px; width: 30%;">
                </p>
                <p style="text-align: center;">
                    <label for="filtro" style="color: #000000;">Estado</label><br>
                    <select id="estado" name="estado" required style="border: 1px solid #207ffc; padding: 4px; width: 30%; margin: 0 auto;">
                        <option value="">Seleccione</option>
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
                    </select>
                </p>
                <!--Botones de opciones-->
                <td>
                <button type="submit" class = "guardar" style="display: inline-block; width: 120px; padding: 10px 0; background-color: #0368d3; color: white; 
                    font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center;" name="add" id="add"><i class="fa fa-save"></i> Guardar</button>

                <button type="reset" class="limpiar" style="display: inline-block; width: 120px; padding: 10px 0; background-color: #f44336; color: white; 
                    font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center;" name="reset" id="reset"><i class="fa fa-eraser"></i> Limpiar</button>
                <button type="button" class="salir" style="display: inline-block; width: 120px; padding: 10px 0; background-color: #555555; color: white; 
                    font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center;" name="exit" id="exit" onclick="window.location.href='../ADMIN/USUARIO.php'">              
                    <i class="fa fa-sign-out"></i> <i class="fa fa-arrow-right"></i> Salir
                </button><br><br><br>
    </form>        
    <!-- Pie de página -->
    <?php include 'footer.php'; ?>

</div><!-- .main-container -->


</div><!-- .main-container -->

    <!-- jQuery y Bootstrap JS  -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!--Samayoa-->
</body>

</html>
