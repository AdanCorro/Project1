<?php
error_reporting(E_ALL);
require_once '../conexion.php';

$stmt = $db->prepare("SELECT id, usuario_id, nombre, descripcion, fecha_creacion FROM dietas");
$stmt->bind_result($id, $usuario_id, $nombre, $descripcion, $fecha_creacion);
$stmt->execute();
$arr = array();
while ($stmt->fetch()) {
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
