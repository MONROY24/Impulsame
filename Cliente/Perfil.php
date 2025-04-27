<?php
include 'Conexion.php';
session_start();

if (isset($_GET['id'])) {
   
    $idTRA = $_GET['id'];
    $_SESSION['wid'] = $idTRA;
}

if (isset($_SESSION['wid'])) { 
    $idPerfil = $_SESSION['wid'];
}

$sql = "SELECT * FROM `perfil` WHERE ID_Perfil = '$idTRA' ";
$Perfil1 = $conexion->query($sql);

$sql2 = "SELECT * FROM `servicio` WHERE ID_Perfil = '$idTRA'";
$Servicio = $conexion->query($sql2);

$sql3 = "SELECT * FROM `curriculum` WHERE ID_Perfil = '$idTRA' ";
$Curriculum = $conexion->query($sql3);

if (!$Perfil1 || !$Servicio || !$Curriculum) {
  
   echo "Error en la consulta". $conexion->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Enviar"])) {
    $problema = $_POST["Problema"];
    $descripcion = $_POST["message"];
    $idPerfil = $_POST["id"];
    $idTRA = $_POST["idtra"];

$Insertar = "INSERT INTO `notificaciones` (`ID_Notificacion`, `Problema`, `mensaje`, `Estado`, `ID_Perfil`, `Id2`) VALUES (NULL,'$problema', '$descripcion','Enviada', '$idPerfil', '$idTRA')";

    if ($conexion->query($Insertar) === TRUE) {
        echo "Los datos se han insertado correctamente.";
    } else {
        echo "Error al insertar datos: " . $conexion->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="perfil.css">
	<title>Perfil</title>
</head>
<body>

   <header>
    <div style="width: 80px; height: 50px; float: left;">  <img src="logo_original_sin_linea-removebg-preview.png" style="position: relative; margin-top: -50px;" width="180px" height="190px"></div>

</header>
    <div class="um justify-content-center sticky-top">
    <div class="perf">
      <div class="mostrar">
<?php  
      while ($row = $Perfil1->fetch_assoc()) {?>
<div class='foto'><img src="data:image/*;base64,<?php
echo base64_encode($row['Foto']) ?>"></div>
                <?php

                echo "<div class='text'>";
                echo "<h1 class='h1'>" . $row["Nombre1"] . " " .$row["Nombre2"]." ". $row["Apellido1"] ." ".$row["Apellido2"]. "</h1>";
                echo "</div>";
               

            }
            ?>

               
             </div>
           </div>
      <div class="mostrar2">
        <div class="contenedor1">
            <?php
            while ($row2 = $Servicio->fetch_assoc()) {
                echo "<div class='profesion'>";
                echo "<h4>Profesiones: <br>" . $row2["Servicio1"] . "</h4>";
                echo "<h4>" . $row2["Servicio2"] . "</h4>";
                echo "<h4>" . $row2["Servicio3"] . "</h4>";

                echo "</div>";
            }
            ?>

</div>
<div class="contenedor2"><?php while($row = $Perfil1->fetch_assoc()){
  echo "<h4>" . $row["Descripcion"] . "</h4>";}?>
        <button id="showFormBtn" class="btn btn-primary">Enviar Solicitud</button>
        
      <form id="messageForm" method="post" class="mt-3 d-none">
             <div class="mb-3">
              <label>Problema</label><br>
              <input type="text" name="Problema" required><br>
                <label for="message" class="form-label">Descripcion</label>
 
                <textarea class="form-control" name="message" rows="4" required></textarea>
                <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                 <input type="hidden" name="idtra" value="<?php echo $idTRA; ?>">

                 <input type="submit" value="Enviar">

            </div>
            </form> 
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    
    include 'Conexion.php';

    $problema = $_POST["Problema"];
    $descripcion = $_POST["message"];
    $idPerfil = $_POST["id"];
    $idTRA = $_POST["idtra"];

  
    $Insertar = "INSERT INTO `notificaciones` (`ID_Notificacion`, `Problema`, `mensaje`, `Estado`, `ID_Perfil`, `Id2`) VALUES ('$problema', '$descripcion', '$idPerfil', '$idTRA')";

    if ($conexion->query($Insertar) === TRUE) {
        echo "Los datos se han insertado correctamente.";
    } else {
        echo "Error al insertar datos: " . $conexion->error;
    }
}
?>


        
         <form action="interaccion.php" method="POST">
        

        <input type="hidden" name="id_usuario_perfil" value="<?php echo $idPerfil; ?>">
        <input type="submit" class="message-button" name="Enviar Mensaje">
      </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
    const showFormBtn = document.getElementById("showFormBtn");
    const messageForm = document.getElementById("messageForm");

    showFormBtn.addEventListener("click", function() {
        showFormBtn.classList.add("d-none");
        messageForm.classList.remove("d-none");
    });
});

    </script>
              
            </div>
          </div>
            </div>
        
<div class="um1 justify-content-center sticky-top" id="umu">
<div class="un container">
  <div class="row justify-content-center">
    <div class="form-group col">
       <div class="foto1"><img src='Perfil.jpg' alt='Foto (No aparece)' width="100%" height="100%" style="border-radius: 45%; margin-top: -5px;"></div>
  <form id="msform"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
  <fieldset> 

    <h3 class="fs-subtitle">Deja tu comentario :D y tu califación. (Minimo una estrella)</h3>
    <div class="rati">
    <i class="bi bi-star-fill star checked"></i>
    <i class="bi bi-star-fill star"></i>
    <i class="bi bi-star-fill star"></i>
    <i class="bi bi-star-fill star"></i>
    <i class="bi bi-star-fill star"></i> 
  </div>
    <textarea name="res" placeholder="Agrega un comentario"></textarea>
    <input type="hidden" name="stars" id="stars" value="1">
    <input type="hidden" name="perfil" value="<?php echo $idPerfil; ?>">
    <input type="submit" name="next" class="submit action-button" value="Publicar" />
  </fieldset> 
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

  <script type="text/javascript">

    const stars = document.querySelectorAll('.star');
    stars.forEach(function(star, index){
      star.addEventListener('click', function(){
        for (let i=0; i<=index; i++){
          stars[i].classList.add('checked'); 
           document.getElementById("stars").value=index+1;          
        }
        for (let i=index+1; i<stars.length; i++){
          stars[i].classList.remove('checked');
        
        }
      })
    })

  </script>
</form>  
</div>
</div>
</div>
</div>

<?php  
include ("Conexion.php");
if (isset($_POST['next'])){
  if (isset($_POST['res'])){
    $res =  $_POST['res']; //reseña
    $valor = $_POST['stars']; //nnumero de estrellas
    $perfil = $_POST['perfil'];
    echo $res;
    echo $valor;
    echo $perfil;
    date_default_timezone_set('America/El_Salvador');
$Hr=date("Y-m-d H:i:s"); //fecha y hora

  if ($res) {
    $SQL = "INSERT INTO res(res,star,hr,id) VALUES ('$res', '$valor', '$Hr', 'Usuario');";
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
<div class="y" style="width: 100%; height: auto; max-height: 300px; overflow: hidden;">
<div class="tdv" style=" position: relative; overflow-y: scroll; height: 300px;">
 <table class="table table-striped">

        <thead>    
            <tr>
                <th scope="col" style="color: black;">Comentarios</th>
        
        </thead>

<tbody>       
      <?php
      $sql = "SELECT * FROM res order by hr desc"; // que se ordene por la hora
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