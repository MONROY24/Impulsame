<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="index.css">
	<title></title>
</head>
<body>

 <?php
    include 'menu.php';

        ?> 

</header>
<br>
<br>
<br>
<br>
	<div class="container">
		<div class="section">
<p class="texto">"
<?php
include 'frases.php';
  echo "$frase";
?>"
</p>
		</div>
	<div class="section">
		<div class="slider">
  		<div class="slides">
    			<div class="slide">
    				<img src="imagenes/trabajadores1.jpg">
    			</div>
    			<div class="slide">
    				<img src="imagenes/trabajadores6.jpg">
    			</div>
    			<div class="slide">
    				<img src="imagenes/trabajadores3.jpeg">
    			</div>
    			<div class="slide">
    				<img src="imagenes/trabajadores4.jpeg">
    			</div>
    			<div class="slide">
    				<img src="imagenes/trabajadores5.jpeg">
    			</div>
 		 	</div>
		</div>

	</div>
</div>
		<script type="text/javascript" src="slider.js"></script>
	
</body>
</html>