<?php
session_start();
if(isset($_SESSION["usuario"]))
	header ('Location: rastreo.php');
	
	
if (isset($_GET["funcion"]))
 	if ($_GET["funcion"] == "cerrarSesion")
 		{
			session_destroy();
			header("Location: rastreo.php");
		}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FiNaPi - Login de Acceso</title>
<link rel="stylesheet" type="text/css" href="includes/css/fing.css"/>
<link rel="shortcut icon" href="../favicon.ico">
</head>
<?php
$usuario_ok = "finapi";
$contraseña_ok = "finapi";
$marcado = FALSE;

if ((!empty($_COOKIE["recordar"])) && ($_COOKIE["recordar"] = 1))
{
	$marcado = TRUE;
	if (!empty($_COOKIE["usuario"]))
		$user = $_COOKIE["usuario"];
}
else 
{
	$marcado = FALSE;
	$user = "";
}

if (!empty($_POST["nombre"]))
{
	$user = $_POST["nombre"];
	if(!empty($_POST["recordar"]))
		$marcado = TRUE;
	else
		$marcado = FALSE;	
}
?>
<body id="contenedorweb">
<?php
include 'header.php';
?>
<div class="texto"><a href="finapi.php" title="Inicio" target="_self">Inicio</a> >> Rastreo
</div>  	
<p align="center" class="texto">Por favor, introduzca el usuario y la contraseña de acceso.</p>

<div align="center">
  <form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
	<table width="371" border="0">
	  <tr>
    	<td align="right" class="texto">Nombre de usuario</td>
    	<td><input type="text" name="nombre" id="nombre" value="<?php echo"$user"; ?>" autofocus></td>
    	<td>&nbsp;</td>
  	  </tr>
  	  <tr>
    	<td class="texto" align="right">Contraseña</td>
    	<td><input type="password" name="contraseña" id="contraseña"></td>
    	<td><input type="submit" value="Enviar" name="btnEnviar" id="btnEnviar" class="boton"></td>
      </tr>
      <tr>
    	<td colspan="2" class="texto" align="center"><input type="checkbox" name="recordar" id="recordar" value="1"<?php if ($marcado) { echo ' checked'; } ?>>Recordar usuario</td>
    	<td>&nbsp;</td>
      </tr>
	</table>
  </form>
</div>
<?php
if (!empty($_POST["btnEnviar"]))
{
	if (empty($_POST["nombre"]))
		echo "<table align='center'><tr><td class='alert-box warning'><span>atención: </span> Falta rellenar el campo Nombre.</td></tr></table>";
		else
		{
			if (empty($_POST["contraseña"]))
					echo "<table align='center'><tr><td  class='alert-box warning'><span>atención: </span> Falta rellenar el campo Contraseña.</td></tr></table>";
			else
			{
				if (($_POST["nombre"] != $usuario_ok) || ($_POST["contraseña"] != $contraseña_ok))
				{
				 	echo "<table align='center'><tr><td  class='alert-box error'><span>error: </span> Usuario o Contraseña incorrectos.</td></tr></table>";
				}
				else
				{
					$user = $_POST["nombre"];
					$_SESSION["usuario"] = $user;
					if (isset($_POST["recordar"]))
					{
						setcookie("usuario",$user);
						setcookie("recordar",1);
						header ('Location: rastreo.php');
					}
					else
					{
						setcookie("usuario",$user);
						setcookie("recordar",0);
						header ('Location: rastreo.php');
					}
				}
			}
		}
}
?>
</body>
</html>