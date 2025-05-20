<?php
error_reporting(E_ALL);
require_once 'conexion.php';

$pass = md5($_POST['pass']);

$stmt = $db->prepare("SELECT id, rol, nombre, correo FROM usuarios WHERE correo=? AND password=?");
$stmt->bind_param('ss', $_POST['correo'], $pass);
$stmt->execute();
$stmt->bind_result($id, $rol, $nombre, $correo);

if ($stmt->fetch()) {
    session_start();
    $_SESSION['usuario'] = $nombre;
    $_SESSION['id'] = $id;
    $_SESSION['rol'] = $rol;

    if ($rol == "usuario") {
        header("Location: ../app/home.php");
        exit();
    }

    if ($rol == "administrador") {
        header("Location: ../app/encabezadoAdm.php");
        exit();
    }
} else {
    header("Location: ../app/index.php");
    exit();
}

$stmt->close();
