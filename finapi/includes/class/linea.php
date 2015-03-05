<?php

class LineaFing
{
	protected $nombre_fichero;
	
	public function __constructor ()
	{
	}
	public function setnombre_fichero ($valor)
	{
		$this->nombre_fichero = $valor;
	}
	public function generarlineastabla()
	{
		$fila = 0;
		if(($gestor = fopen($this->nombre_fichero, "r")) != FALSE)
		{
			while (($linealeida[$fila] = fgetcsv($gestor, 0, ";")) !== FALSE)	
			{
				$numero = count($linealeida[$fila]);
        		$fila++;
        	}
    		fclose($gestor);
		}
		else
			echo "<div class='alert-box error'><span>error: </span> No existe el archivo de resultados, ejecute la consulta de nuevo.</div>";

		return $linealeida;
	}
}


class Lineacsv extends LineaFing
{
	protected $host_name;
	protected $alias;
	protected $address;

	public function sethost_name ($valor)
	{
		$this->host_name = $valor;
	}
	public function setalias ($valor)
	{
		$this->alias = $valor;
	}
	public function setaddress ($valor)
	{
		$this->address = $valor;
	}
	public function generarlineascsv()
	{
		$lineacsv[0] = $this->host_name;
		$lineacsv[1] = $this->alias;
		$lineacsv[2] = $this->address;
		$lineacsv[3] = "";
		$lineacsv[4] = "24x7";
		$lineacsv[5] = "24x7";
		$lineacsv[6] = "";
		$lineacsv[7] = "";
		$lineacsv[8] = "";
		$lineacsv[9] = "Default Nagios";
 			
		return $lineacsv;
	}
}

?>