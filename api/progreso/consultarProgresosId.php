<?php
error_reporting(E_ALL);
require_once '../conexion.php';
$obj = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("SELECT id, usuario_id, fecha, peso, grasa_corporal, musculo FROM progreso WHERE id = ?");
$stmt->bind_param('i', $obj->id);
$stmt->bind_result($id, $usuario_id, $fecha, $peso, $grasa_corporal, $musculo);
$stmt->execute();
$arr = array();
if ($stmt->fetch()) {
    $arr[] = array(
        'id' => $id,
        'usuario_id' => $usuario_id,
        'fecha' => $fecha,
        'peso' => $peso,
        'grasa_corporal' => $grasa_corporal,
        'musculo' => $musculo
    );
}
$stmt->close();
echo json_encode($arr);
?>
