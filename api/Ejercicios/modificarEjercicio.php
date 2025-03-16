<?php
error_reporting(E_ALL);
require_once '../conexion.php';

$obj = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("UPDATE ejercicios SET nombre=?, descripcion=?, categoria=?, musculo_principal=?, video_url=? WHERE id=?");
$stmt->bind_param('sssssi', $obj->nombre, $obj->descripcion, $obj->categoria, $obj->musculo_principal, $obj->video_url, $obj->id);
$stmt->execute();
$stmt->close();
echo "Registro modificado";
?>
