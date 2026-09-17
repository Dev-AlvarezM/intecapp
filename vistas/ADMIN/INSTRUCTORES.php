<?php include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?>
<link rel="stylesheet" href="/intecapp/wwwroot/css/AGREGAR_USUARIO.CSS">

<h1>Instructores</h1>


<div class="container-fluid">
    <div class="container-fluid">
        <div class="mb-3 text-right">
          <button type="button" class="btn btn-primary" style="display: inline-block; width: 120px; padding: 10px 0; background-color: #007bff; color: white; 
            font-size: 13px; font-family: 'Arial', serif; text-decoration: none; border-radius: 4px; text-align: center;" onclick="window.location.href='pdf/instructores_pdf.php'">
            <i class="fas fa-print"></i> Reporte
        </button>  
        </div>

    <div class="container-fluid table-responsive-lg admin-pilot-table-wrap">
        <table id="table-edit" class="table table-bordered table-hover rounded overflow-hidden admin-pilot-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Foto</th>
                    <th>Nombre del Instructor</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Cargo</th>
                    <th>Área de Especialización</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php include('listas/instructores_list.php'); ?>
            </tbody>
        </table>
    </div>
        <?php include 'footer.php'; ?>
    </div>
    <br><br>

</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php include '../../controladores/instructor.php'; ?>