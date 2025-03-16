<?php
error_reporting(E_ALL);
require_once '../conexion.php';
$obj = json_decode(file_get_contents("php://input")); 
$stmt=$db->prepare("INSERT INTO publicaciones(id_usuario, contenido, imagen_url, fecha_publicacion) 
 VALUES(?,?,?,NOW())");
$stmt->bind_param('sss',$obj->id_usuario,$obj->contenido,$obj->imagen_url);
$stmt->execute();
$stmt->close();
echo "Registro exitoso";
?>