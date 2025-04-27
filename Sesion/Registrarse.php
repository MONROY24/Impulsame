<?php
include 'Conexion.php';

if (isset($_POST["Correo"], $_POST["Contra"], $_POST["Nombre1"], $_POST["Nombre2"], $_POST["Apellido1"], $_POST["Apellido2"], $_POST["Fecha_Nac"], $_POST["Dui"], $_POST["Direccion"], $_POST['Cuenta'], $_POST["Descripcion"], $_POST["Telefono"], $_FILES['Foto_Dui']['tmp_name'], $_FILES['Foto']['tmp_name'])) {
    // Obtener datos del formulario y escaparlos para evitar inyección SQL
    $correo = $_POST["Correo"];
    $contrasena = $_POST["Contra"]; 
    $nombre1 = $_POST["Nombre1"];
    $nombre2 = $_POST["Nombre2"];
    $apellido1 = $_POST["Apellido1"];
    $apellido2 = $_POST["Apellido2"];
$FechaNac = $_POST["Fecha_Nac"];
$fechaFormateada = date('Y-m-d', strtotime($FechaNac));

    $dui = $_POST["Dui"];
    $direccion = $_POST["Direccion"];
    $cuenta =$_POST['Cuenta'];
    $Descripcion =$_POST["Descripcion"];
    $telefono =$_POST["Telefono"];
    $foto_dui = addslashes(file_get_contents($_FILES['Foto_Dui']['tmp_name']));
    $foto_perfil = addslashes(file_get_contents($_FILES['Foto']['tmp_name']));
    if ($cuenta == "Cliente") {
        $estado = "En Revision";

$sql2 = "INSERT INTO `perfil` (`ID_Perfil`, `Nombre1`, `Nombre2`, `Apellido1`, `Apellido2`, `Telefono`, `Fecha_Nac`, `Dui`,`Foto_Dui`, `Foto`, `Direccion`, `Correo`, `Contrasena`, `Descripcion`, `Cuenta`, `Estado`) VALUES (NULL,'$nombre1', '$nombre2', '$apellido1', '$apellido2', '$telefono', '$fechaFormateada', '$dui', '$foto_dui', '$foto_perfil', '$direccion', '$correo', '$contrasena', '$Descripcion', '$cuenta', '$estado')";

        if ($conexion->query($sql2) === TRUE) {
    echo "<br>Registro exitoso";

    session_start();
    $_SESSION['idPerfil'] = $conexion->insert_id;

    header("Location: ../Cliente/Index.php");
    exit();
}

        }
        else {
            if (
                isset($_POST['Estudios']) && isset($_POST["Nombre1P"]) && isset($_POST["Nombre2P"]) && isset($_POST["Nombre3P"]) && isset($_FILES['Diploma']) && isset($_FILES['Diploma']['tmp_name']) && isset($_FILES['Curriculum']) &&  isset($_FILES['Curriculum']['tmp_name'])
            ) {
                $nivelacademico = $_POST['Estudios'];
                $Profesion1 = $_POST["Nombre1P"];
                $Profesion2 = $_POST["Nombre2P"];
                $Profesion3 = $_POST["Nombre3P"];        
                $foto_diploma = addslashes(file_get_contents($_FILES['Diploma']['tmp_name']));  
                $estado = "En Revision";
    
        $sql2 = "INSERT INTO `perfil` (`ID_Perfil`, `Nombre1`, `Nombre2`, `Apellido1`, `Apellido2`, `Telefono`, `Fecha_Nac`, `Dui`,`Foto_Dui`, `Foto`, `Direccion`, `Correo`, `Contrasena`, `Descripcion`, `Cuenta`, `Estado`) VALUES (NULL,'$nombre1', '$nombre2', '$apellido1', '$apellido2', '$telefono', '$fechaFormateada', '$dui', '$foto_dui', '$foto_perfil', '$direccion', '$correo', '$contrasena', '$Descripcion', '$cuenta', '$estado')";
    
                if ($conexion->query($sql2) === TRUE) {
                    $idPerfil = $conexion->insert_id;
    
                    $sql12 = "INSERT INTO  `servicio` (`ID_Servicio`, `Servicio1`, `Servicio2`, `Servicio3`, `ID_Perfil`) VALUES (NULL,'$Profesion1', '$Profesion2', '$Profesion3', '$idPerfil')";
    
                    if ($conexion->query($sql12) === TRUE) {
    
    
                        $pdf = addslashes(file_get_contents($_FILES['Curriculum']['tmp_name']));

                        $sql4 = "INSERT INTO  `curriculum` (`ID_Curriculum`, `Curriculum_PDF`, `Nivel_estudio`, `Diplomas`, `ID_Perfil`) VALUES (NULL,'$pdf', '$nivelacademico', '$foto_diploma','$idPerfil')";
    
                        if ($conexion->query($sql4) === TRUE) {
                            echo "<br>Registro exitoso en curriculum";
                            header("Location: ../Trabajador/Index.php?idPerfil=" . $idPerfil);
                            exit();
                        } else {
                            echo "<br>Error al registrar en curriculum: " . $conexion->error;
                        }
                    } else {
                        echo "<br>Error al registrar en Profesion: " . $conexion->error;
                    }
                } else {
                    echo "<br>Error al registrar en perfil: " . $conexion->error;
                }
            } 
    } 
    }
?>

