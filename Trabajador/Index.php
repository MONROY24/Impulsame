<?php
include 'Conexion.php';

session_start();
if (isset($_GET['idPerfil'])) {
    $idPerfil = $_GET['idPerfil'];
    //echo "EXITO";
} else {
//echo "ERROR";
}
$idPerfil = $_SESSION['id'];
echo $idPerfil;
$sql = "SELECT * FROM `perfil` WHERE ID_Perfil = $idPerfil";
$Perfil = $conexion->query($sql);

$sql2 = "SELECT * FROM `curriculum` WHERE ID_Perfil = $idPerfil";
$Curriculum = $conexion->query($sql2);

$sql3 = "SELECT * FROM `servicio` WHERE ID_Perfil= $idPerfil";
$Servicio = $conexion->query($sql3);

$sql4 = "SELECT * FROM `notificaciones` WHERE Id2 = $idPerfil AND Estado = 'Enviada'";
$Notificaciones = $conexion->query($sql4);

$sql5 = "SELECT * FROM `notificaciones` WHERE Id2 = $idPerfil AND Estado = 'Activo'";
$Notificaciones2 = $conexion->query($sql5);

$sql6 = "SELECT * FROM `notificaciones` WHERE Id2 = $idPerfil AND Estado = 'Terminado'";
$Notificaciones3 = $conexion->query($sql6);

$sql7 = "SELECT * FROM `contactar` WHERE Id_Perfil = $idPerfil";
$Contactar = $conexion->query($sql7);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Perfil</title>
      <style type="text/css">
        
       @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&family=Signika&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  width: 100%;
  height: 100%;
  background: white;
}

header {
  z-index: 10;
  top: 0px;
  left: 0px;
  right: 0px;
  height: 50px;
  background: #e9eef0;
  width: 100%;
}

.nombre {
  font-family: Roboto Condensed;
  color: black;
  padding-top: 5px;
  float: left;
}

.wrapper {
  width: 100%;
  margin: 0 auto;
}

.menu {
  width: 100%;
  font-family: Roboto Condensed;
  font-size: 21px;
  padding-top: -20px;
}

.menu ul {
  float: right;
  display: flex;
  margin-right: 30px;
}

.menu ul li {
  list-style: none;
  position: relative;
}

.menu ul li a {
  display: inline-block;
  padding: 0 1rem;
  padding-top: 1.2rem;
  color: black;
  text-decoration: none;
}

.menu ul li a button {
  display: inline-block;
  margin-top: -9%;
  width: auto;
  background: #011a8a;
  border-color: #011a8a;
}

.menu ul li a button:hover {
  background: #02a9db;
  border-color: #02a9db;
}

.um {
  width: 95%;
  height: auto;
  position: relative;
  margin-top: 0px;
  display: block;
  margin-left: 2.5%;
}

.um1 {
  position: relative;
  height: auto;
  width: 80%;
  color: white;
  float: left;
  margin-left: 10%;
  margin-top: 1%;
  text-align: justify;
}

.un {
  margin-top: 20px;
  border-radius: 5px;
  border: transparent;
  width: auto;
  height: auto;
  background: transparent;
}

.mt-5 {
  margin-top: 1rem !important;
}

.rati {
  display: flex;
  align-items: center;
  justify-content: center;
}

.star {
  font-size: 40px;
  color: #bbb;
  transition: color 0.3s;
  cursor: pointer;
}

.star:hover,
.star.checked {
  color: gold;
}

.star1 {
  font-size: 1.25rem;
  color: #bbb;
}

.star1:hover,
.star1.checked {
  color: gold;
}

#msform {
  width: 80%;
  margin: 0px auto;
  text-align: center;
  position: relative;
  display: block;
  font-family: Roboto Condensed;
  float: right;
}

#msform fieldset {
  background: white;
  border: 0 none;
  border-radius: 3px;
  box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
  padding: 20px 30px;
  box-sizing: border-box;
  width: 100%;
  position: relative;
}

/* Ocultar los otros apartados menos el primero */
#msform fieldset:not(:first-of-type) {
  display: none;
}

#msform input,
#msform textarea {
  padding: 15px;
  border: 1px solid #ccc;
  border-radius: 3px;
  margin-bottom: 10px;
  width: 100%;
  box-sizing: border-box;
  font-family: Roboto Condensed;
  color: #2C3E50;
  font-size: 13px;
}

