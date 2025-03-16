<?php
error_reporting(E_ALL);
require_once '../conexion.php';

$obj = json_decode(file_get_contents("php://input"));

$stmt = $db->prepare("SELECT id, nombre, calorias, proteinas, carbohidratos, grasas FROM alimentos WHERE id = ?");
$stmt->bind_param('i', $obj->id);
$stmt->bind_result($id, $nombre, $calorias, $proteinas, $carbohidratos, $grasas);
$stmt->execute();
$arr = array();
if ($stmt->fetch()) {
    $arr[] = array(
        'id' => $id,
        'nombre' => $nombre,
        'calorias' => $calorias,
        'proteinas' => $proteinas,
        'carbohidratos' => $carbohidratos,
        'grasas' => $grasas
    );
}
$stmt->close();
echo json_encode($arr);
?>
