<?php include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?>

<h1>Instructores</h1>
   
   <div class="container-fluid">
       <!-- Botón de hipervínculo alineado a la derecha -->
       <div class="mb-3 text-right">
       <a href="../ADMIN/AGREGAR INSTRUCTOR.php" class="btn btn-primary" style="display: inline-block; width: 120px; padding: 10px 0; background-color: #007bff; color: white; 
                    font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center;">
    <i class="fa fa-calendar-plus"></i> Agregar Instructor
</a>
       </div>
   <div class="container-fluid">
       <table id="table-edit" class="table table-bordered table-hover">
           <thead>
               <tr>
                   <th>No.</th>
                   <th>Nombre del Instructor</th>
                   <!-- 
                   <th>Taller</th>
                   <th>Evento</th>
                   <th>Fecha de uso</th>
                   -->
                   <th>Estado</th>
                   <th>Acciones</th> 
               </tr>
           </thead>
           <tbody>
           
                <?php include('listas/instructores_list.php'); ?>

           </tbody>
       </table>
   </div>
      
   <div class="container-fluid">

    <div class="mb-3 text-right">
    <button type="button" class="btn btn-primary" style="display: inline-block; width: 120px; padding: 10px 0; background-color: #007bff; color: white; 
                    font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center;" onclick="window.location.href='pdf/instructores_pdf.php'">
    <i class="fas fa-print"></i> Reporte
</button>
</div>
   <!-- Pie de página -->
   <?php include 'footer.php'; ?>
</div>

</div><!-- .main-container -->
<!--Samayoa-->
<!-- jQuery y Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php include '../../controladores/instructor.php'; ?>