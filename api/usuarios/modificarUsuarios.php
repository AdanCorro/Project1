<?php
error_reporting(E_ALL);
require_once '../conexion.php';
$obj = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("UPDATE usuarios 
    SET nombre=?, ap_paterno=?, ap_materno=?, correo=?, rol=?, genero=?, altura=?, peso=?
    WHERE id=?");
$stmt->bind_param(
    'sssssssdi', 
    $obj->nombre, 
    $obj->ap_paterno, 
    $obj->ap_materno, 
    $obj->correo, 
    $obj->rol,
    $obj->genero, 
    $obj->altura, 
    $obj->peso, 
    $obj->id
);
if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Registro modificado"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error al modificar el registro"]);
}
$stmt->close();
?>
