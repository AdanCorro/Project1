<?php
error_reporting(E_ALL);
require_once '../conexion.php';
$obj = json_decode(file_get_contents("php://input")); 
$stmt = $db->prepare("INSERT INTO rutinas (nombre, descripcion, usuario_id) VALUES (?, ?, ?)");
$stmt->bind_param('ssi', $obj->nombre, $obj->descripcion, $obj->usuario_id);
if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Registro exitoso"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error al registrar la rutina"]);
}
$stmt->close();
?>
