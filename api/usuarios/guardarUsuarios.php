<?php
error_reporting(E_ALL);
require_once '../conexion.php';

$obj = json_decode(file_get_contents("php://input"));

if (!$obj) {
    echo json_encode(["status" => "error", "message" => "Datos inválidos"]);
    exit;
}

// Validar que los campos requeridos estén presentes
if (!isset($obj->nombre, $obj->correo, $obj->contrasena)) {
    echo json_encode(["status" => "error", "message" => "Faltan datos obligatorios"]);
    exit;
}

// Encriptar la contraseña con password_hash en lugar de md5 (más seguro)
$hashed_password = password_hash($obj->contrasena, PASSWORD_DEFAULT);

$stmt = $db->prepare("INSERT INTO usuarios 
    (nombre, ap_paterno, ap_materno, correo, contrasena, fecha_nacimiento, genero, altura, peso) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

if (!$stmt) {
    echo json_encode(["status" => "error", "message" => "Error al preparar la consulta"]);
    exit;
}

$stmt->bind_param(
    'sssssssdd', 
    $obj->nombre, 
    $obj->ap_paterno, 
    $obj->ap_materno, 
    $obj->correo, 
    $hashed_password, 
    $obj->fecha_nacimiento, 
    $obj->genero, 
    $obj->altura, 
    $obj->peso
);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Registro exitoso"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error en el registro"]);
}

$stmt->close();
?>
