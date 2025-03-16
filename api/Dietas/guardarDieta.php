<?php
error_reporting(E_ALL);
require_once '../conexion.php';
$obj = json_decode(file_get_contents("php://input")); 
$stmt=$db->prepare("INSERT INTO dietas(usuario_id, nombre, descripcion, fecha_creacion)
 VALUES(?,?,?,NOW())");
$stmt->bind_param('sss',$obj->usuario_id,$obj->nombre,$obj->descripcion);
$stmt->execute();
$stmt->close();
echo "Registro exitoso";
?>