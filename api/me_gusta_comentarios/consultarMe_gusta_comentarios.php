<?php
error_reporting(E_ALL);
require_once '../conexion.php';
$stmt = $db->prepare("SELECT id, id_comentario, id_usuario, fecha_like FROM me_gusta_comentarios");
$stmt->bind_result($id, $id_comentario, $id_usuario, $fecha_like);
$stmt->execute();
$arr = array();
while ($stmt->fetch()) {
    $arr[] = array(
        'id' => $id,
        'id_comentario' => $id_comentario,
        'id_usuario' => $id_usuario,
        'fecha_like' => $fecha_like
    );
}
$stmt->close();
echo json_encode($arr);
?>
