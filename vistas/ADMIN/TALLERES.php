<?php include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?>

<h1 class="admin-pilot-title">Talleres</h1>

    <div class="container-fluid admin-pilot-content">
        <!-- Botón de hipervínculo alineado a la derecha -->
        <div class="mb-3 text-right admin-pilot-actions">
        <?php
            if ($user['cargo']=="Admin") {
        ?>
            <button type="button" class="btn btn-primary" style="display: inline-block; width: 120px; padding: 10px 0; background-color: #007bff; color: white; 
                font-size: 13px; font-family: 'Arial', serif; text-decoration: none; border-radius: 4px; text-align: center;" onclick="window.location.href='pdf/talleres_pdf.php'">
                <i class="fas fa-print"></i> Reporte
            </button>
        <?php
        }else  {    
            }
        ?>

        <?php
            if (in_array($user['cargo'], ["Admin"])) {
        ?>
            <a href="../ADMIN/AGREGAR TALLER.php" class="btn btn-primary" style="display: inline-block; width: 120px; padding: 10px 0; background-color: #007bff; color: white; 
                font-size: 13px; font-family: 'Arial', serif; text-decoration: none; border-radius: 4px; text-align: center;">
                    <i class="fa fa-calendar-plus"></i> Agregar
            </a>
        <?php
        }
        ?>
        </div>
    <div class="container-fluid table-responsive-lg admin-pilot-table-wrap">
        <table id="table-edit" class="table table-bordered table-hover rounded overflow-hidden admin-pilot-table">
            <thead>
                <tr>
                    <th>Año</th>
                    <th>Nombre del Taller</th>
                    <th>Instructor a Cargo</th>
                    <th>Capacidad</th>
                    <th>Condición</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            
            <tbody>
                <?php include('listas/talleres_list.php'); ?>
            </tbody>
        </table>

    </div>
<!-- Sección donde se coloca el gráfico -->
<div class="chart-container admin-pilot-chart">
    <canvas id="barChart"></canvas>
</div>

<div class="container-fluid">
    <!-- Pie de página -->
    <?php include 'footer.php'; ?>
</div>

</div><!-- .main-container -->
<!-- jQuery y Bootstrap JS (importante para el menú desplegable) -->

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.16/jspdf.plugin.autotable.min.js"></script>
<!--Samayoa-->
</body>

</html>

<?php include '../../controladores/talleres.php'; ?>