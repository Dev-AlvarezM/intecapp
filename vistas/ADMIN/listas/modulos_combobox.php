<?php
// Opciones del selector "Módulo" en Agregar Mantenimiento.
// Toma los módulos que ya se escribieron en Eventos (solo eventos presenciales,
// porque en los virtuales ese dato es una URL). Se muestran sin repetir.
include('../../modelos/db.php');

$sql = "SELECT TRIM(Modulo) AS modulo
        FROM eventos
        WHERE modalidad <> 'Virtual'
          AND Modulo IS NOT NULL
          AND TRIM(Modulo) <> ''
        GROUP BY TRIM(Modulo)";
$query = $conn->query($sql);

$modulos = [];
if ($query) {
    while ($row = $query->fetch_assoc()) {
        $modulos[] = $row['modulo'];
    }
}
// Orden natural: "Módulo 2" antes que "Módulo 10"
natcasesort($modulos);

foreach ($modulos as $modulo) {
?>
    <option value="<?php echo htmlspecialchars($modulo, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($modulo, ENT_QUOTES, 'UTF-8'); ?></option>
<?php
}

?>

