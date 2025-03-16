<?php
error_reporting(E_ALL);
require_once '../conexion.php';
$obj = json_decode(file_get_contents("php://input")); 
$stmt=$db->prepare("INSERT INTO alimentos(nombre, calorias, proteinas, carbohidratos, grasas)
 VALUES(?,?,?,?,?)");
$stmt->bind_param('sssss',$obj->nombre,$obj->calorias,$obj->proteinas,$obj->carbohidratos,$obj->grasas);
$stmt->execute();
$stmt->close();
echo "Registro exitoso";
?>