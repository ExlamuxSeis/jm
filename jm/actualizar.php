<?php
require 'conexion.php';
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
}
$id = $_POST['id'];
$tabla = $_POST['tabla'];
$tipo_usuario = $_SESSION['rol'];

$nombre = $_POST['nombre'];
$texto = $_POST['texto'];
$fecha = $_POST['fecha'];
$editados = $_POST['editados'];
if($tipo_usuario == 1){
    $stmt = $conn->prepare("UPDATE $tabla SET nombre = ?, texto = ?, fecha = ?, editados = ? WHERE id = ?");
    $stmt->bind_param("sssii",$nombre, $texto, $fecha,$editados, $id);
    $stmt->execute();
    // Redirigir al usuario a la página de lista de productos
    header('location: ver.php');
    mysqli_close($conn);
} else{
    $stmt = $conn->prepare("UPDATE $tabla SET nombre = ?, texto = ?, fecha = ?, editados = ? WHERE id = ?");
    $stmt->bind_param("sssii",$nombre, $texto, $fecha, $editados, $id);
    $stmt->execute();
    // Redirigir al usuario a la página de lista de productos
    header('location: ver.php');
    mysqli_close($conn);
}

?>