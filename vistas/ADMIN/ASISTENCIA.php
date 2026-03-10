<?php include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?>

<h1>Asistencia</h1>
   

   <div class="container-fluid">
       <table id="table-edit" class="table table-bordered table-hover">
           <thead>
               <tr>
                   <th>Fecha</th>
                   <th>Taller</th>
                   <th>Evento</th>
                   <th>Nombre</th>
                   <th>Cargo</th>
                   <th>Modalidad</th>
                   <th>Estatilla</th>
                   <th>Hora Entrada</th>
                   <th>Hora salida</th>
                   <th>Estado</th> 
               </tr>
           </thead>
           <tbody>
                <?php include('listas/asistencia_list.php'); ?>
           </tbody>
       </table>
       <br><br>
   </div>
   <!--Samayoa-->
   <!-- Pie de página -->
   <footer>
       <p>&copy; INTECAP, QUICHÉ</p>
   </footer>
</div>

<?php include 'footer.php'; ?>
</div><!-- .main-container -->

<!-- jQuery y Bootstrap JS  -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>