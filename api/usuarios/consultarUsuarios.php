<?php
error_reporting(E_ALL);
require_once '../conexion.php';
$stmt = $db->prepare("SELECT id,nombre,ap_paterno, ap_materno, correo, fecha_nacimiento, genero, altura, peso FROM usuarios");
$stmt->bind_result($id,$nombre,$ap_paterno,$ap_materno,$correo, $fecha_nacimiento, $genero, $altura, $peso);
$stmt->execute();
$arr = array();
while($stmt->fetch()){
$arr[] = array('id' =>$id, 
    'nombre' =>$nombre,
    'ap_paterno' =>$ap_paterno,
    'ap_materno' =>$ap_materno,
    'correo' =>$correo,
    'fecha_nacimiento' =>$fecha_nacimiento,
    'genero' =>$genero,
    'altura' =>$altura,
    'peso' =>$peso,
);
}
$stmt->close();
echo json_encode($arr);
?>