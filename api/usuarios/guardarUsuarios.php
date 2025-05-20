<?php
error_reporting(E_ALL);
require_once '../conexion.php';

$obj = json_decode(file_get_contents("php://input"));

$pass = md5($obj->password);
$fecha = date("Y-m-d H:i:s"); // Fecha y hora actual

$stmt = $db->prepare("INSERT INTO usuarios 
    (nombre, ap_paterno, ap_materno, correo, rol, genero, altura, peso, fecha_registro, password) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
");

$stmt->bind_param(
    'ssssssddss',
    $obj->nombre,
    $obj->ap_paterno,
    $obj->ap_materno,
    $obj->correo,
    $obj->rol,
    $obj->genero,
    $obj->altura,
    $obj->peso,
    $fecha,
    $pass
);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Registro exitoso"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error en el registro: " . $stmt->error]);
}

$stmt->close();
?>
