<?php
require 'conexion.php';
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
}
require 'conexion.php';
$tipo_usuario = $_SESSION['rol'];

$nombre = $_POST['nombre'];
$texto = $_POST['texto'];
$fecha = $_POST['fecha'];
if($tipo_usuario == 1){
    $insertarDatos = "INSERT INTO parajoss (id, nombre, texto, fecha) VALUES ('NULL', '$nombre', '$texto', '$fecha')";
    $ejecutarInsertar = mysqli_query($conn, $insertarDatos);
    mysqli_close($conn);
    header('location: ver.php');
} else{
    $insertarDatos = "INSERT INTO paramanu (id, nombre, texto, fecha) VALUES ('NULL', '$nombre', '$texto', '$fecha')";
    $ejecutarInsertar = mysqli_query($conn, $insertarDatos);
    mysqli_close($conn);
    header('location: ver.php');
}

?>