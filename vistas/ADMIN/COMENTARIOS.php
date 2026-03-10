<?php include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?><h1>COMENTARIOS</h1>
  

<h1>Área de Mantenimiento</h1>
   

   <div class="container-fluid">
       <table id="table-edit" class="table table-bordered table-hover">
           <thead>
               <tr>
                   <th>Año</th>
                   <th>Nombre del Encargado</th>
                   <th>Taller</th>
                   <th>Fecha de Reporte</th>
                   <th>Fecha de Realizado</th>
                   <th>Estado</th>
           </thead>
           <tbody>
               <tr>
                    <?php include 'listas/comentario_list.php'; ?>
               </tr>
           </tbody>
       </table>
       
           <h1>Lista de comentarios</h1>

        <table id="table-edit" class="table table-bordered table-hover">
           <thead>
               <tr>
                   <th>No.</th>
                   <th>Fecha</th>
                   <th>Comentario</th>
                   <th>Acciones</th>
           </thead>
           <tbody>
               <tr>
                    <?php include 'listas/comentario_list2.php'; ?>
               </tr>
           </tbody>
       </table>

   </div>


<h1>Agregar comentario</h1>
    <div class="container-fluid">
        <!-- Botón de hipervínculo alineado a la derecha -->
        <div class="mb-3 text-left">
        <form action="../../modelos/comentario_add.php" method="post" style="text-align: left;">
            <input type="hidden" id="id_mantenimiento" name="id_mantenimiento" value="<?php echo $id_mantenimiento;?>" required style="border: 1px solid #207ffc; padding: 4px; width: 30%;">
            <textarea id="Comentario" name="Comentario" rows="4" cols="50"></textarea>

            <button type="submit" class="btn btn-primary" style="display: inline-block; width: 120px; padding: 10px 0; background-color: #007bff; color: white; 
                    font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center;" name="add" id="add">
                    <i class="fas fa-plus"></i> Agregar
            </button>
               
            <button type="reset" class="limpiar" style="display: inline-block; width: 120px; padding: 10px 0; background-color: #f44336; color: white; 
                    font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center;" name="reset" id="reset">
                    <i class="fa fa-eraser"></i> Limpiar
            </button>

            <button type="button" class="salir" style="display: inline-block; width: 120px; padding: 10px 0; background-color: #555555; color: white; 
                    font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center;" name="exit" id="exit" onclick="window.location.href='../ADMIN/MANTENIMIENTO.php'">
                    <i class="fa fa-sign-out"></i> <i class="fa fa-arrow-right"></i> Regresar
            </button>
        </form>

<br><br><br>
        </div>
    </div>
   
   <!-- Pie de página -->
   <footer>
       <p>&copy; INTECAP, QUICHÉ</p>
   </footer>
</div>

<?php include 'footer.php'; ?>
</div><!-- .main-container -->

<!-- jQuery y Bootstrap JS  -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<!--Samayoa-->

</body>
</html>
<?php include '../../controladores/comentario.php'; ?>