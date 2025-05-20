<?php
error_reporting(E_ALL);
require_once '../conexion.php';
$stmt = $db->prepare("SELECT id, nombre, ap_paterno, ap_materno, correo, rol, genero, altura, peso, fecha_registro FROM usuarios");
$stmt->bind_result($id,$nombre,$ap_paterno,$ap_materno,$correo, $rol, $genero, $altura, $peso, $fecha_registro);
$stmt->execute();
$arr = array();
while($stmt->fetch()){
$arr[] = array('id' =>$id, 
    'nombre' =>$nombre,
    'ap_paterno' =>$ap_paterno,
    'ap_materno' =>$ap_materno,
    'correo' =>$correo,
    'rol' =>$rol,
    'genero' =>$genero,
    'altura' =>$altura,
    'peso' =>$peso,
    'fecha_registro' =>$fecha_registro
);
}
$stmt->close();
echo json_encode($arr);
?>