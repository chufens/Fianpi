<?php
session_start();
if(empty($_SESSION['usuario']))
	header ('Location: rastreo.php');
	
setcookie('anconf', $_POST['Enviar_a_Nconf']);

$id = $_POST["contador"];

for ($x=1;$x<=$id;$x++)
{
	$selec = "seleccion" . $x;
	if (isset($_POST[$selec]))
	{	 
		$n = "nombre" . $x;
		$a = "alias" . $x;
		$i = "ip" . $x;
		$nombre = $_POST[$n];
		$alias = $_POST[$a];
		$ip = $_POST[$i];
		$Existe = 1;
		$nombre_array[$x] = $nombre;
		$alias_array[$x] = $alias;
		$ip_array[$x]= $ip;
	}
}


setcookie ("nombre", serialize($nombre_array));
setcookie ("alias" , serialize($alias_array));
setcookie ("ip", serialize($ip_array));
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
	$("#wrapper").load("anconf.php", function(){
		// Una vez se ha cargado el archivo, escondemos el reloj
		$("#layer").hide();
	});
});
</script>
<link rel="stylesheet" type="text/css" href="includes/css/fing.css"/>
<title>FiNaPi - Exportación a NConf</title>
</head>

<body id="contenedorweb" class="texto">
<div id="wrapper">
<?php
include 'header.php';
?>
</div>
<div id="layer">
	<div id="layerc">
		<p>Exportando datos...</p>
		<div id="layerClock"></div>
	</div>
</div>
</body>
</html>