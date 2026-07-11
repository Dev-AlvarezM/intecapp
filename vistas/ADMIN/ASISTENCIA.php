<?php include 'header.php'; ?>
<?php include 'nav_bar.php'; ?>
<?php include 'menu.php'; ?>

<?php
$rolUsuario = isset($user['cargo']) ? trim($user['cargo']) : '';
// Normalizar a minúsculas para evitar problemas de mayúsculas/espacios
$rolUsuario = strtolower($rolUsuario);
?>

<h1>Asistencia</h1>
   
<div class="container-fluid">

    <div class="mb-3 d-flex justify-content-between align-items-center flex-wrap" style="gap:8px;">

    <?php if (in_array($rolUsuario, ['admin','instructor'])) { ?>
        <button type="button" class="btn btn-primary" style="display: inline-block; width: 120px; padding: 10px 0; background-color: #007bff; color: white; 
                font-size: 13px; font-family: Arial, Helvetica, sans-serif; text-decoration: none; border-radius: 4px; text-align: center;" onclick="generarReporte()">
                <i class="fas fa-print"></i> Reporte
        </button>
    <?php } ?>    

        <?php if (in_array($rolUsuario, ['admin','instructor'])) { ?>
            <div style="display:flex; gap:10px; flex-wrap:wrap; width: 100%;">
                
                <div class="input-group input-group-sm" style="width: 180px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input type="date" id="filtro-fecha" class="form-control" onchange="filtrarTabla()" title="Elegir Fecha">
                </div>
            
                <?php if ($rolUsuario == "admin") { ?>
                    <div class="input-group input-group-sm" style="width: 220px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-tools"></i></span>
                        </div>
                        <select id="filtro-taller" class="form-control" onchange="filtrarTabla()">
                            <option value="">Todos los talleres</option>
                            </select>
                    </div>

                    <div class="input-group input-group-sm" style="width: 220px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <select id="filtro-instructor" class="form-control" onchange="filtrarTabla()">
                            <option value="">Todos los instructores</option>
                            </select>
                    </div>
            <?php } ?>    

                <button onclick="limpiarFiltros()" class="btn btn-sm btn-danger">
                    <i class="fa fa-times"></i> Limpiar
                </button>
            </div>
        <?php } ?>
    </div>

   <div class="container-fluid table-responsive-lg">
       <table id="table-edit" class="table table-bordered table-hover">
           <thead>
               <tr>
                   <th>Fecha</th> 
                   <th>Taller</th> 
                   <th>Evento</th> 
                   <th>Nombre</th> 
                   <th>Cargo</th>
                   <th>Usuario sesión</th>
                   <th>Modalidad</th>
                   <th>Estadia</th>
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
</div>
   
   <footer>
       <p>&copy; INTECAP, QUICHÉ</p>
   </footer>
</div>

<?php include 'footer.php'; ?>
</div>

<script>
    // Usamos jQuery que ya viene con DataTables
    $(document).ready(function() {
        // Conectamos el script con tu tabla paginada
        var table = $('#table-edit').DataTable();

        // 1. Cargamos los selectores leyendo TODAS las páginas de DataTables
        cargarOpcionesDinamicas(table);

        // 2. Le decimos a los filtros que busquen cada vez que cambien de valor
        $('#filtro-fecha, #filtro-taller, #filtro-instructor').on('change', function() {
            filtrarTabla(table);
        });
    });

    // Función para extraer datos de toda la base de la tabla (incluso lo oculto)
    function cargarOpcionesDinamicas(table) {
        var selectTaller = $('#filtro-taller');
        var selectInstructor = $('#filtro-instructor');

        // Extraer valores únicos de la Columna 1 (Taller) y llenar el select
        table.column(1).data().unique().sort().each(function(d, j) {
            // Limpiamos etiquetas HTML por si acaso y verificamos que no esté vacío
            var valor = $(d).text() || d; 
            if(valor.trim() !== '') {
                selectTaller.append('<option value="' + valor.trim() + '">' + valor.trim() + '</option>');
            }
        });

        // Extraer valores únicos de la Columna 3 (Nombre/Instructor) y llenar el select
        table.column(3).data().unique().sort().each(function(d, j) {
            var valor = $(d).text() || d;
            if(valor.trim() !== '') {
                selectInstructor.append('<option value="' + valor.trim() + '">' + valor.trim() + '</option>');
            }
        });
    }

    // Función que aplica el filtro usando el buscador interno de DataTables
    function filtrarTabla(table) {
        var filtroFecha = $('#filtro-fecha').val();
        var filtroTaller = $('#filtro-taller').val();
        var filtroInstructor = $('#filtro-instructor').val();

        // Para la fecha, a veces hay que adaptar el formato (YYYY-MM-DD vs DD/MM/YYYY)
        // Pero DataTables es muy inteligente con el .search()
        
        table
            .column(0).search(filtroFecha)      // Busca en la columna Fecha
            .column(1).search(filtroTaller)     // Busca en la columna Taller
            .column(3).search(filtroInstructor) // Busca en la columna Nombre
            .draw();                            // Refresca la tabla
    }

    // Función para el botón rojo de limpiar
    function limpiarFiltros() {
        $('#filtro-fecha').val('');
        $('#filtro-taller').val('');
        $('#filtro-instructor').val('');
        
        // Limpiamos las búsquedas en memoria y redibujamos la tabla a su estado original
        var table = $('#table-edit').DataTable();
        table
            .column(0).search('')
            .column(1).search('')
            .column(3).search('')
            .draw();
    }

    //Funcion para generar el reporte en PDF con los filtros aplicados
    function generarReporte() {
        // Capturamos los valores de los filtros de forma segura (pueden no existir para algunos roles)
        var fechaEl = document.getElementById('filtro-fecha');
        var fecha = fechaEl ? fechaEl.value : '';

        var tallerEl = document.getElementById('filtro-taller');
        var taller = tallerEl ? tallerEl.value : '';

        var instructorEl = document.getElementById('filtro-instructor');
        var instructor = '';
        if (instructorEl && instructorEl.selectedIndex >= 0) {
            instructor = instructorEl.options[instructorEl.selectedIndex].text || '';
            if (instructorEl.value === '') { instructor = ''; }
        }

        // Redirigimos enviando los datos por GET
        window.location.href = 'pdf/asistencia_pdf.php?fecha=' + encodeURIComponent(fecha) +
                               '&taller=' + encodeURIComponent(taller) +
                               '&instructor=' + encodeURIComponent(instructor);
    }
</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>