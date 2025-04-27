<?php
session_start();
include_once "config.php";
$outgoing_id = $_SESSION['id'];

// Modifica la consulta SQL para seleccionar los usuarios con los que has interactuado.
$sql = "SELECT u.* 
        FROM perfil u
        INNER JOIN interacciones i ON u.ID_Perfil = i.id_usuario1 OR u.ID_Perfil= i.id_usuario2
        WHERE NOT u.ID_perfil = {$outgoing_id}
        AND (i.id_usuario1 = {$outgoing_id} OR i.id_usuario2 = {$outgoing_id})
        ORDER BY i.id_interaccion ASC";

$query = mysqli_query($conexion, $sql);
if (!$query) {
    die("Error en la consulta SQL: " . mysqli_error($conn));
}

$output = "";

if (mysqli_num_rows($query) == 0) {
    $output .= "No users are available to chat";
} elseif (mysqli_num_rows($query) > 0) {
    include_once "data.php";
}

echo $output;
?>