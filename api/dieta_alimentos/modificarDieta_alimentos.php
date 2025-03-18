<?php
error_reporting(E_ALL);
require_once '../conexion.php';
$obj = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("UPDATE dieta_alimentos SET dieta_id=?, alimento_id=?, cantidad=? WHERE id=?");
$stmt->bind_param('iisi', $obj->dieta_id, $obj->alimento_id, $obj->cantidad, $obj->id);
$stmt->execute();
$stmt->close();
echo "Registro modificado";
?>
