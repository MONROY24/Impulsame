<?php 
include('Cone.php');
$cuentaver = "En Proceso";
$query = "SELECT * FROM perfil WHERE Estado ='$cuentaver'";

$resultado = $conexion->query($query);

// Inicializar la variable $perfiles como un arreglo vacío
$perfiles = array();

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $perfiles[] = $fila;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Interfaz de Administrador</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body> 
    <header> 
        <?php
    include 'menu.php';
        ?> 
      </header>
      <br><br><br><br>
    <center><h1>Administrador</h1></center>
    <h3>Perfiles de Usuarios en Proceso</h3>
    <table>
        <thead>
            <tr>
                 <th>Foto</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Descripción</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            
         <?php
                
            foreach ($perfiles as $perfil) {
                echo "<tr>";
                echo "<td><img src='" . $perfil['Foto'] . "' alt='Foto de perfil'></td>";
                echo "<td>" . $perfil['Nombre1'] . " " . $perfil['Nombre2'] . " </td>";
                echo "<td>" . $perfil['Apellido1'] . " " . $perfil['Apellido2'] . "</td>";
                echo "<td>" . $perfil['Descripcion'] . "</td>";
                echo "<td><button onclick='verPerfil(" . $perfil['ID_Perfil'] . ")'>Ver Detalles</button></td>";
                echo "</tr>";
            }
            ?>

        </tbody>
    </table>
<div id="perfilDialog" class="dialog">
    <h2>Datos del Usuario</h2>
    <img id="foto" src="" alt="Foto de perfil">
    <p>Nombre 1: <span id="nombre"></span></p>
    <p>Nombre 2: <span id="nombre2"></span></p>
    <p>Apellido 1: <span id="apellido1"></span></p>
    <p>Apellido 2: <span id="apellido2"></span></p>
    <p>Teléfono: <span id="telefono"></span></p>
    <p>Fecha de Nacimiento: <span id="fechaNac"></span></p>
    <p>DUI: <span id="dui"></span></p>
    <p>Dirección: <span id="direccion"></span></p>
    <p>Correo: <span id="correo"></span></p>
    <p>Descripción: <span id="descripcion"></span></p>
    <p>Cuenta: <span id="cuenta"></span></p>
    <button onclick='aceptarPerfil(<?php echo $perfil['ID_Perfil']; ?>)'>Aceptar</button>
    <button onclick='denegarPerfil(<?php echo $perfil['ID_Perfil']; ?>)'>Bloquear</button>
    <button onclick="cerrarDialog()">Cerrar</button>
</div>
   
<br>
<br>
<div id="mensajeConfirmacion" class="mensaje-oculto">
    ¡Perfil aceptado exitosamente!
</div>
<div id="mensajeDenegado" class="mensaje-oculto">
    ¡Perfil Bloqueado!
</div>
<?php 
if (!$resultado) {
    die("Error en la consulta: " . $conexion->error);
}
 ?>

    <script src="script.js"></script>

    <footer>
        <div class="contenedor">
            <div class="sec pre">
                <h3>Equipo Elite 🥱</h3>
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

