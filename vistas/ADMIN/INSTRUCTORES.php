<?php include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?>
<link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']; ?>/intecapp/wwwroot/AGREGAR%20USUARIO.css">

<h1>Instructores</h1>


<div class="container-fluid">
    <div class="container-fluid">
        <div class="mb-3 text-right">
            <button type="button" class="btn-reporte"
                onclick="window.location.href='pdf/instructores_pdf.php'">
                <i class="fas fa-print"></i> Reporte
        </button>
     </div>

    <div class="container-fluid">
        <table id="table-edit" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Foto</th>
                    <th>Nombre del Instructor</th>
                    <th>Teléfono</th>
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

</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php include '../../controladores/instructor.php'; ?>