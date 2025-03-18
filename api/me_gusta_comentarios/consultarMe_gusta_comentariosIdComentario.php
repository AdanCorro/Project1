<?php
error_reporting(E_ALL);
require_once '../conexion.php';
$obj = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("SELECT id, id_comentario, id_usuario, fecha_like FROM me_gusta_comentarios WHERE id_comentario = ?");
$stmt->bind_param('i', $obj->id_comentario);
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
