<?php
error_reporting(E_ALL);
require_once '../conexion.php';
$obj = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("SELECT id, nombre, ap_paterno, ap_materno, correo, password, 
    fecha_nacimiento, genero, altura, peso, fecha_registro 
    FROM usuarios WHERE id = ?");
$stmt->bind_param('i', $obj->id);
$stmt->execute();
$stmt->bind_result($id, $nombre, $ap_paterno, $ap_materno, $correo, $password, 
    $fecha_nacimiento, $genero, $altura, $peso, $fecha_registro);
$user = null;
if ($stmt->fetch()) {
    $user = array(
        'id' => $id, 
        'nombre' => $nombre,
        'ap_paterno' => $ap_paterno,
        'ap_materno' => $ap_materno,
        'correo' => $correo,
        'password' => $password,
        'fecha_nacimiento' => $fecha_nacimiento,
        'genero' => $genero,
        'altura' => $altura,
        'peso' => $peso,
        'fecha_registro' => $fecha_registro
    );
}
$stmt->close();
echo json_encode($user ? $user : ["status" => "error", "message" => "Usuario no encontrado"]);
?>
