<?php
// Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "impulsamef";

    $conexion = new mysqli($servername, $username, $password, $dbname);

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

/*// Verificación de la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el mensaje más reciente
$sql = "SELECT message FROM notifications  ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

$message = "";

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $message = $row["message"];
}

$conn->close();

header("Content-Type: application/json");
echo json_encode(["message" => $message]);*/
?>
