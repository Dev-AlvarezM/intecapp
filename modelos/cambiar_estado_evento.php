<?php
// 1. Incluir la conexión a la base de datos
include($_SERVER['DOCUMENT_ROOT'] . '/intecapp/modelos/db.php');
include($_SERVER['DOCUMENT_ROOT'] . '/intecapp/controladores/session.php');

// 2. Validar que se haya recibido el ID del evento por la URL
if (isset($_GET['id_eventos']) && !empty($_GET['id_eventos'])) {
    
    $id_evento = intval($_GET['id_eventos']); // Convertir a entero para mayor seguridad

    // 3. Obtener toda la información requerida uniendo con la tabla talleres (usando prepared statement)
    $consulta_evento = "SELECT e.id_instructor, e.nombre_evento, e.f_inicio, e.modalidad, e.Estatilla, e.hora_entrada, e.hora_salida, t.nombre_taller 
                        FROM eventos as e 
                        INNER JOIN talleres as t ON e.id_talleres = t.id 
                        WHERE e.id_eventos = ?";
    
    $stmt = $conn->prepare($consulta_evento);
    if (!$stmt) {
        echo "Error en la preparación de la consulta: " . $conn->error;
        exit();
    }
    
    $stmt->bind_param("i", $id_evento);
    $stmt->execute();
    $resultado_evento = $stmt->get_result();

    if ($resultado_evento && $resultado_evento->num_rows > 0) {
        $evento = $resultado_evento->fetch_assoc();
        
        // Asignar los datos recuperados a variables limpias
        $id_instructor   = $evento['id_instructor'];
        $fecha_evento    = $evento['f_inicio']; 
        $nombre_taller   = $evento['nombre_taller'];
        $nombre_evento   = $evento['nombre_evento'];
        $modalidad       = $evento['modalidad'];
        $estatilla       = $evento['Estatilla'];
        $hora_entrada    = $evento['hora_entrada'];
        $hora_salida     = $evento['hora_salida'];

        // 4. Iniciar la transacción SQL
        $conn->begin_transaction();

        try {
            // ----------------------------------------------------------------
            // NUEVO: Definir el estado que se enviará a la tabla asistencia
            $estado_asistencia = "Terminado"; // Puedes cambiarlo a "Realizado" o "Asistió" si prefieres
            // ----------------------------------------------------------------

            // A) Generar la asistencia usando prepared statement (AÑADIMOS LA COLUMNA 'estado')
            $sql_asistencia = "INSERT INTO asistencia (id_usuario, fecha, nombre_taller, nombre_evento, modalidad, estatilla, hora_entrada, hora_salida, estado) 
                               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            $stmt_asistencia = $conn->prepare($sql_asistencia);
            if (!$stmt_asistencia) {
                throw new Exception("Error en la preparación de asistencia: " . $conn->error);
            }
            
            // AÑADIMOS una "s" extra en los tipos ("issssssss") y pasamos la variable $estado_asistencia al final
            $stmt_asistencia->bind_param("issssssss", $id_instructor, $fecha_evento, $nombre_taller, $nombre_evento, $modalidad, $estatilla, $hora_entrada, $hora_salida, $estado_asistencia);
            
            if (!$stmt_asistencia->execute()) {
                throw new Exception("Error al insertar en la tabla asistencia: " . $stmt_asistencia->error);
            }
            $stmt_asistencia->close();

            // B) Borrar automáticamente el evento de la tabla 'eventos'
            $sql_delete = "DELETE FROM eventos WHERE id_eventos = ?";
            
            $stmt_delete = $conn->prepare($sql_delete);
            if (!$stmt_delete) {
                throw new Exception("Error en la preparación del delete: " . $conn->error);
            }
            
            $stmt_delete->bind_param("i", $id_evento);
            
            if (!$stmt_delete->execute()) {
                throw new Exception("Error al eliminar el evento de la lista: " . $stmt_delete->error);
            }
            $stmt_delete->close();

            // C) Confirmar cambios si todo salió bien
            $conn->commit();

            // --- AQUÍ ESTÁ LA CORRECCIÓN ---
            // Usamos header() para redirigir desde el servidor antes de enviar HTML
            header("Location: ../vistas/ADMIN/EVENTOS.php");
            exit(); // Es vital poner exit() para detener el script inmediatamente

        } catch (Exception $e) {
            // Si algo falla, el rollback evita que el evento se borre
            $conn->rollback();
            echo "Hubo un problema crítico durante el procesamiento: " . $e->getMessage();
        }
        
        $stmt->close();

    } else {
        echo "<script>
                alert('El evento especificado no existe o ya fue procesado como terminado.');
                window.location.href = '../vistas/ADMIN/listas/eventos_list.php';
              </script>";
        exit();
    }

} else {
    echo "<script>
            alert('Acceso no autorizado o ID faltante.');
            window.location.href = '../vistas/ADMIN/listas/eventos_list.php';
          </script>";
    exit();
}
?>