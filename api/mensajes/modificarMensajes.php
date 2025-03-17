<?php
error_reporting(E_ALL);
require_once '../conexion.php';
$obj = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("UPDATE mensajes SET id_remitente=?, id_destinatario=?, contenido=? WHERE id=?");
$stmt->bind_param('iisi', $obj->id_remitente, $obj->id_destinatario, $obj->contenido, $obj->id);
if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Registro modificado"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error al modificar el registro"]);
}
$stmt->close();
?>
