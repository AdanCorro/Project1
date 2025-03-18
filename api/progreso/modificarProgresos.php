<?php
error_reporting(E_ALL);
require_once '../conexion.php';
$obj = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("UPDATE progreso SET fecha=?, peso=?, grasa_corporal=?, musculo=? WHERE id=?");
$stmt->bind_param('sdddd', $obj->fecha, $obj->peso, $obj->grasa_corporal, $obj->musculo, $obj->id);
$stmt->execute();
$stmt->close();
echo "Registro modificado";
?>
