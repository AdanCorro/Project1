<?php
error_reporting(E_ALL);
require_once '../conexion.php';

$obj = json_decode(file_get_contents("php://input"));

$stmt = $db->prepare("UPDATE notificaciones SET id_usuario=?, tipo=?, id_referencia=?, mensaje=?, leido=? WHERE id=?");
$stmt->bind_param('iiissi', $obj->id_usuario, $obj->tipo, $obj->id_referencia, $obj->mensaje, $obj->leido, $obj->id);
// Hay Duda??? que valores deben de ser

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Registro modificado"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error al modificar el registro", "error" => $stmt->error]);
}

$stmt->close();
