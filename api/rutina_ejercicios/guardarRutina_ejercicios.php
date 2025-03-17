<?php
error_reporting(E_ALL);
require_once '../conexion.php';
$obj = json_decode(file_get_contents("php://input")); 
$stmt = $db->prepare("INSERT INTO rutina_ejercicios (rutina_id, ejercicio_id, repeticiones, series, descanso_segundos) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param('iiiii', $obj->rutina_id, $obj->ejercicio_id, $obj->repeticiones, $obj->series, $obj->descanso_segundos);
if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Registro exitoso"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error al registrar la rutina"]);
}
$stmt->close();
?>
