<?php
session_start();
if(empty($_SESSION["usuario"]))
	header ('Location: rastreo.php');
	
setcookie("metodo", $_POST["metodo"]);
setcookie("iteraciones",$_POST["iteraciones"]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../favicon.ico">
<script type="text/javascript" src="includes/js/jquery-1.11.1.min.js"></script>
<script>
$(document).ready(function(){
	// Cargamos el contenido del archivo .php y lo pondremos en el id "wrapper"
	// Si queremos cargar el contenido del archivo.php se muestre en cualquier
	// otro id solo hay que cambiar "wrapper" por nuestro "id"
	$("#wrapper").load("resultados.php", function(){
		// Una vez se ha cargado el archivo, escondemos el reloj
		$("#layer").hide();
	});
});
</script>
<link rel="stylesheet" type="text/css" href="includes/css/fing.css"/>
<title>Finapi - Resultados del análisis</title>
</head>

<body id="contenedorweb" class="texto">
<div id="wrapper">
<?php
include 'header.php';
?>
</div>
<div id="layer">
	<div id="layerc">
		<p>Generando resultados...</p>
		<div id="layerClock"></div>
	</div>
</div>
</body>
</html>