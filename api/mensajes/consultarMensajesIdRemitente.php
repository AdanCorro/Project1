<?php
error_reporting(E_ALL);
require_once '../conexion.php';

$obj = json_decode(file_get_contents("php://input"));

$stmt = $db->prepare("SELECT id, id_remitente, id_destinatario, contenido, fecha_envio 
FROM mensajes WHERE id_remitente = ?");

$stmt->bind_param('i', $obj->id_remitente);
$stmt->bind_result($id, $id_remitente, $id_destinatario, $contenido, $fecha_envio);
$stmt->execute();

$arr = array();
while ($stmt->fetch()) {
    $arr[] = array(
        'id' => $id, 
        'id_remitente' => $id_remitente,
        'id_destinatario' => $id_destinatario,
        'contenido' => $contenido,
        'fecha_envio' => $fecha_envio
    );
}

$stmt->close();
echo json_encode($arr);
?>
