<?php
error_reporting(E_ALL);
require_once '../conexion.php';

$obj = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("UPDATE comentarios SET contenido=? WHERE id=?");
$stmt->bind_param('si', $obj->contenido, $obj->id);
$stmt->execute();
$stmt->close();
echo "Registro modificado";
?>
