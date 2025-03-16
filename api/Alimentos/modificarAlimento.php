<?php
error_reporting(E_ALL);
require_once '../conexion.php';

$obj = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("UPDATE alimentos SET nombre=?, calorias=?, proteinas=?, carbohidratos=?, grasas=? WHERE id=?");
$stmt->bind_param('sssssi', $obj->nombre, $obj->calorias, $obj->proteinas, $obj->carbohidratos, $obj->grasas, $obj->id);
$stmt->execute();
$stmt->close();
echo "Registro modificado";
?>
