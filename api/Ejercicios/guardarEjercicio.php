<?php
error_reporting(E_ALL);
require_once '../conexion.php';
$obj = json_decode(file_get_contents("php://input")); 
$stmt=$db->prepare("INSERT INTO ejercicios(nombre, descripcion, categoria, musculo_principal, video_url) 
 VALUES(?,?,?,?,?)");
$stmt->bind_param('sssss',$obj->nombre,$obj->descripcion,$obj->categoria,$obj->musculo_principal,$obj->video_url);
$stmt->execute();
$stmt->close();
echo "Registro exitoso";
?>