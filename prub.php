<?php  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action="imagen1.php" enctype="multipart/form-data" method="POST">
	<input type="text" name="name">	
	<input accept="image/*" type="file" name="Foto" multiple> 
	<input class="submit action-button" type="submit" value="Enviar"/>
	</form>
</body>
</html>