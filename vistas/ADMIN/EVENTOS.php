<?php include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?>

<h1>Eventos</h1>

<div class="container-fluid">
    <!-- Botón de hipervínculo alineado a la derecha -->
    <div class="mb-3 text-right">
     <?php
     if ($user['cargo']=="Admin") {
     ?>
    <button type="button" class="btn btn-primary" style="display: inline-block; width: 120px; padding: 10px 0; background-color: #007bff; color: white; 
                 font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center;" onclick="window.location.href='pdf/eventos_pdf.php'">
                 <i class="fas fa-print"></i> Reporte
     </button>
     <?php
     }else  {
         
     }
     ?>
    <!-- Botón de hipervínculo alineado a la derecha -->
    
        <?php
        if (in_array($user['cargo'], ["Admin", "Instructor"])) {
        ?>
            <a href="../ADMIN/AGREGAR EVENTO.php" class="btn btn-primary" style="display: inline-block; width: 120px; padding: 10px 0; background-color: #007bff; color: white; 
                        font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center;">
                        <i class="fa fa-calendar-plus"></i> Agregar Evento
            </a>
        <?php
        }else  {
            
        }
        ?>

       </div>
   <div class="container-fluid">
       <table id="table-edit" class="table table-bordered table-hover">
           <thead>
               <tr>
                   <th>Año</th>
                   <th>Taller</th>
                   <th>No. Programa</th>
                   <th>Nombre del Evento</th>
                   <th>Fecha de Inicio</th>
                   <th>Fecha de Finalización</th>
                   <th>Instructor</th>
                   <th>Modalidad</th>
                   <th>Estado</th>
                   <th>Acciones</th> <!-- Nueva columna para las opciones de editar y eliminar -->
               </tr>
           </thead>
           <tbody>
                <?php include('listas/eventos_list.php'); ?>
           </tbody>
       </table>
   </div>
   <!-- Sección donde se coloca el gráfico -->
<div class="chart-container">
<canvas id="barChart"></canvas>
</div>
   <div class="container-fluid">
   <!-- Pie de página -->
   <?php include 'footer.php'; ?>
</div>

</div><!-- .main-container -->

<!--Samayoa-->
<!-- jQuery y Bootstrap JS -->

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.16/jspdf.plugin.autotable.min.js"></script>
</body>
</html>

<?php include '../../controladores/eventos.php'; ?>