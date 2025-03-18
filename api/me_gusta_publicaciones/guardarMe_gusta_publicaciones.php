<?php
error_reporting(E_ALL);
require_once '../conexion.php';
$obj = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("INSERT INTO me_gusta_publicaciones(id_publicacion, id_usuario, fecha_like) VALUES(?, ?, NOW())");
$stmt->bind_param('ii', $obj->id_publicacion, $obj->id_usuario);
$stmt->execute();
$stmt->close();
echo "Registro exitoso";
?>
