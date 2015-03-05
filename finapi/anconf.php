<?php
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;

session_start();
if(empty($_SESSION["usuario"]))
	header ('Location: rastreo.php');

	//print_r($_COOKIE);
	$enviado = $_COOKIE['enviado'];
	$nombre_array = unserialize ($_COOKIE["nombre"]);
	$alias_array = unserialize ($_COOKIE["alias"]);
	$ip_array = unserialize ($_COOKIE["ip"]);	
	$cuantos = count($nombre_array);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FiNaPi - Exportación a NConf</title>
<link rel="stylesheet" type="text/css" href="includes/css/fing.css" />
<script type="text/javascript" src="includes/js/fing.js" ></script>
<script type="text/javascript" src="includes/js/jquery.min.js"></script>
<script type="text/javascript">
$(window).load(function() {
	$(".loader").fadeOut("slow");
})
</script>
</head>
<body  id="contenedorweb" class="texto">
<?php
ini_set('track_errors', 1);
include 'header.php';

include_once 'includes/class/linea.php';
include_once 'includes/class/archivo.php';
?>

<div><a href="rastreo.php" title="Inicio" target="_self">Inicio</a> >>  <a href="rastreo.php" title="Rastreo" target="_self">Rastreo</a> >> <a href="resultados.php" title="Resultados" target="_self">Resultados</a> >> Resultado de la Exportación
</div>
<div>
<?php
	$linea1 = new Lineacsv();
	$file = fopen("includes/archives/nconf.csv", "w");
	if (!$file) {
  		echo 'Error en la apertura del archivo, razón: ', $php_errormsg;
	}
	$archivo = new Archivocsv(0);
	$archivo->setarchivo($file);

	//Cambiar esto por foreach para array de nombre alias e ip que provienen seleccionados de la exportar
	for($x=1;$x<=$cuantos;$x++)
	{
		$nombre = $nombre_array[$x];
		$alias = $alias_array[$x];
		$ip = $ip_array[$x];
		$linea1->sethost_name($nombre);
		$linea1->setalias($alias);
		$linea1->setaddress($ip);
		$lineacsv[$x] = $linea1->generarlineascsv();
	}

	$archivo->generarcsv($lineacsv);
	fclose($file);
	
	echo "<br>
		<div class='alert-box notice'><span>información:  </span>  Se ha ejecutado el proceso de exportación. Revise los resultados del mismo a continuación.</div>
		<br>";
		
	$archivo->exportarNConf();

echo "<div align='center'><table width='100%' border='0'><tr><td>";
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);
echo '<span class="texto">Exportación realizada en '.$total_time.' segundos.</span>';
echo "</td></tr></table></div>";	
?>
</div>
</body>
</html>