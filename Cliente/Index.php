<?php
include 'Conexion.php';

session_start();

// Verificar si $_SESSION['idPerfil'] está configurado
if (isset($_SESSION['id'])) {
    // Obtener el valor de idPerfil desde la sesión
    $idPerfil = $_SESSION['id'];
  
   // echo "EXITO: idPerfil = " . $idPerfil;
} else {
    //echo "ERROR: idPerfil no está configurado en la sesión.";
}

$cuentacon = "Trabajador";
// Consulta SQL para obtener los datos de la tabla usuarios
$sql = "SELECT * FROM `perfil` WHERE Cuenta = '$cuentacon' ORDER BY RAND() LIMIT 5";

$result = mysqli_query($conexion, $sql);
if (!$result) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

$Estado = "SELECT * FROM `perfil` WHERE ID_Perfil = '$idPerfil'";

if ($conexion) {
    $resultado = mysqli_query($conexion, $Estado);
    if (!$resultado) {
        die("Error en la consulta: " . mysqli_error($conexion));
    }
} else {
    die("Error en la conexión a la base de datos");
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impulsame</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <style type="text/css">
          <style type="text/css">
 @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&family=Signika&display=swap');

    @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&family=Signika&display=swap');
    *{
      padding: 0;
      margin: 0;
    }
  header{

  z-index: 10;
  top: 0px;
  left: 0px;
  right: 0px;
  height: 60px;
  background:#e9eef0;
  width: 100%;
}
.nombre{
    font-family: Roboto Condensed; 
    color:black;
    padding-top: 15px;
    float: left;
}   
.wrapper{
  width: 100%;
  margin: 0 auto;
}
  .menu{
  width: 100%;
  font-family:  Roboto Condensed;
  font-size: 21px;  
  padding-top: -20px;
}
.menu ul{
  float: right;
  display: flex;
  margin-right: 30px;
}
.menu ul li{
  list-style: none;
  position: relative;
}
.menu ul li a{
  display: inline-block;
  padding: 0 1rem;
  padding-top: 1.2rem;
  color: black;
  text-decoration: none;
}
.menu ul li a button{
  display: inline-block;
  margin-top: -9%;
  width: auto;
  background: #011a8a;
  border-color: #011a8a;
}
.menu ul li a button:hover{
  background: #02a9db;
  border-color: #02a9db;
}
#umu, #umu1, #umu3 {
  display: none;
  position: absolute;
  margin-left: 425px;
  margin-top: 1%;
}
 #umu2{
  display: none;
  position: absolute;
  margin-left: 425px;
  margin-top: 10%;
 }
.unu {
  width: auto;
  height: auto;
  background-color: #fff;
  border-radius: 5px;
  padding: 20px;
  margin: 0 auto;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
  transition: transform 0.3s, opacity 0.3s;
}
.unu1{
width: auto;
  height: auto;
  background-color: #fff;
  border-radius: 5px;
  padding: 20px;
  margin: 0 auto;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
  transition: transform 0.3s, opacity 0.3s;
}

    .H{
      width: 100%;
      height: 50px;
      
    }
    .C{
      width: 100%;
      height:423px;
      background-color: yellow;
    }
    .T{
      width: 60%;
      height: 100%;
      background: #e9eef0;
      float: left;
    }
    .T1{
      width: 40%;
      height: 100%;
      background-color: white;
      float: right;
      margin-top: -6.5px;
    }
    .tri{
      width: 100%;
      height: 100%;
      
    }
    .btn{
      height: 50px;
      width: auto;
      margin-left: 30%;
      color: solid white;
      font-family: Roboto Condensed;
    }
    .btn.btn-success{
         background:#007bff;
  border-color:#007bff;
    }
    .btn.btn-success:hover{
 background:#007bff;
  border-color:#007bff;
}
.btn.btn-primary{
    line-height: 35px;

}
    .btn1{
      height: 40px;
      width: 40%;
      margin-left: 30%;

    }
    .h1{
      font-family: Roboto Condensed;
      float: left;
      margin: 0;
      padding: 0;
    }
    .tl{
font-family: Roboto Condensed;
font-size: 1rem;
text-align: justify;

    }
    .ht{
      width: 100%;
      height: 30%;
      margin-left: 5%;
      margin-top: 5%;
      margin-bottom: 0.5%;
    } 
    .B{
      width: 100%;
      height: 30%;
      position: relative;
      margin-top: 6%;
    }
    .ht1{
      width: 100%;
      height: 30%;
      position: relative;

      margin-left: 5%;
      margin-right: 15%;
      text-align: justify-all;
    }
    footer{
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
.contenedor{
  width: 100%;
  height: auto;
    min-height: 100px;
}
.contenedor .sec.pre{
    width: 40%;
    height: 100%;
    float: left;
    
} 
.contacto{
    width: 60%;
    height: 100%;
    float: right;
    padding-left: 380px;
}

.contacto .info ul{
float: right;
  display: flex;
}
.contacto .info li{
    list-style-type: none;
    display: inline;
    margin-bottom: 0px;
    padding-right: 31px;
}
.contacto .info li span:nth-child(1){
    color: black;
    font-size: 30px;
    margin-right: 0px;
}
.contacto .info li span{
    color:  black;
    font-size: 20px;
    font-family: Roboto Condensed;
}
.contacto .info li a{
    color:  black;
    font-size: 30px;
    font-family: Roboto Condensed;
    text-decoration: none;
    padding-top: 5px;

}
.contacto .info li a:hover{
    color: #73E62C;
}

#msform {
  width: 400px;
  margin: 0px auto;
  text-align: center;
  position: relative;
  display: block;
  font-family: Roboto Condensed;
}
#msform fieldset {
  background: white;
  border: 0 none;
  border-radius: 3px;
  box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
  padding: 20px 30px;
  box-sizing: border-box;
  width: 80%;
  margin: 0 10%;
  
  position: relative;
}
/*ocultar los otros apartados menos el primero*/
#msform fieldset:not(:first-of-type) {
  display: none;
}

