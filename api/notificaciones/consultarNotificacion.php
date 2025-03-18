<?php
error_reporting(E_ALL);
require_once '../conexion.php';
$obj = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("SELECT id, id_usuario, tipo, id_referencia, mensaje, leido, fecha_creacion
FROM notificaciones WHERE id = ?");
$stmt->bind_param('i', $obj->id);
$stmt->bind_result($id, $id_usuario, $tipo, $id_referencia, $mensaje, $leido, $fecha_creacion);
$stmt->execute();
$arr = array();
while ($stmt->fetch()) {
    $arr[] = array(
        'id' => $id,
        'id_usuario' => $id_usuario,
        'tipo' => $tipo,
        'id_referencia' => $id_referencia,
        'mensaje' => $mensaje,
        'leido' => $leido,
        'fecha_creacion' => $fecha_creacion
    );
}
$stmt->close();
echo json_encode($arr);
