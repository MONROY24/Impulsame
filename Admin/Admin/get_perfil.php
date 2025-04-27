<?php
include('Cone.php');

$id = $_GET['id'];

// Obtener los datos del perfil con el ID proporcionado
$query = "SELECT * FROM perfil WHERE ID_Perfil = $id";
$resultado = $conexion->query($query);

if ($resultado->num_rows > 0) {
    $perfil = $resultado->fetch_assoc();
    // Devolver los datos del perfil como JSON
    echo json_encode($perfil);
} else {
    // Si no se encuentra el perfil, puedes devolver un mensaje de error como JSON
    echo json_encode(array('error' => 'Perfil no encontrado'));
}
?>



