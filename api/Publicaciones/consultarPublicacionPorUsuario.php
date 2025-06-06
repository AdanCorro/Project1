<?php
error_reporting(E_ALL);
require_once '../conexion.php';

$obj = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("SELECT id, id_usuario, contenido, imagen_url, fecha_publicacion FROM publicaciones WHERE id_usuario = ?");
$stmt->bind_param('i', $obj->id_usuario); 
$stmt->bind_result($id, $id_usuario, $contenido, $imagen_url, $fecha_publicacion);
$stmt->execute();
$arr = array();

while ($stmt->fetch()) {
    $arr[] = array(
        'id' => $id,
        'id_usuario' => $id_usuario,
        'contenido' => $contenido,
        'imagen_url' => $imagen_url,
        'fecha_publicacion' => $fecha_publicacion
    );
}

$stmt->close();
echo json_encode($arr);
?>
