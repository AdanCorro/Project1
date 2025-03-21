<?php
error_reporting(E_ALL);
require_once 'conexion.php';
$obj = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("INSERT INTO usuarios 
    (nombre, ap_paterno, ap_materno, correo, password, fecha_nacimiento, genero, altura, peso) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$pass = md5($obj->password);
$stmt->bind_param(
    'sssssssdd',
    $obj->nombre,
    $obj->ap_paterno,
    $obj->ap_materno,
    $obj->correo,
    $pass,
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
