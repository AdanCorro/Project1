<?php
error_reporting(E_ALL);
require_once '../conexion.php';

$stmt = $db->prepare("SELECT id, nombre, descripcion, categoria, musculo_principal, video_url FROM ejercicios");
$stmt->bind_result($id, $nombre, $descripcion, $categoria, $musculo_principal, $video_url);
$stmt->execute();
$arr = array();
while ($stmt->fetch()) {
    $arr[] = array(
        'id' => $id,
        'nombre' => $nombre,
        'descripcion' => $descripcion,
        'categoria' => $categoria,
        'musculo_principal' => $musculo_principal,
        'video_url' => $video_url
    );
}
$stmt->close();
echo json_encode($arr);
?>
