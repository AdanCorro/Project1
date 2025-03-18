<?php
error_reporting(E_ALL);
require_once '../conexion.php';
$obj = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("UPDATE me_gusta_comentarios SET id_comentario=?, id_usuario=? WHERE id=?");
$stmt->bind_param('iii', $obj->id_comentario, $obj->id_usuario, $obj->id);
$stmt->execute();
$stmt->close();
echo "Registro modificado";
?>
