<?php  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style type="text/css">
		#uwu{
			position: absolute;
			top: 0;
			bottom: 0;
			right: 0;
			background-color: black;
			width: 40%;
			height: 100%;
			opacity: 0;
			visibility: hidden;
		}
		#uwu.visible{
			opacity: 1;
			visibility: visible;
		}
	</style>
</head>
<body>
	<a href="#" id="abrir"><button>Waos</button></a>
	<div id="uwu">
		<a href="#" id="cerrar"><button>Waos</button></a>
	</div>
	<script type="text/javascript">
		const nav = document.querySelector("#uwu");
		const abrir = document.querySelector("#abrir");
		const cerrar = document.querySelector("#cerrar");

abrir.addEventListener("click", () => {
    nav.classList.add("visible");
})

cerrar.addEventListener("click", () => {
    nav.classList.remove("visible");
})
	</script>
</body>
</html>