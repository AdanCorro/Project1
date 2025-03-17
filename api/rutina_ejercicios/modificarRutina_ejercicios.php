<?php
error_reporting(E_ALL);
require_once '../conexion.php';
$obj = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("UPDATE rutina_ejercicios SET rutina_id=?, ejercicio_id=?, repeticiones=?, series=?, descanso_segundos=? WHERE id=?");
$stmt->bind_param('iiiiii', $obj->rutina_id, $obj->ejercicio_id, $obj->repeticiones, $obj->series, $obj->descanso_segundos, $obj->id);
if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Registro modificado"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error al modificar el registro"]);
}
$stmt->close();
?>
