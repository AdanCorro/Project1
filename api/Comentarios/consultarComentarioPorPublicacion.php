<?php
error_reporting(E_ALL);
require_once '../conexion.php';

$obj = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("SELECT id, id_publicacion, id_usuario, contenido, fecha_comentario FROM comentarios WHERE id_publicacion = ?");
$stmt->bind_param('i', $obj->id_publicacion); 
$stmt->bind_result($id, $id_usuario, $contenido,  $fecha_comentario, $id_publicacion);
$stmt->execute();
$arr = array();

while ($stmt->fetch()) {
    $arr[] = array(
        'id' => $id,
        'id_publicacion' => $id_publicacion,
        'id_usuario' => $id_usuario,
        'contenido' => $contenido,
        'fecha_comentario' => $fecha_comentario
    );
}

$stmt->close();
echo json_encode($arr);
?>
