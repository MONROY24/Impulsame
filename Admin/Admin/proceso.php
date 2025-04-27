<?php
session_start();

include('Cone.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $query = "SELECT * FROM usuarios WHERE username = ? AND password = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("ss", $usuario, $contrasena);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        
        $_SESSION['username'] = $usuario;
        header("Location: admin.php"); 
        exit();
    } else {
        
        $_SESSION['error_message'] = "Usuario o contraseña incorrectos.";
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>
