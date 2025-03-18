<?php
error_reporting(E_ALL);
require_once '../conexion.php';
$obj = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("INSERT INTO me_gusta_comentarios(id_comentario, id_usuario, fecha_like) VALUES(?, ?, NOW())");
$stmt->bind_param('ii', $obj->id_comentario, $obj->id_usuario);
$stmt->execute();
$stmt->close();
echo "Registro exitoso";
?>