#msform input, #msform textarea {
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
#msform .action-button:hover, #msform .action-button:focus {
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
#progressbar {
  margin-bottom: 30px;
  overflow: hidden;
  counter-reset: step;
}
#progressbar li {
  list-style-type: none;
  color: black;
  text-transform: uppercase;
  font-size: 9px;
  width: 25%;
  float: left;
  font-family: Roboto Condensed;
  position: relative;
}
#progressbar li:before {
  content: counter(step);
  counter-increment: step;
  width: 20px;
  line-height: 20px;
  display: block;
  font-size: 10px;
  color: #333;
  background: white;
  border-radius: 3px;
  margin: 0 auto 5px;
   border: 1px solid black;
}
#progressbar li:after {
  content: '';
  width: 100%;
  height: 2px;
  background: transparent;
  position: absolute;
  left: -50%;
  top: 9px;
  z-index: -1;
}
#progressbar li:first-child:after {
  content: none; 
}
#progressbar li.active:before,  #progressbar li.active:after{
  background: #27AE60;
  color: white;
}

#progressbar2 {
  margin-bottom: 30px;
  overflow: hidden;
  counter-reset: step;
}
#progressbar2 li {
  list-style-type: none;
  color: black;
  text-transform: uppercase;
  font-size: 9px;
  width: 33.33%;
  float: left;
  font-family: Roboto Condensed;
  position: relative;
}
#progressbar2 li:before {
  content: counter(step);
  counter-increment: step;
  width: 20px;
  line-height: 20px;
  display: block;
  font-size: 10px;
  color: #333;
  background: white;
  border-radius: 3px;
  margin: 0 auto 5px;
   border: 1px solid black;
}
#progressbar2 li:after {
  content: '';
  width: 100%;
  height: 2px;
  background: transparent;
  position: absolute;
  left: -50%;
  top: 9px;
  z-index: -1;
}
#progressbar2 li:first-child:after {
  content: none; 
}
#progressbar2 li.active:before,  #progressbar2 li.active:after{
  background: #27AE60;
  color: white;
}

#msform fieldset span{
    color:  black;
    font-size: 20px;
    font-family: Roboto Condensed;
    margin-top: -15px;
    margin-right: -20px;
    float: right;
    cursor: pointer;
}
.col-xl-4{
  margin-top: 20px;
}
        .linea-gris {
            background-color: gray; 
            padding: 10px;
        }

    </style>
</head>
<body>
    <div class="P">
    <header>
        <div style="width: 80px; height: 50px; float: left;">  <img src="logo_original_sin_linea-removebg-preview.png" style="position: relative; margin-top: -45px;" width="180px" height="190px"></div>
    </header>
    </div>
         <div class="linea-gris">
      <?php
while ($row = mysqli_fetch_assoc($resultado)) {
    echo "<p>Estado de la cuenta: ". $row['Estado']."</p>";
}
?>
        
    </div>
    <br>
    <br>
        <center><?php include 'Buscador/Buscador.php' ?></center>
 
    <div class="container mt-5" style="min-height: 350px;">
        <h1 style="float: center; padding-left:30%; padding-top:5%;">Servicios que podrías utilizar</h1>
        <div class="row">
<?php
while ($row = mysqli_fetch_assoc($result)) {
    $idTra= $row['ID_Perfil'];
    echo '
    <div class="col-md-4 mb-4">
        <div class="card">
            <img src="" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">' . $row['Nombre1'] . '</h5>
                <p class="card-text">' . $row['Apellido1'] . '</p>';

    $query = "SELECT * FROM `servicio` WHERE ID_Perfil=" . $idTra;
    $resultado2 = mysqli_query($conexion, $query);

    while ($row2 = mysqli_fetch_assoc($resultado2)) {
        echo '<p class="card-text">' . $row2['Servicio1'] . '</p>';
    }

    mysqli_free_result($resultado2);

    echo '<a href="Perfil.php?id=' . $row['ID_Perfil'] . '"
class="btn btn-primary">Ver Perfil</a>
            </div>
        </div>
    </div>';
}

// Liberar el resultado y cerrar la conexión
mysqli_free_result($result);
mysqli_close($conexion);
?>

        </div>
    </div>
    <div class="linea-gris">
      <?php

echo "<H1>Mis Procesos: <a href='Procesos.php?id=" . $idPerfil . "' class='btn btn-primary'>Ver Procesos</a></H1>";

?>
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

