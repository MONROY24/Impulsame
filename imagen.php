<?php 

include_once "consulta.php";
$sql = "SELECT * FROM 
`perfil1` WHERE Nombre1 = 'Si'";
$res = mysqli_query($conexion, $sql);
$e = mysqli_fetch_assoc($res);
echo $e['Nombre1'];
?>
<img src="data:image/*;base64,<?php
echo base64_encode($e['Foto']) ?>">

