<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FiNaPi</title>
<script type="text/javascript" src="includes/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="includes/js/lightbox.min.js"></script>
<link rel="stylesheet" type="text/css" href="includes/css/fing.css"/>
<link rel="stylesheet" type="text/css" href="includes/css/lightbox.css"/>
<link rel="shortcut icon" href="../favicon.ico">
</head>
<?php
if (isset($_GET["opt"]))
	$opcion = $_GET["opt"];
else
	$opcion = 0;
?>
<body id="contenedorweb">
<?php
include 'header.php';
?>
<table width='100%' border='0'>
 	<tr>
  		<td width="100%" class="texto"><a href="finapi.php" title="Inicio" target="_self">Inicio</a> >> Ayuda</td>
  	</tr>
    </table>
   <table>
   <tr>
    	<td>&nbsp;</td>
    </tr>
    <tr>
		<td valign='top' width='25%'>
        <div id="menu2">
		<ul>
  			<li class="nivel1 primera"><a href="ayuda.php?opt=1" class="nivel1">La Aplicación</a></li>
  			<li class="nivel1"><a href="ayuda.php?opt=2" class="nivel1">Rastreo</a></li>
  			<li class="nivel1"><a href="ayuda.php?opt=3" class="nivel1">NConf</a></li>
		  	<li class="nivel1"><a href="ayuda.php?opt=4" class="nivel1">Nagios</a></li>
		  	<li class="nivel1"><a href="ayuda.php?opt=5" class="nivel1">Nagvis</a></li>
		  	<li class="nivel1"><a href="ayuda.php?opt=6" class="nivel1">RaspControl</a></li>
		  	<li class="nivel1"><a href="ayuda.php?opt=7" class="nivel1">PhpMyadmin</a></li></li>
		</ul>
		</div>
		</td>
		<td>
			<div>
            <?php 
			require_once("includes/class/conexion.php");
			$conexion = new mysqli($servidor, $usuario, $password, $basedatos);
			
			if ($conexion->connect_errno)
			{
				echo "Error al establecer la conexión con la base de datos: " . $conexion->connect_error;
				exit;
			}
			
			/* cambiar el conjunto de caracteres a utf8 */
			
			if (!$conexion->set_charset("utf8")) 
			{
    			printf("Error cargando el conjunto de caracteres utf8: %s\n", $mysqli->error);
			}
			
			switch ($opcion){
				case 1: 
					$tit = "La Aplicación Web";
					break;
				case 2: 
					$tit = "Rastreo";
					break;
				case 3: 
					$tit = "NConf";
					break;
				case 4: 
					$tit = "Nagios";
					break;
				case 5: 
					$tit = "Nagvis";
					break;
				case 6: 
					$tit = "RaspControl";
					break;
				case 7: 
					$tit = "PhpMyAdmin";
					break;
				default: 
					$tit = "La Aplicación Web";
					break;
				}
				
			$resultado = $conexion->query('SELECT * FROM fin_ayuda WHERE titulo_tema = "'. $tit . '"');
			echo "<table>";
			while ($fila = $resultado->fetch_array())
			{
				echo "<tr><td class='Titulo2'>$fila[1]</td></tr>\r\n";
				echo "<tr><td>$fila[2]</td></tr>\r\n";
			}
			echo "</table>";
			?>
            
            </div>
		</td>
	</tr>
</table>           
</body>
</html>