<?php
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;

session_start();
if(empty($_SESSION["usuario"]))
	header ('Location: rastreo.php');

else
{
	include_once 'includes/class/comando.php';
	include_once 'includes/class/linea.php';

	if (isset($_COOKIE["metodo"]))
	{
		$metodorecibido = $_COOKIE["metodo"];
		if ($metodorecibido == "texto")
			$metodo = 1;
		else if ($metodorecibido == "html")
			$metodo = 2;
		else if ($metodorecibido == "csv")
			$metodo = 3;
		
		$iteraciones = $_COOKIE["iteraciones"];
		if ($iteraciones != 1)
			$subf = "iteraciones";
		else
			$subf = "iteración";
	}
	else
		header ('Location: rastreo.php');
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FiNaPi - Resultados del análisis</title>
<link rel="stylesheet" type="text/css" href="includes/css/fing.css" />
<script type="text/javascript" src="includes/js/fing.js" ></script>
</head>
<body  id="contenedorweb" class="texto">
<div class="loader"></div>

<?php
include 'header.php';
?>
<div><a href="finapi.php" title="Inicio" target="_self">Inicio</a> >>  <a href="rastreo.php" title="Rastreo" target="_self">Rastreo</a> >> Resultados
</div>
<div>
	<p align="justify">
      <?php
		  echo "A continuación de muestran los resultados en formato " . $metodorecibido . " con "  . $iteraciones . " " . $subf . " :";
	  ?>
     </p>
</div>
<div>
    	<?php
			$comando = new Comando(1);
			$comando->setiteraciones($iteraciones);
			$comando->ejecutarcomando($metodo);

			if ($metodo == 3)
			{
				$id = 1;
				$nombre_fichero = 'includes/archives/salida.txt';
				$linea = new LineaFing();
				$linea->setnombre_fichero($nombre_fichero);
				$lineafingleida = $linea->generarlineastabla();
		?>
		<div align="justify">Puede modificar los valores de los campos que se muestran en amarillo. Seleccione los host que desea exportar y pulse el botón <em>Exportar datos</em> para transferirlos a NConf.<p></div>
        <div align="center">
			<form id='formcsv' name='formcsv' method='post' action='exportar.php' onsubmit='return validarFormResultados(this)'>
			<table class="Tabla">
				<tr>
					<th><input type='checkbox' name='todos' id='todos' onclick='marcar(this);' /></th>
					<th>Nombre</th>
					<th>Alias</th>
					<th>IP</th>
				</tr>
		<?php
			foreach($lineafingleida as $linea)
			{
				$ip = $linea[0];
				if (empty($linea[4]))
					$nombre = "host" . $id;
				else
					$nombre = $linea[4];
				$alias = $linea[6];
				if (($ip != "")) 
				{
					echo "<tr>
						<td><input type='checkbox' name='seleccion" . $id . "' id='seleccion" . $id . "' /></td>
						<td><input class='Texto' type='text' size='20' name='nombre" . $id . "' id='nombre" . $id . "' value='" . $nombre . "' style='background-color:#FFC' /></td>
						<td><input class='Texto' type='text' size='20' name='alias" . $id . "' id='alias" . $id . "' value='" . $alias . "' style='background-color:#FFC' /></td>
						<td><input class='Texto' type='text' name='ip" . $id ."' id='ip" . $id . "' value='" . $ip . "' readonly='readonly' /></td>
						</tr>";
					$id++;
				}
			
			}
			
		?>
    		</table>
   	    	<p><input type='hidden' name='contador' id='contador' value='<?php echo"$id"; ?>'> <input type='submit' name='Enviar_a_Nconf' id='Enviar_a_Nconf' value='Exportar datos' /><p>
        	</form>
		</div>
        <div align="center">
			<label id='noselec' class='alert-box warning' style='display:none;'><span>atención: </span> Debe seleccionar algún resgitro para exportar.</label>
	    </div>
			<?php
			}
			echo "<div aling='center'><table width='100%' border='0'><tr><td>";
			$time = microtime();
			$time = explode(' ', $time);
			$time = $time[1] + $time[0];
			$finish = $time;
			$total_time = round(($finish - $start), 4);
			echo '<span class="texto">Resultados generados en '.$total_time.' segundos.</span>';
			echo "</td></tr></table></div>";	
  		?>
</div>
</body>
</html>