<?php
error_reporting(E_ALL);
require_once '../conexion.php';

$obj = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("SELECT id, usuario_id, nombre, descripcion, fecha_creacion FROM dietas WHERE usuario_id = ?");
$stmt->bind_param('i', $obj->usuario_id); 
$stmt->bind_result($id, $nombre, $descripcion, $fecha_creacion, $usuario_id);
$stmt->execute();
$arr = array();

while ($stmt->fetch()) {
    $arr[] = array(
        'id' => $id,
        'usuario_id' => $usuario_id,
        'nombre' => $nombre,
        'descripcion' => $descripcion,
        'fecha_creacion' => $fecha_creacion,
        'usuario_id' => $usuario_id
    );
}

$stmt->close();
echo json_encode($arr);
?>
