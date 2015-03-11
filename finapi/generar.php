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
<div>
<table width="100%" border="0" cellspacing="0px">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><img src="includes/images/finapi.png" width="265" height="80" alt="FiNaPi" /></td>
    <td align="right">
    <div id="menu">
		<ul>
  			<li class="nivel1"><a href="finapi.php" title="Inicio" target="_self" class="nivel1">Inicio</a></li>
			<li class="nivel1"><a href="rastreo.php" title="Rastreo" target="_self" class="nivel1">Rastreo</a></li>
			<li class="nivel1"><a href="#" title="Monitorización" class="nivel1">Monitorización</a>
<!--[if lte IE 6]><a href="#" class="nivel1ie">Opción 3<table class="falsa"><tr><td><![endif]-->
				<ul>
					<li><a href="/nconf" title="NConf">NConf</a></li>
					<li><a href="/nagios" title="Nagios">Nagios</a></li>
					<li><a href="/nagvis" title="NagVis">NagVis</a></li>
				</ul>
<!--[if lte IE 6]></td></tr></table></a><![endif]-->
			</li>
			<li class="nivel1"><a href="#" class="nivel1">Administración</a>
<!--[if lte IE 6]><a href="#" class="nivel1ie">Opción 4<table class="falsa"><tr><td><![endif]-->
				<ul>
					<li><a href="/phpmyadmin" title="PhpmyAdmin">Phpmyadmin</a></li>
					<li><a href="/raspcontrol" title="Raspcontrol">RaspControl</a></li>
				</ul>
<!--[if lte IE 6]></td></tr></table></a><![endif]-->
			</li>
  			<li class="nivel1"><a href="ayuda.php" title="Ayuda" target="_self" class="nivel1">Ayuda</a></li>
            <li class="nivel1"><a href="login.php" title="Cerrar Sesión" target="_self" class="nivel1"><img src='includes/images/shut_down.png' alt='Cerrar Sesión' name='cerrarsesion' width='20' height='20' id='cerrarsesion' /></a></li>
		</ul>
    </div>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</div>
</div>
<div id="layer">
	<div id="layerc">
		<p>Generando resultados...</p>
		<div id="layerClock"></div>
	</div>
</div>
</body>
</html>