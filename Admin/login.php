<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio Sesión Admin</title>
    <link rel="stylesheet" type="text/css" href="login.css">

</head>
<body>
<?php
session_start();

if(isset($_POST['username']) && isset($_POST['password'])) {
  include "Cone.php";

  $username = $_POST['username'];
  $password = $_POST['password'];


  $query = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conexion, $query);

if (mysqli_num_rows($result) == 1) {
   
    session_start();
    $_SESSION['username'] = $username;
    header("location: index.php");
} else {
  
    echo "<script>alert('Usuario o Contraseña Incorrecta')</script>";
}
}
?>
   <center>
    <h1 class="texto2">Inicio de sesion</h1>
    <h2 class="texto3">Administrador</h2>
    <br>
    <form method="post">
        <input type="username" name="username" placeholder="Usuario" autocomplete="off"
        class="inputestilo" id="username"><br>
        <input type="password" name="password" placeholder="Contraseña" 
        class="inputestilo" id="password"><br><br>
        <input type="submit" value="Aceptar" class="inputboton">  <input type="reset" value="Borrar" class="inputboton">
</center>
    </form>
</body>
</html>

