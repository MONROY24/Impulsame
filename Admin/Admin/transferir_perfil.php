<?php
// cambiar_estado_perfil.php

include('Cone.php');

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
    $perfilId = $_GET["id"];

    // Realiza la actualización del estado del perfil en la base de datos
    $query = "UPDATE perfil SET Estado = 'Activa' WHERE ID_Perfil = $perfilId";

    if ($conexion->query($query) === TRUE) {
        // Devuelve una respuesta JSON con éxito
        $response = array("success" => true, "message" => "Estado del perfil cambiado exitosamente");
        echo json_encode($response);
    } else {
        // Devuelve una respuesta JSON de error
        $response = array("success" => false, "message" => "Error al cambiar el estado del perfil");
        echo json_encode($response);
    }
} else {
    // Devuelve una respuesta JSON de error si no se proporciona un ID válido
    $response = array("success" => false, "message" => "Error al cambiar el estado del perfil");
    echo json_encode($response);
}
?>

