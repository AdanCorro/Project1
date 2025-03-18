<?php
error_reporting(E_ALL);
require_once '../conexion.php';
$obj = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("INSERT INTO notificaciones (id_usuario, tipo, id_referencia, mensaje) VALUES (?, ?, ?, ?)");
$stmt->bind_param('iiis', $obj->id_usuario, $obj->tipo, $obj->id_referencia, $obj->mensaje);
if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Registro exitoso"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error al registrar la rutina"]);
}
$stmt->close();
