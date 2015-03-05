<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base target="_blank" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FiNaPi</title>
<link rel="stylesheet" type="text/css" href="includes/css/fing.css"/>
</head>
<body id="contenedorweb" class="texto">

<?php
include 'header.php';
?>
<div>Inicio</div>

<div align="left"><h1>Bienvenidos a FiNaPi</h1></div>

<div align="justify"><p>Con Finapi podrás Monitorizar tu red de una manera sencilla. Podrás descubrir que equipos están en tu red con la utilidad de rastreo basada en Fing, añadir o eliminar hosts y servicios con Nconf, tener una imagen visual de tu red con Nagios o Nagvis, modificar cualquier base de datos con PhpMyamdin o monitorizar tu raspberry con RaspControl.</div>

<div align="justify"><p>A continuación encontrarás los enlaces necesarios para poder acceder a los diversos módulos junto con las contraseñas de acceso a los mismo. Y <a href="ayuda.php">aquí</a> puedes acceder la ayuda online, o si lo prefieres, desde <a href="../includes/docs/Manual Finapi.pdf">aquí</a> puedes descargarte el manual de uso en formato pdf.</div>

<div>
    <table border="0" cellspacing="0px" align="center">
      <tr>
        <td><strong>·</strong></td>
        <td><a href="rastreo.php" title="Rastreo" target="_self">Rastreo</a></td>
        <td class="texto"><em>(finapi/finapi)</em></td>
      </tr>
      <tr>
        <td><strong>·</strong></td>
        <td><a href="/nconf" title="NConf">Nconf</a></td>
        <td class="texto"><em>(nconf/nagiosadmin)</em></td>
      </tr>
      <tr >
        <td width="14"><strong>·</strong></td>
        <td width="134"><a href="/nagios3" title="Nagios">Nagios</a></td>
        <td width="285" class="texto"><em>(nagiosadmin/nagiosadmin)</em></td>
      </tr>
      <tr>
        <td><strong>·</strong></td>
        <td><a href="/nagvis" title="Nagvis">Nagvis</a></td>
        <td class="texto"><em>(admin/admin)</em></td>
      </tr>
      <tr>
        <td><strong>·</strong></td>
        <td><a href="/phpmyadmin" title="Phpmyadmin">Phpmyadmin</a></td>
        <td class="texto"><em>(root/nagiosadmin)</em></td>
      </tr>
      <tr>
        <td><strong>·</strong></td>
        <td><a href="/raspcontrol" title="RaspControl">RaspControl</a></td>
        <td class="texto"><em>(finapi/finapi)</em></td>
      </tr>
    </table>
</div>

<p><div class="Titulo">Más información:</div>
<div><p>
	<table border="0" cellspacing="0px">
      <tr>
        <td>&nbsp;</td>
        <td><strong>·</strong></td>
        <td class="texto"><strong>Fing</strong></td>
        <td><a href="http://www.overlooksoft.com/fing">Overlooksoft.com</a></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td><strong>·</strong></td>
        <td class="texto"><strong>Nconf</strong></td>
        <td><a href="http://www.nconf.org">Nconf.org</a></td>
        </tr>
      <tr>
        <td width="61">&nbsp;</td>
        <td width="7"><strong>·</strong></td>
        <td width="123"  class="texto"><strong>Nagios</strong></td>
        <td width="309"><a href="http://www.nagios.org">Nagios.org</a></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><strong>·</strong></td>
        <td class="texto"><strong>Nagvis</strong></td>
        <td><a href="http://www.nagvis.org">Nagvis.org</a></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td><strong>·</strong></td>
        <td class="texto"><strong>Phpmyadmin</strong></td>
        <td><a href="http://www.phpmyadmin.net">Phpmyadmin.net</a></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td><strong>·</strong></td>
        <td class="texto"><strong>RaspControl</strong></td>
        <td><a href="https://github.com/harmon25/raspcontrol">RaspControl Github Page</a></td>
      </tr>
    </table>
</div><p>

<?php
include 'footer.php';
?>

</body>
</html>