#msform .action-button {
  width: 100px;
  background: #27AE60;
  font-weight: bold;
  color: white;
  border: 0 none;
  border-radius: 1px;
  cursor: pointer;
  padding: 10px;
  margin: 10px 5px;
  text-decoration: none;
  font-size: 14px;
}

#msform .action-button:hover,
#msform .action-button:focus {
  box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
}

.fs-title {
  font-size: 15px;
  text-transform: uppercase;
  color: #2C3E50;
  margin-bottom: 10px;
}

.fs-subtitle {
  font-weight: normal;
  font-size: 13px;
  color: #666;
  margin-bottom: 20px;
}

.comen {
  background: yellow;
  width: 30%;
  height: auto;
  float: left;
}

.text {
  position: relative;
  height: auto;
  width: 75%;
  color: white;
  float: left;
  margin-top: 8%;
  margin-left: 5%;
  text-align: right;
}

.text1 {
  position: relative;
  height: auto;
  width: 80%;
  color: white;
  float: left;
  margin-left: 10%;
  margin-top: 1%;
  text-align: justify;
}

.text .h1 {
  margin-bottom: 5%;
}

.text .h2,
.text .h3 {
  margin-bottom: 10%;
}

.perf {
  background: black;
  width: 100%;
  height: 220px;
  overflow: hidden;
  border-radius: 5px;
}

.mostrar {
  position: absolute;
  height: auto;
  width: 100%;
}

.mostrar2 {
  position: relative;
  height: auto;
  width: 100%;
  margin-top: 1%;
  display: flex;
}

.foto {
  width: 100%;
  height: 100%;
  background-size: cover;
  line-height: 100px;
  position: absolute;
  margin-top: 1%;
  margin-left: 4%;
  border-radius: 3px;
}

.foto1 {
  background: transparent;
  width: 100px;
  height: 100px;
  background-size: cover;
  border-radius: 45%;
  float: left;
  line-height: 100px;
  position: relative;
  margin-top: 0px;
  box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
}

.contenedor1 {
  float: left;
  background: lightgray;
  width: 40%;
  height: auto;
  border-radius: 5px;
  padding: 20px 20px 20px 20px;
}

.contenedor2 {
  float: right;
  background: lightgray;
  width: 58%;
  height: auto;
  border-radius: 5px;
  margin-left: 1%;
  padding: 10px 10px 10px 10px;
}

.tdv {
  position: relative;
  width: 80%;
  color: black;
  float: left;
  margin-left: 10%;
  margin-top: 1%;
  text-align: justify;
}

.table {
  color: white;
}

footer {
  font-family: Roboto Condensed;
  top: 0px;
  left: 0px;
  right: 0px;
  background: #e9eef0;
  width: 100%;
  height: auto;
  padding: 10px 3%;
  display: flex;
  min-height: 100px;
}

.contenedor {
  width: 100%;
  height: auto;
  min-height: 100px;
}

.contenedor .sec.pre {
  width: 40%;
  height: 100%;
  float: left;
}

.contacto {
  width: 60%;
  height: 100%;
  float: right;
  padding-left: 380px;
}

.contacto .info ul {
  float: right;
  display: flex;
}

.contacto .info li {
  list-style-type: none;
  display: inline;
  margin-bottom: 0px;
  padding-right: 31px;
}

.contacto .info li span:nth-child(1) {
  color: black;
  font-size: 30px;
  margin-right: 0px;
}

.contacto .info li span {
  color: black;
  font-size: 20px;
  font-family: Roboto Condensed;
}

.contacto .info li a {
  color: black;
  font-size: 30px;
  font-family: Roboto Condensed;
  text-decoration: none;
  padding-top: 5px;
}

.contacto .info li a:hover {
  color: #73E62C;
}

.h5 {
  color: black;
}

button {
  margin-top: 10px;
}

.hidden {
  display: none;
}

#notification,
#messagePopup {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  padding: 20px;
  background-color: #fff;
  border: 1px solid #ccc;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  z-index: 999;
}

.container {
  padding-top: 1rem;
}

.modal-backdrop {
  position: relative !important;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background-color: #000;
}

.modal.fade {
  background: transparent !important;
  border: transparent !important;
  box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.2) !important;
  overflow-y: hidden;
}

