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
					<li><a href="/nconf" title="NConf" target="_blank">NConf</a></li>
					<li><a href="/nagios" title="Nagios" target="_blank">Nagios</a></li>
					<li><a href="/nagvis" title="NagVis" target="_blank">NagVis</a></li>
				</ul>
<!--[if lte IE 6]></td></tr></table></a><![endif]-->
			</li>
			<li class="nivel1"><a href="#" class="nivel1">Administración</a>
<!--[if lte IE 6]><a href="#" class="nivel1ie">Opción 4<table class="falsa"><tr><td><![endif]-->
				<ul>
					<li><a href="/phpmyadmin" title="PhpmyAdmin" target="_blank">Phpmyadmin</a></li>
					<li><a href="/raspcontrol" title="Raspcontrol" target="_blank">RaspControl</a></li>
				</ul>
<!--[if lte IE 6]></td></tr></table></a><![endif]-->
			</li>
  			<li class="nivel1"><a href="ayuda.php" title="Ayuda" target="_self" class="nivel1">Ayuda</a></li>
            <li class="nivel1"><?php
			if (!empty($_SESSION["usuario"]))
			{
				echo "<a href='login.php?funcion=cerrarSesion' title='Cerrar Sesión' class='nivel1'><img src='includes/images/shut_down.png' alt='Cerrar Sesión' name='cerrarsesion' width='20' height='20' id='cerrarsesion' /></a>\n";
			}
			else
			{
				echo "<a href='login.php' target='_self' title='Login' class='nivel1'><img src='includes/images/login.png' alt='Iniciar Sesión' name='login' width='20' height='20' id='login' /></a>\n";
			}
		?></li>
		</ul>
    </div>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</div>