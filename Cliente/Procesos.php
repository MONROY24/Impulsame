<?php
include 'Conexion.php';

session_start();
if (isset($_SESSION['id'])) {
    // Obtener el valor de idPerfil desde la sesión
    $idPerfil = $_SESSION['id'];
  
    echo "EXITO: idPerfil = " . $idPerfil;
} else {
    echo "ERROR: idPerfil no está configurado en la sesión.";
}


$sql4 = "SELECT * FROM `notificaciones` WHERE Id_Perfil = $idPerfil AND Estado = 'Enviada'";
$Notificaciones = $conexion->query($sql4);

$sql5 = "SELECT * FROM `notificaciones` WHERE Id_Perfil = $idPerfil AND Estado = 'Activo'";
$Notificaciones2 = $conexion->query($sql5);

$sql6 = "SELECT * FROM `notificaciones` WHERE Id_Perfil = $idPerfil AND Estado = 'Terminado'";
$Notificaciones3 = $conexion->query($sql6);

$sql7 = "SELECT * FROM `notificaciones` WHERE Id_Perfil = $idPerfil AND Estado = 'Cancelado'";
$Notificaciones3 = $conexion->query($sql6);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impulsame</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="procesos.css">
</head>
<body>
    <div class="P">
    <header>
        <div style="width: 80px; height: 50px; float: left;">  <img src="logo_original_sin_linea-removebg-preview.png" style="position: relative; margin-top: -45px;" width="180px" height="190px"></div>
    </header>
    </div>
    <br>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }

        /* Estilos para cada tabla */
        #tabla1 {
            background-color: #eaf7ff;
        }
        #tabla2 {
            background-color: #f7ffea;
        }
        #tabla3 {
            background-color: #ffeaf7;
        }
        #tabla4 {
            background-color: #f0f0f0;
        }
    </style>
    <h1>MIS CONTRATACIONES</h1>

    <br>
    <br>
