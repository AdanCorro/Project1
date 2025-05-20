<?php
error_reporting(E_ALL);
require_once '../conexion.php';

header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");

$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';

if ($categoria !== '') {
    $stmt = $db->prepare("SELECT id, nombre, descripcion, categoria, musculo_principal, video_url FROM ejercicios WHERE categoria = ?");
    $stmt->bind_param("s", $categoria);
} else {
    $stmt = $db->prepare("SELECT id, nombre, descripcion, categoria, musculo_principal, video_url FROM ejercicios");
}

$stmt->execute();
$stmt->bind_result($id, $nombre, $descripcion, $categoria, $musculo_principal, $video_url);

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
