<?php
error_reporting(E_ALL);
require_once '../conexion.php';
$obj = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("INSERT INTO progreso(usuario_id, fecha, peso, grasa_corporal, musculo) VALUES(?, ?, ?, ?, ?)");
$stmt->bind_param('isddd', $obj->usuario_id, $obj->fecha, $obj->peso, $obj->grasa_corporal, $obj->musculo);
$stmt->execute();
$stmt->close();
echo "Registro exitoso";
?>