<caption>Solicitudes enviadas</caption>
    <table id="tabla1">
        
        <tr>
            <th>Problema</th>
            <th>Mensaje</th>
            <th>Estado</th>
            <th>Accion</th>
        </tr>
       <?php
    if ($Notificaciones->num_rows > 0) {
        while ($row = $Notificaciones->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Problema'] . "</td>";
            echo "<td>" . $row['Mensaje'] . "</td>";
            echo "<td>" . $row['Estado'] . "</td>";
            echo  '<td><button id="mostrarVentana">Ver</button></td>';
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No hay solicitudes enviadas .</td></tr>";
    }
    ?>
    </table>
        <caption>Trabajos Activos</caption>
    <table id="tabla2">

                <tr>
            <th>Problema</th>
            <th>Mensaje</th>
            <th>Estado</th>
            <th>Accion</th>
        </tr>
       <?php
    if ($Notificaciones2->num_rows > 0) {
        while ($row = $Notificaciones2->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Problema'] . "</td>";
            echo "<td>" . $row['Mensaje'] . "</td>";
            echo "<td>" . $row['Estado'] . "</td>";
            echo '<td><button id="mostrarVentana2">Ver</button></td>';
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No hay Trabajos Activos.</td></tr>";
    }
    ?>
    </table>
    </table>
        <caption>Trabajos Concluidos</caption>
    <table id="tabla3">
        <tr>
            <th>Problema</th>
            <th>Mensaje</th>
            <th>Estado</th>
            <th>Accion</th>
        </tr>
       <?php
    if ($Notificaciones3->num_rows > 0) {
        while ($row = $Notificaciones3->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Problema'] . "</td>";
            echo "<td>" . $row['Mensaje'] . "</td>";
            echo "<td>" . $row['Estado'] . "</td>";
            echo  '<td><button id="mostrarVentana4">Ver</button></td>';
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No Tienes Trabajos Concluidos.</td></tr>";
    }
    ?>
    </table>
    </table>


      <caption>Trabajos Cancelados</caption>
    <table id="tabla4">
  
               <tr>
            <th>Problema</th>
            <th>Mensaje</th>
            <th>Estado</th>
            <th>Accion</th>
        </tr>
       <?php
    if ($Notificaciones4->num_rows > 0) {
        while ($row = $Notificaciones4->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Problema'] . "</td>";
            echo "<td>" . $row['Mensaje'] . "</td>";
            echo "<td>" . $row['Estado'] . "</td>";
            echo  '<td><button id="mostrarVentana3">Ver</button></td>';
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No Tienes Trabajos Cancelados.</td></tr>";
    }
    ?>
    </table>


<div id="ventanaFlotante" class="ventana">
        <div class="contenido">
            <p>Datos</p>
            <?php
    echo "<h4>Solicitud</h4>";
    while ($row11 = $Notificaciones->fetch_assoc()) {
        echo "<label>" . $row11["Problema"] . "</label>";
        echo "<label>" . $row11["Mensaje"] . "</label>";
        echo "<label>" . $row11["Estado"] . "</label>";
    }
?>
        </div>
    </div>


<div id="ventanaFlotante2" class="ventana">
        <div class="contenido">
            <p>Datos</p>
            <?php
    echo "<h4>Solicitud</h4>";
    while ($row11 = $Notificaciones2->fetch_assoc()) {
        echo "<label>" . $row11["Problema"] . "</label>";
        echo "<label>" . $row11["Mensaje"] . "</label>";
        echo "<label>" . $row11["Estado"] . "</label>";
    }
?>
        </div>
    </div>


<div id="ventanaFlotante3" class="ventana">
        <div class="contenido">
            <p>Datos</p>
            <?php
    echo "<h4>Solicitud</h4>";
    while ($row11 = $Notificaciones3->fetch_assoc()) {
        echo "<label>" . $row11["Problema"] . "</label>";
        echo "<label>" . $row11["Mensaje"] . "</label>";
        echo "<label>" . $row11["Estado"] . "</label>";
    }
?>
        </div>
    </div>
<div id="ventanaFlotante4" class="ventana">
        <div class="contenido">
            <p>Datos</p>
            <?php
    echo "<h4>Solicitud</h4>";
    while ($row11 = $Notificaciones4->fetch_assoc()) {
        echo "<label>" . $row11["Problema"] . "</label>";
        echo "<label>" . $row11["Mensaje"] . "</label>";
        echo "<label>" . $row11["Estado"] . "</label>";
    }
?>

        </div>
    </div>

<script type="text/javascript">
  document.getElementById("mostrarVentana").addEventListener("click", function () {
    document.getElementById("ventanaFlotante").style.display = "block";
});
document.getElementById("mostrarVentana2").addEventListener("click", function () {
    document.getElementById("ventanaFlotante2").style.display = "block";
});

document.getElementById("mostrarVentana3").addEventListener("click", function () {
    document.getElementById("ventanaFlotante3").style.display = "block";
});
document.getElementById("mostrarVentana4").addEventListener("click", function () {
    document.getElementById("ventanaFlotante4").style.display = "block";
});
</script>

    <br>


        <div class="contenedor">
            <div class="sec pre">
                 <h3>PROYECTO PARA EUREKA</h3>
        <h6>© TODOS LOS DERECHOS RESERVADOOS - SOFTWARE INAH 2023</h6>
            </div>
            <div class="sec contacto">
                <h3>Informacion de Contacto</h3>
                <ul class="info">
                    <li><span><a href="#"><i class="fab fa-twitter"></i></a></span></li>
                    <li><span><a href="#"><i class="fab fa-instagram"></i></a></span></li>
                    <li><span><a href="#"><i class="fa fa-envelope"></i></a></span></li>
                    <li><span><a href="#"><i class="fab fa-facebook"></i></a></span></li>
                    <li><span><a href="#"><i class="fab fa-whatsapp"></i></a></span></li>
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>

