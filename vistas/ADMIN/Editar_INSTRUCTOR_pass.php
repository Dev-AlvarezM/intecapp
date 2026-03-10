<?php include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?>
<?php include('../../modelos/usuario.php'); ?>

<!--Formulario de agregar usuario-->
<body style="background-color: #f0f0f0; color: #333; font-family: Arial, sans-serif; text-align: center;">
    <div style="width: 50%; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h3 style="color: #007bff;">Editar Contraseña de Usuario</h3>
        <form action="../../modelos/usuario_edit_pass.php" method="post" style="text-align: left;">
        <input type="hidden" id="id" name="id" value="<?php echo $row['id'];?>" required style="border: 1px solid #207ffc; padding: 4px; width: 30%;">
        <input type="hidden" id="instructor" name="instructor" value = "1" required style="border: 1px solid #207ffc; padding: 4px; width: 30%;">

            <center>
            <p>
                <label for="nombre" style="color: #000000;">Contraseña Nueva</label><br>
                <input type="password" id="contraseña" name="contraseña" onkeyup="comparar();" required style="border: 1px solid #207ffc; padding: 4px; width: 30%;">
            </p>
            
            <p>
                <label for="email" style="color: #000000;">Repetir contraseña</label><br>
                <input type="password" id="contraseña1" name="contraseña1" onkeyup="comparar();" required style="border: 1px solid #207ffc; padding: 4px; width: 30%;">
            </p>
            <style type="text/css">
                .ocultar {
                    display: none;
                }

                .mostrar {
                    display: block;
                }
            </style>
            <p>
                <div id="error" class="alert alert-danger ocultar" role="alert">
                    Las Contraseñas no coinciden!
                </div>
            </p>
            <center>

                <!--Botones de opciones-->
                <td>
                <button type="submit" class = "guardar" name="add" id="add" style="display: inline-block; width: 120px; padding: 10px 0; background-color: #0368d3; color: white; 
                    font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center;" name="add" id="add"><i class="fa fa-save"></i> Guardar</button>

                <button type="reset" class="limpiar" style="display: inline-block; width: 120px; padding: 10px 0; background-color: #f44336; color: white; 
                    font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center;" name="reset" id="reset"><i class="fa fa-eraser"></i> Limpiar</button>
                <button type="button" class="salir" style="display: inline-block; width: 120px; padding: 10px 0; background-color: #555555; color: white; 
                    font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center;" name="exit" id="exit" onclick="window.location.href='../ADMIN/INSTRUCTORES.php'">              
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
<?php include '../../controladores/usuario.php'; ?>