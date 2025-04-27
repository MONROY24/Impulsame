<?php

session_start();
include_once "Conexion.php";
$usuario_actual_id = $_SESSION['id'];
$otro_usuario_id = $_SESSION['wid']; 
$sql = "SELECT id_interaccion FROM interacciones WHERE (id_usuario1 = $usuario_actual_id AND id_usuario2 = $otro_usuario_id) OR (id_usuario1 = $otro_usuario_id AND id_usuario2 = $usuario_actual_id)";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    
    header("Location: chat.php?user_id=" . $otro_usuario_id);
    exit;
} else {
    $sql = "INSERT INTO interacciones (id_usuario1, id_usuario2) VALUES ($usuario_actual_id, $otro_usuario_id)";
    if ($conexion->query($sql) === TRUE) {
        header("Location: chat.php?user_id=" . $otro_usuario_id);
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
