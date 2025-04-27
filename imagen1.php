<?php  
include "consulta.php";
$nombre = $_POST['name'];
$foto = addslashes(file_get_contents($_FILES['Foto']['tmp_name']));
$sql = "INSERT INTO `perfil1` (Nombre1, Foto) VALUES ('$nombre','$foto')";

$resul=$conexion->query($sql);

if($resul){
	header("location:imagen.php");
}
else{
	echo "algo salio mal unu";
}
?>
