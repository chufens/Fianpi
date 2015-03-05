<?php
class Comando
{
	protected $iteraciones;
	public function __constructor ($iter)
	{
		$this->iteraciones = $iter;
	}
	public function setiteraciones ($valor)
	{
		$this->iteraciones = $valor;
	}
	public function ejecutarcomando ($valor)
	{
		if ($valor == 1) 
		{
			$fing = "sudo fing -o table,text -r " . $this->iteraciones;
			echo "<div class='alert-box comando'><span>resultado: </span><pre>";
			$salida = system ($fing, $retval);
			echo "</pre></div>";
			
			if ($retval == 0)
				echo "<div class='alert-box success'><span>correcto: </span> El comando se ha ejecutado correctamente.</div><br>";
			else
				echo "<div class='alert-box error'><span>error: </span> Se ha producido un error en la ejecución del comando.</div>";
		}
		else if ($valor == 2)
		{
			$fing = "sudo fing -o table,html,/var/www/finapi/includes/archives/salida.html -r " . $this->iteraciones;
			$salida = exec ($fing, $output, $retval);
			if ($retval == 0)
			{
				echo "<div class='alert-box success'><span>correcto: </span> El comando se ha ejecutado correctamente.</div><br>";
				include_once ("includes/archives/salida.html");
			}
			else
				echo "<div class='alert-box error'><span>error: </span> Se ha producido un error en la ejecución del comando.</div>";
		}
		else if ($valor == 3)
		{
			$fing = "sudo fing -o table,csv,/var/www/finapi/includes/archives/salida.txt -r " . $this->iteraciones;
			$salida = exec ($fing, $output, $retval);
			if ($retval == 0)
				echo "<div class='alert-box success'><span>correcto: </span> El comando se ha ejecutado correctamente.</div><br>";
			else
				echo "<div class='alert-box error'><span>error: </span> Se ha producido un error en la ejecución del comando.</div>";
		}
	}
}
?>