<?php

session_start();
include_once "Conexion.php";
// Obtener el ID del usuario actual y el ID del otro usuario
$usuario_actual_id = $_SESSION['id']; // Supongamos que tienes un sistema de autenticación de usuarios
$otro_usuario_id = $_SESSION['wid'] // Implementa esta función según tu lógica

// Verificar si ya existe una interacción entre estos usuarios
$sql = "SELECT id_interaccion FROM interacciones WHERE (id_usuario1 = $usuario_actual_id AND id_usuario2 = $otro_usuario_id) OR (id_usuario1 = $otro_usuario_id AND id_usuario2 = $usuario_actual_id)";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    // La interacción ya existe, redirigir al chat existente
    header("Location: chat.php?user_id=" . $otro_usuario_id); // Supongamos que el chat se identifica por el ID de interacción
    exit;
} else {
    // La interacción no existe, crear un nuevo registro en la tabla de interacciones
    $sql = "INSERT INTO interacciones (id_usuario1, id_usuario2) VALUES ($usuario_actual_id, $otro_usuario_id)";
    if ($conn->query($sql) === TRUE) {
        // Redirigir al chat con la nueva interacción
        header("Location: chat.php?user_id=" . $conn->insert_id);
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
