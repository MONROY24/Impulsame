<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $CE = $_POST['CE'];
    $Contra = $_POST['Contra'];

    include 'Conexion.php';

    $Consulta1 = "SELECT * FROM perfil WHERE Correo = '$CE' AND Contrasena = '$Contra'";
    $resultado1 = $conexion->query($Consulta1);

    if ($resultado1 instanceof mysqli_result && $resultado1->num_rows > 0) {
        $resultado2 = mysqli_fetch_assoc($resultado1);
        $ID = $resultado2['ID_Perfil'];
        $tipoCuenta = $resultado2['Cuenta']; // Obtener el tipo de cuenta del usuario

        session_start();
        $_SESSION['id'] = $ID;

        // Redireccionar según el tipo de cuenta
        if ($tipoCuenta == 'Cliente') {
            header("Location: ../Cliente/Index.php");
        } elseif ($tipoCuenta == 'Trabajador') {
            header("Location: ../Trabajador/Index.php");
        } else {
            // Tipo de cuenta desconocido, puedes manejarlo según tu lógica
            echo "Tipo de cuenta desconocido.";
        }

        exit();
    } else {
        echo "Credenciales incorrectas. Inténtalo de nuevo." . $conexion->error;
    }

    $conexion->close();
}
?>
