<?php
error_reporting(E_ALL);
require_once '../conexion.php';
$obj = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("INSERT INTO dieta_alimentos(dieta_id, alimento_id, cantidad) VALUES(?, ?, ?)");
$stmt->bind_param('iis', $obj->dieta_id, $obj->alimento_id, $obj->cantidad);
$stmt->execute();
$stmt->close();
echo "Registro exitoso";
?>
