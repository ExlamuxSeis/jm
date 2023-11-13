<?php
require 'conexion.php';
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}
    $tabla = $_GET['table'];
    $id = $_GET['id'];
        // Actualizar la fila correspondiente en la base de datos
        $stmt = $conn->prepare("DELETE FROM $tabla WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();

        header('Location: ver.php');

        mysqli_close($conn);
?>