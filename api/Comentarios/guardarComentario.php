<?php
error_reporting(E_ALL);
require_once '../conexion.php';
$obj = json_decode(file_get_contents("php://input")); 
$stmt=$db->prepare("INSERT INTO comentarios(id_publicacion, id_usuario, contenido, fecha_comentario)
 VALUES(?,?,?,NOW())");
$stmt->bind_param('iis',$obj->id_publicacion,$obj->id_usuario,$obj->contenido);
$stmt->execute();
$stmt->close();
echo "Registro exitoso";
?>