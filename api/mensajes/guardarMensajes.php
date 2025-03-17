<?php
error_reporting(E_ALL);
require_once '../conexion.php';
$obj = json_decode(file_get_contents("php://input")); 
$stmt = $db->prepare("INSERT INTO mensajes (id_remitente, id_destinatario, contenido) VALUES (?, ?, ?)");
$stmt->bind_param('iis', $obj->id_remitente, $obj->id_destinatario, $obj->contenido);
if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Registro exitoso"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error al registrar la rutina"]);
}
$stmt->close();
?>
