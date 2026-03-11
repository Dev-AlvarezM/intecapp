<?php 
// Incluir componentes principales de la página
include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php';

// Obtener el estado del filtro desde la solicitud, o establecer "General" por defecto
if(isset($_REQUEST['estado']))
{
    $estado=$_REQUEST['estado'];
}else{
    $estado='General';
}

// Construir la URL para el reporte PDF incluyendo el estado actual
$url = "pdf/mantenimiento_pdf.php?estado=".$estado;

?>

<!-- Mostrar título dinámico según el filtro seleccionado -->
<?php if ($estado == "Pendiente") { ?>
    <h1>Mantenimientos Pendientes </h1>
<?php }elseif ($estado == "Realizados") { ?>
    <h1>Mantenimientos Realizados </h1>
<?php }elseif ($estado == "Mes") { ?>
    <h1>Mantenimientos Por Mes Actual </h1>
<?php }elseif ($estado == "Rango") { ?>
    <h1>Mantenimientos por Rango de Fechas </h1>
    <!-- Formulario para búsqueda por rango de fechas -->
    <div class="container-fluid">

       <form method="post" action="MANTENIMIENTO.php?estado=Rango" enctype="multipart/form-data" class="form-horizontal">
  
            <!-- Campo para fecha inicio -->
            <div class="col-md-8 btn-print">
                <div class="form-group">
                    <label  class="col-sm-3 control-label">Fecha inicio</label>
                    <div class="input-group col-sm-3">
                        <input type="date" class="form-control pull-right"  name="fecha_inicio"  required >
                    </div><!-- /.input group -->
                </div><!-- /.form group -->
            </div>
            
            <!-- Campo para fecha final -->
            <div class="col-md-8 btn-print">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Fecha final</label>
                    <div class="input-group col-sm-3">
                        <input type="date" class="form-control pull-right" name="fecha_final"  required >
                    </div><!-- /.input group -->
                </div><!-- /.form group -->
            </div>

            <!-- Botón para buscar entre fechas -->
            <div class="col-md-8 btn-print">
                <div class="form-group">
                    <button class="btn btn-danger btn-print"   name="buscar_fechas">BUSCAR ENTRE FECHAS</button>
                </div><!-- /.form group -->
            </div>

        </form>
        <?php
        // Si se envió el formulario de búsqueda por rango, actualizar la URL del reporte
        if(isset($_POST['buscar_fechas']))
        {
            $fecha_inicio = $_POST['fecha_inicio'];
            $fecha_final = $_POST['fecha_final'];
            // Actualizar URL del reporte incluyendo las fechas seleccionadas
            $url = "pdf/mantenimiento_pdf.php?estado=".$estado."&fecha_inicio=".$fecha_inicio."&fecha_final=".$fecha_final;
 
            echo "<h4>Fecha  inicio:  ".date("d/m/Y", strtotime($fecha_inicio))."</h4>      <h4>Fecha final:  ".date("d/m/Y", strtotime($fecha_final))."</h4>";
        }
        ?>
    </div> 

<?php }elseif ($estado == "General") { ?>
    <h1>Mantenimientos</h1>
<?php } ?>

<!-- Sección de botones de filtro y acciones -->
<div class="container-fluid">
    <div class="mb-3 text-right">
            <!-- Botón para filtro: General -->
            <a href="../ADMIN/MANTENIMIENTO.php?estado=General" 
               class="btn btn-primary" 
               style="display: inline-block; width: 120px; padding: 10px 0; background-color: #007bff; color: white;
                      font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center; margin-right: 10px;">
                <i class="fa fa-calendar-plus"></i> General
            </a>

            <!-- Botón para filtro: Pendientes -->
            <a href="../ADMIN/MANTENIMIENTO.php?estado=Pendiente" 
               class="btn btn-primary" 
               style="display: inline-block; width: 120px; padding: 10px 0; background-color: #007bff; color: white;
                      font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center; margin-right: 10px;">
                <i class="fa fa-calendar-plus"></i> Pendientes
            </a>

            <!-- Botón para filtro: Realizados -->
            <a href="../ADMIN/MANTENIMIENTO.php?estado=Realizados" 
               class="btn btn-primary" 
               style="display: inline-block; width: 120px; padding: 10px 0; background-color: #007bff; color: white;
                      font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center; margin-right: 10px;">
                <i class="fa fa-calendar-plus"></i> Realizados
            </a>
            
            <!-- Botón para filtro: Por Mes -->
            <a href="../ADMIN/MANTENIMIENTO.php?estado=Mes" 
               class="btn btn-primary" 
               style="display: inline-block; width: 120px; padding: 10px 0; background-color: #007bff; color: white;
                      font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center; margin-right: 10px;">
                <i class="fa fa-calendar-plus"></i> Por Mes
            </a>            

            <!-- Botón para filtro: Por Rango de Fechas -->
            <a href="../ADMIN/MANTENIMIENTO.php?estado=Rango" 
               class="btn btn-primary" 
               style="display: inline-block; width: 120px; padding: 10px 0; background-color: #007bff; color: white;
                      font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center; margin-right: 10px;">
                <i class="fa fa-calendar-plus"></i> Por Rango
            </a>

            <!-- BOTÓN DE REPORTE: Genera PDF con todos los registros del filtro actual -->
            <button type="button" 
                    class="btn btn-primary" 
                    style="display: inline-block; width: 120px; padding: 10px 0; background-color: #007bff; color: white;
                           font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center; margin-right: 10px;"
                    onclick="window.location.href='<?php echo $url;?>'">
                <i class="fas fa-print"></i> Reporte
            </button>

        <?php if ($user['cargo'] == "Admin") { ?>
            <!-- Botón para agregar nuevo mantenimiento (solo para Admins) -->
            <a href="../ADMIN/AGREGAR MANTENIMIENTO.php" 
               class="btn btn-primary" 
               style="display: inline-block; width: 120px; padding: 10px 0; background-color: #007bff; color: white;
                      font-size: 13px; font-family: 'Times New Roman', serif; text-decoration: none; border-radius: 1px; text-align: center; margin-right: 10px;">
                <i class="fa fa-calendar-plus"></i> Agregar
            </a>
            
        <?php
        }
 ?>
    </div>
</div>
            
        <!-- Tabla con lista de mantenimientos -->
        <div class="container-fluid">
            <table id="table-edit" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Año</th>
                        <th>Nombre del Encargado</th>
                        <th>Taller</th>
                        <th>Fecha de Reporte</th>
                        <th>Fecha de Realizado</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Acciones</th> 
                    </tr>
                </thead>
                <tbody>
                    
                <?php include 'listas/mantenimiento_list.php'; ?>

                </tbody>
            </table>
        </div> <br><br>
                
       

</div>
        <!-- Pie de página -->
        <footer>
            <p>&copy; INTECAP, QUICHÉ</p>
        </footer>
        <?php include 'footer.php'; ?>
</div><!-- .main-container -->
    </div><!-- .main-container -->
    <!-- jQuery y Bootstrap JS -->
     <!--Samayoa-->

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php include '../../controladores/mantenimiento.php'; ?>