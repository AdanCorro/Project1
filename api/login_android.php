<?php
header('Content-Type: application/json');
require_once 'conexion.php';

$response = array();

if (isset($_POST['correo']) && isset($_POST['password'])) {
    $correo = $_POST['correo'];
    $pass = md5($_POST['password']); // asegúrate de que el campo se llama 'password'

    $stmt = $db->prepare("SELECT id, rol, nombre, correo FROM usuarios WHERE correo=? AND password=?");
    $stmt->bind_param('ss', $correo, $pass);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $rol, $nombre, $correo);
        $stmt->fetch();

        $response["success"] = true;
        $response["id"] = $id;
        $response["rol"] = $rol;
        $response["nombre"] = $nombre;
        $response["correo"] = $correo;
    } else {
        $response["success"] = false;
        $response["message"] = "Credenciales incorrectas";
    }

    $stmt->close();
} else {
    $response["success"] = false;
    $response["message"] = "Faltan parámetros";
}

echo json_encode($response);
