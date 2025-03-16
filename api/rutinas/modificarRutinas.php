<?php
error_reporting(E_ALL);
require_once '../conexion.php';
$obj = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("UPDATE rutinas SET nombre=?, descripcion=?, usuario_id=? WHERE id=?");
$stmt->bind_param('ssii', $obj->nombre, $obj->descripcion, $obj->usuario_id, $obj->id);
if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Registro modificado"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error al modificar el registro"]);
}
$stmt->close();
?>
