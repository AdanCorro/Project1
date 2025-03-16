<?php
error_reporting(E_ALL);
require_once '../conexion.php';

$obj = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("UPDATE publicaciones SET contenido=?, imagen_url=? WHERE id=?");
$stmt->bind_param('ssi', $obj->contenido, $obj->imagen_url, $obj->id);
$stmt->execute();
$stmt->close();
echo "Registro modificado";
?>