/* Media Query para pantallas con un ancho máximo de 720px */
@media (max-width: 720px) {
    .foto {
    width: 50%;
    border-radius: 3px;
    display: block;
  
  }
  header {
    height: 50px;
  }

  .nombre {
    display: block; /* Muestra el nombre en una nueva línea */
    padding-top: 1px;
  }

  .menu {
    font-size: 18px;
  }

  .menu ul {
    margin-right: 15px;
  }

  .menu ul li a {
    padding: 0 0.5rem;
    padding-top: 1rem;
  }

  .menu ul li a button {
    margin-top: -10%;
  }

  .um {
    width: 90%;
    margin-left: 5%;
  }

  .um1 {
    width: 90%;
    margin-left: 5%;
  }

  .contacto {
    padding-left: 10px;
  }

  footer {
    padding-left: 3%;
  }
}

/* Media Query para pantallas con un ancho mínimo de 1280px */
@media (min-width: 1280px) {
.foto {
    width: 50%;
    border-radius: 3px;
  }  
  header {
    height: 70px;
  }

  .nombre {
    padding-top: 5px;
  }

  .menu {
    font-size: 21px;
  }

  .menu ul {
    margin-right: 30px;
  }

  .menu ul li a {
    padding: 0 1rem;
    padding-top: 1.2rem;
  }

  .menu ul li a button {
    margin-top: -9%;
  }

  .um {
    width: 95%;
    margin-left: 2.5%;
  }

  .um1 {
    width: 80%;
    margin-left: 10%;
  }

  .contacto {
    padding-left: 380px;
  }

  footer {
    padding-left: 3%;
  }
}

</style>
</head>
<body>
   <header>
   <div style="width: 80px; height: 50px; float: left;">  <img src="logo_original_sin_linea-removebg-preview.png" style="position: relative; margin-top: -50px;" width="180px" height="190px"></div>

   <button class="btn btn-sm btn-primary ms-2" style="float:right;"><a href="users.php"><i class="fa fa-envelope" style="font-size: 20px; color:white;"></i></a></button>
</header>
    <div class="um justify-content-center sticky-top">
    <div class="perf">
      <div class="mostrar">
      <?php  
      while ($row = $Perfil->fetch_assoc()) {?>
<div class='foto'><img src="data:image/*;base64,<?php
echo base64_encode($row['Foto']); ?>"></div>
                <?php

                echo "<div class='text'>";
                echo "<h1 class='h1'>" . $row["Nombre1"] . " " .$row["Nombre2"]." ". $row["Apellido1"] ." ".$row["Apellido2"]. "</h1>";
                echo "</div>";
               

            }
            ?>

               
             </div>
           </div>
           <div class="container mt-5">
        <div class="alert alert-info" role="alert">
            <h2>Contrataciones</h2>

