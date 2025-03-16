<?php
error_reporting(E_ALL);
require_once '../conexion.php';

$obj = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("UPDATE dietas SET nombre=?, descripcion=? WHERE id=?");
$stmt->bind_param('ssi', $obj->nombre, $obj->descripcion, $obj->id);
$stmt->execute();
$stmt->close();
echo "Registro modificado";
?>
