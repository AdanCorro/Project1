<?php
error_reporting(E_ALL);
require_once '../conexion.php';

$obj = json_decode(file_get_contents("php://input"));

$stmt = $db->prepare("SELECT id, usuario_id, nombre, descripcion, fecha_creacion FROM dietas WHERE id = ?");
$stmt->bind_param('i', $obj->id);
$stmt->bind_result($id, $usuario_id, $nombre, $descripcion, $fecha_creacion);
$stmt->execute();
$arr = array();
if ($stmt->fetch()) {
    $arr[] = array(
        'id' => $id,
        'usuario_id' => $usuario_id,
        'nombre' => $nombre,
        'descripcion' => $descripcion,
        'fecha_creacion' => $fecha_creacion
    );
}
$stmt->close();
echo json_encode($arr);
?>
