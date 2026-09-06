<?php
	include '../../modelos/db.php';

    $talleres = array();
    $participantes = array();

    $sql = "SELECT t.*, COALESCE(
                u.nombre,
                (SELECT i.nom_instructor
                 FROM instructor AS i
                 WHERE i.id_talleres = CAST(t.id AS CHAR)
                 ORDER BY i.id DESC
                 LIMIT 1)
            ) AS nom_instructor
            FROM talleres AS t
            LEFT JOIN usuario AS u ON u.id = t.id_instructor";

    $cargo = trim($user['cargo'] ?? '');
    if ($cargo === 'Instructor') {
        $areaInstructor = trim($user['area_especializacion'] ?? '');
        if ($areaInstructor !== '') {
            $areaInstructor = $conn->real_escape_string($areaInstructor);
            $sql .= " WHERE u.area_especializacion = '$areaInstructor'";
        } else {
            $idInstructor = (int) ($user['id'] ?? 0);
            $sql .= " WHERE t.id_instructor = $idInstructor";
        }
    }

    $query = $conn->query($sql);   

    if ($query) {
        while($row = $query->fetch_assoc()){
            $nombreInstructor = $row['nom_instructor'] ?: 'Sin instructor';
            array_push($talleres, $row['nombre_taller'] . ' - ' . $nombreInstructor);
            array_push($participantes, (int) ($row['participantes'] ?? 0));
        }
    }

    $talleres = json_encode($talleres, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    $participantes = json_encode($participantes);
?>



<script>
    function eliminar(id){
        let text = "¿Está seguro de que quieres eliminar?";
        if (confirm(text) == true) {
            document.location="../../modelos/taller_delete.php?id="+id;
        } else {
            alert("Elemento no eliminado");
        }
    }  

    function editar(id){
        document.location="../../vistas/ADMIN/Editar_TALLER.php?id="+id; 
    }  
</script>

<script>
    // Espera a que el DOM esté completamente cargado
    window.onload = function() {

    // Gráfico de Barras (Bar Chart)
    var canvasBar = document.getElementById('barChart');
    if (!canvasBar) {
        return;
    }
    var ctxBar = canvasBar.getContext('2d');
    
    var barChart = new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: <?php echo $talleres; ?>,
            datasets: [{
                label: 'Talleres',
                data: <?php echo $participantes; ?>,
                backgroundColor: '#1E90FF',  // Azul brillante para el fondo de las barras
                borderColor: '#4682B4',      // Azul más oscuro para el borde
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,  // Esto permite que el gráfico se ajuste al tamaño del contenedor
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    }
</script>
