<?php
error_reporting(E_ALL);
require_once '../conexion.php';
$obj = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("SELECT id, dieta_id, alimento_id, cantidad FROM dieta_alimentos WHERE id = ?");
$stmt->bind_param('i', $obj->id);
$stmt->bind_result($id, $dieta_id, $alimento_id, $cantidad);
$stmt->execute();
$arr = array();
if ($stmt->fetch()) {
    $arr[] = array(
        'id' => $id,
        'dieta_id' => $dieta_id,
        'alimento_id' => $alimento_id,
        'cantidad' => $cantidad
    );
}
$stmt->close();
echo json_encode($arr);
?>
