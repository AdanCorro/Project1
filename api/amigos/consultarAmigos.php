<?php
error_reporting(E_ALL);
require_once '../conexion.php';
$stmt = $db->prepare("SELECT id, id1_usuario, id2_usuario, estado, fecha_solicitud FROM amigos");
$stmt->bind_result($id, $id1_usuario, $id2_usuario, $estado, $fecha_solicitud);
$stmt->execute();
$arr = array();
while ($stmt->fetch()) {
    $arr[] = array(
        'id' => $id,
        'id1_usuario' => $id1_usuario,
        'id2_usuario' => $id2_usuario,
        'estado' => $estado,
        'fecha_solicitud' => $fecha_solicitud
    );
}
$stmt->close();
echo json_encode($arr);
?>
