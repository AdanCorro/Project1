<?php
error_reporting(E_ALL);
require_once '../conexion.php';

$stmt = $db->prepare("SELECT id, nombre, calorias, proteinas, carbohidratos, grasas FROM alimentos");
$stmt->bind_result($id, $nombre, $calorias, $proteinas, $carbohidratos, $grasas);
$stmt->execute();
$arr = array();
while ($stmt->fetch()) {
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
