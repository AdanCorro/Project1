<?php
error_reporting(E_ALL);
require_once '../conexion.php';
$stmt = $db->prepare("SELECT id, dieta_id, alimento_id, cantidad FROM dieta_alimentos");
$stmt->bind_result($id, $dieta_id, $alimento_id, $cantidad);
$stmt->execute();
$arr = array();
while ($stmt->fetch()) {
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
