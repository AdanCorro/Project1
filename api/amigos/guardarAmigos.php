<?php
error_reporting(E_ALL);
require_once '../conexion.php';
$obj = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("INSERT INTO amigos(id1_usuario, id2_usuario, estado, fecha_solicitud) VALUES(?, ?, 'Pendiente', NOW())");
$stmt->bind_param('ii', $obj->id1_usuario, $obj->id2_usuario);
$stmt->execute();
$stmt->close();
echo "Registro exitoso";
?>
