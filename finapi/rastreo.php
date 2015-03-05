<?php
session_start();
if(empty($_SESSION["usuario"]))
	header ('Location: login.php');

include_once 'includes/class/red.php';
$ipserver = new Red(); 
$ipserver->setipserver($_SERVER['SERVER_ADDR']);
$result = 0;
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FiNaPi - Rastreo de equipos</title>
<link rel="stylesheet" type="text/css" href="includes/css/fing.css"/>
<link rel="shortcut icon" href="../favicon.ico">
<script type="text/javascript" src="includes/js/fing.js"></script>
</head>
<body id="contenedorweb"  class="texto">
<?php
include 'header.php';
?>
<div><a href="finapi.php" title="Inicio" target="_self">Inicio</a> >> Rastreo</div>
<div align="justify">
<p>Debes introducir el número de iteraciones que desees que haga el programa para rastrear los equipos activos en tu red, y pulsar el botón Acertar.</p>
<p>Dependiendo de número de iteraciones el programa tardará más o menos en ofrecer los resultados. Cuando haya terminado nos informará de ello y nos permitirá acceder a los resultados.</p>
</div>
<div align="justify">
Los diferentes métodos que tenemos para mostrar los resultados son los siguientes:
<table class="texto">
	<tr>
  		<td width="81" align="right"><strong>Texto:</strong></td>
  		<td width="906">Nos mostrará en pantalla los resultados.</td>
    </tr>
    <tr>
    	<td align="right"><strong>Html:</strong></td>
        <td>Nos mostrará en una nueva página los resultados en una tabla.</td>
    </tr>
    <tr>
    	<td align="right"><strong>Csv:</strong></td>
        <td>Se generará un archivo csv para poder tratar los datos y migrarlos a NConf.</td>
  	</tr>
</table>
<p>
</div>
<div align="center">
	<form id="formrastreo" name="formrastreo" method="post" action="generar.php" onSubmit="return validarFormRastreo(this)">
  		<table width="100%" border="0" class="texto">
    		<tr>
      			<td align="right">La red que se va a escanear es: </td>
      			<td><strong><?php echo $ipserver->cualeslared() . ".0/24"; ?></strong></td>
      		</tr>
    		<tr>
      			<td>&nbsp;</td>
   			  	<td>&nbsp;</td>
    		</tr>
    		<tr>
      			<td align="right">Método de salida:</td>
      			<td>
      				<select name="metodo" size="1" class="texto" id="metodo" autofocus>
  						<option value="">Seleccione una opción</option>
						<option value="texto">texto</option>
						<option value="html">html</option>
						<option value="csv">csv</option>
        			</select>
      			</td>
    		</tr>
    		<tr>
      			<td width="290" align="right">Número de iteraciones:</td>
      			<td width="334"><input type="text" name="iteraciones" id="iteraciones" style="background-color:#FF9" onKeyPress="javascript:return validarNro(event);" /></td>
    		</tr>
    		<tr>
      			<td>&nbsp;</td>
      			<td>
                	<input type="submit" name="Aceptar" id="Aceptar" value="Aceptar" />
                </td>
    		</tr>
  		</table>
	</form>
</div>
<div align="center">
    <label id="errormetodo" class='alert-box warning' style="display:none;"><span>atención: </span> Debe seleccionar un método de salida.</label>
              <label id="erroriteraciones" class='alert-box warning' style="display:none;"><span>atención: </span> Debe introducir el número iteraciones que quiere que realice fing.</label>
              <label id="errorletra" class='alert-box warning' style="display:none;"><span>atención: </span> El campo iteraciones debe de ser numérico.</label>
</div>
</body>
</html>