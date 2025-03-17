<?php
error_reporting(E_ALL);
require_once '../conexion.php';
$obj = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("SELECT id, rutina_id, ejercicio_id, repeticiones, series, descanso_segundos
FROM rutina_ejercicios WHERE id = ?");
$stmt->bind_param('i', $obj->id);
$stmt->bind_result($id, $rutina_id, $ejercicio_id, $repeticiones, $series, $descanso_segundos);
$stmt->execute();
$arr = array();
while ($stmt->fetch()) {
    $arr[] = array(
        'id' => $id, 
        'rutina_id' => $rutina_id,
        'ejercicio_id' => $ejercicio_id,
        'repeticiones' => $repeticiones,
        'series' => $series,
        'descanso_segundos' => $descanso_segundos
    );
}
$stmt->close();
echo json_encode($arr);
?>