<?php
if ($Notificaciones->num_rows > 0) {
    echo "<h4>Solicitudes</h4>";
    echo "<table>";
    echo "<tr><th>Campo 1</th><th>Campo 2</th><th>Campo 3</th></tr>";
    while ($row11 = $Notificaciones->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row11["Problema"] . "</td>";
        echo "<td>" . $row11["Estado"] . "</td>";
  echo '<td><button id="mostrarVentana">Ver</button></td>';
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No Tienes Solicitudes de Trabajos.<br>";
}

if ($Notificaciones2->num_rows > 0) {
    echo "<h4>Trabajos Activos</h4>";
    echo "<table>";
    echo "<tr><th>Campo 1</th><th>Campo 2</th><th>Campo 3</th></tr>";
    while ($row22 = $Notificaciones2->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row22["Problema"] . "</td>";
        echo "<td>" . $row22["Estado"] . "</td>";
        echo '<td><button id="mostrarVentana2">Ver</button></td>';
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No Tienes Trabajos Activos.<br>";
}

if ($Notificaciones3->num_rows > 0) {
    echo "<h4>Trabajos Terminados</h4>";
    echo "<table>";
    echo "<tr><th>Campo 1</th><th>Campo 2</th><th>Campo 3</th></tr>";
    while ($row33 = $Notificaciones3->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row33["Problema"] . "</td>";
        echo "<td>" . $row33["Estado"] . "</td>";
        echo '<td><button id="mostrarVentana3">Ver</button></td>';
        echo "</tr>";



        
    }
    echo "</table>";
} else {
    echo "No Tienes Trabajos Terminados.";
}
?>
       
        </div>
    </div>

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
            <button id="aceptar">Aceptar</button>
            <button id="rechazar">Rechazar</button>
        </div>
    </div>

<div id="ventanaFlotante2" class="ventana">
        <div class="contenido">
            <p>Datos</p>
            <?php
    echo "<h4>Trabajo</h4>";
    while ($row22 = $Notificaciones2->fetch_assoc()) {
        $IdSol = $row22["ID_Notificacion"];
        echo "<label>" . $row22["Problema"] . "</label>";
        echo "<label>" . $row22["Mensaje"] . "</label>";
        echo "<label>" . $row2["Estado"] . "</label>";
    }
?>
            <button id="Terminado">Terminado</button>
            <button id="Cancelar">Cancelar</button>
        </div>
</div>

<div id="ventanaFlotante3" class="ventana">
        <div class="contenido">
            <p>Datos</p>
            <?php
    echo "<h4>Terminado</h4>";
    while ($row33 = $Notificaciones3->fetch_assoc()) {
        $IdSol = $row33["ID_Notificacion"];
        echo "<label>" . $row33["Problema"] . "</label>";
        echo "<label>" . $row33["Mensaje"] . "</label>";
        echo "<label>" . $row33["Estado"] . "</label>";
    }
?>
        </div>
</div>



<style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }


        /* Estilo para la ventana flotante */
.ventana {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1;
}

.contenido {
    background-color: #fff;
    width: 300px;
    padding: 20px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

button {
    margin: 5px;
}

</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
      <div class="mostrar2">
        <div class="contenedor1">
            <?php
            while ($row2 = $Servicio->fetch_assoc()) {
                echo "<div class='profesion'>";
                echo "<h4>Profesión 1: " . $row2["Servicio1"] . "</h4>";
                echo "<h4>Profesión 2: " . $row2["Servicio2"] . "</h4>";
                echo "<h4>Profesión 3: " . $row2["Servicio3"] . "</h4>";

                echo "</div>";
            }
            ?>
                        <?php
            while ($row24 = $Contactar->fetch_assoc()) {
                echo "<div class='profesion'>";

                echo "<h4>Telefono 1: " . $row24["Telefono1"] . "</h4>";
                echo "<h4>Telefono 2: " . $row24["Telefono2"] . "</h4>";
                echo "<h4>Whatsapp: " . $row24["WhatsApp"] . "</h4>";

                echo "</div>";
            }
            ?>


      <button id="mostrarVentana4" class="boton">Agregar Contactos</button>
           <div id="ventanaFlotante4" class="ventana">
            <button id="cerrarVentana" class="cerrar">X</button>
     <h1>Agregar Contacto</h1>
    <form method="post" class="formulario">
      <label for="Telefono1">Telefono #1</label>
      <input type="tel" id="Telefono1" name="Telefono1">
      
      <label for="Telefono2">Telefono #2</label>
      <input type="tel" id="Telefono2" name="Telefono2">
      
      <label for="Whatsapp">WhatsApp</label>
      <input type="tel" id="Whatsapp" name="Whatsapp">
      
      <input type="submit" value="Guardar">
    </form>
  </div> 
<?php
include 'Conexion.php';
if (isset($_POST['submit'])) {
    $telefono1 = $_POST['Telefono1'];
    $telefono2 = $_POST['Telefono2'];
    $whatsapp = $_POST['Whatsapp'];

    // Preparar la consulta SQL para insertar datos en la base de datos
    $sql = "INSERT INTO `contactar` (`ID_Contactar`, `Telefono1`, `Telefono2`, `WhatsApp`, `Id_Perfil`) VALUES (NULL,'$telefono1', '$telefono2', '$whatsapp', '$idPerfil')";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
      //echo "Los datos se han insertado correctamente en la base de datos.";
    } else {
      //echo "Error al insertar los datos: " . $conexion->error;
    }
  }
  ?>


  <script type="text/javascript">
    document.getElementById("mostrarVentana4").addEventListener("click", function () {
      document.getElementById("ventanaFlotante4").style.display = "block";
    });

    document.getElementById("cerrarVentana").addEventListener("click", function () {
      document.getElementById("ventanaFlotante4").style.display = "none";
    });
  </script>
<style type="text/css">
.boton {
  background-color: #0074D9;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
  border-radius: 5px;
}

.ventana {
  display: none;
  background-color: #ffffff;
  border: 1px solid #ccc;
  padding: 30px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  max-width: 300px; /* Limitar el ancho de la ventana flotante */
  text-align: center;
  height: 500px;
}

.cerrar {
  position: absolute;
  top: 10px;
  right: 10px;
  background-color: #ff0000;
  color: #ffffff;
  border: none;
  padding: 5px 10px;
  cursor: pointer;
  border-radius: 50%;
}

.formulario {
  text-align: left; /* Alinea el contenido del formulario a la izquierda */
}

.formulario label {
  display: block;
  margin-bottom: 5px;
}

.formulario input[type="tel"] {
  width: 100%;
  padding: 5px;
  margin-bottom: 10px;
}

.formulario input[type="submit"] {
  background-color: #0074D9;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
  border-radius: 5px;
}



</style>
</div>
<div class="contenedor2">
            <?php
            while ($row3 = $Curriculum->fetch_assoc()) {
                echo "<div class='servicio'>";
                echo "<h4>Nivel de estudio: " . $row3["Nivel_estudio"] . "</h4>";?>
             <h4>Diploma:<img src="data:image/*;base64,<?php
echo base64_encode($row3['Diplomas']) ?>"></h4>
<?php
                echo "</div>";
            }
            ?>
              
            </div>
          </div>
            </div>

<?php  
include ("Conexion.php");
if (isset($_POST['next'])){
  if (isset($_POST['res'])){
    $res =  $_POST['res']; //reseña
    $valor = $_POST['stars']; //nnumero de estrellas
    date_default_timezone_set('America/El_Salvador');
$Hr=date("Y-m-d H:i:s"); //fecha y hora
  if ($res) {
    $SQL = "INSERT INTO res(res,star,hr,id) VALUES ('$res', '$valor', '$Hr', 'Usuario Cualquiera');";
    $f=mysqli_query($conexion,$SQL);
    if ($f) {
      echo "<script>
  alert('Gracias por comentario');
  location.assign('Perfil.php');
  </script>";
    }
    }
  }
}
?>
<div class="y" style="width: 100%; height: auto; max-height: 300px; overflow: hidden; padding-top: 20px;">
<div class="tdv" style=" position: relative; overflow-y: scroll; height: 300px;">
 <table class="table table-striped">

        <thead>    
            <tr>
                <th scope="col" style="color: black;">Comentarios</th>
        
        </thead>

<tbody>       
      <?php
      $sql = "SELECT * FROM res WHERE = '$idPerfil' order by hr desc "; // que se ordene por la hora
      if($result = mysqli_query($conexion,$sql)){
        while($mostrar=mysqli_fetch_array($result)){
          $st = $mostrar["star"];
      ?><tr>
        <th scope="row">
          <h1 class="h5"><?php /*se supone que id estaria el nombre de quien escribió DX*/echo $mostrar["id"]." ";?> <?php while($st>0){?>
            <i class="bi bi-star-fill star1 checked"></i>
            <?php $st= $st-1;}?></h1>
          <h1 class="h5"><?php echo $mostrar["res"]?></h1>
           <h1 class="h5"><?php echo $mostrar["hr"]?></h1>
        </th>


      </tr>
      <?php
        }
      }
      
        
      ?>

      


    </tbody>
    </table>


    </div>
  </div>
<footer>
    <div class="contenedor">
      <div class="sec pre">
          <h3>PROYECTO PARA EUREKA</h3>
        <h6>© TODOS LOS DERECHOS RESERVADOOS - SOFTWARE INAH 2023</h6>
      </div>
      <div class="sec contacto">
        <h3>Informacion de Contacto</h3>
        <ul class="info">
          <li>
          <span><a href="#"><i class="fab fa-twitter"></i></a></span>
        </li>
        <li>
          <span><a href="#"><i class="fab fa-instagram"></i></a></span>
        </li>
        <li>
          <span><a href="#"><i class="fa fa-envelope"></i></a></span>     
        </li>
        <li>
          <span><a href="#"><i class="fab fa-facebook"></i></a></span>
        </li>
         <li>
          <span><a href="#"><i class="fab fa-whatsapp"></i></a></span>
        </li>
        </ul>
      </div>
    </div>
  </footer>
</body>
</html>
