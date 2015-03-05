<?php

class Archivocsv
{
	protected $linea;
	protected $file;
	protected $cabecera = array("host_name","alias","address","os","check_period","notification_period","contact_groups","parents","host-preset","monitored_by");
	
	public function __constructor ($valor1, $valor2)
	{
		$this->linea = $valor1;
		$this->file = $valor2;
	}
	public function setarchivo ($valor)
	{
		$this->file = $valor;
	}
	public function generarcsv ($linea)
	{
		fputcsv ($this->file, $this->cabecera, ";");
		foreach ($linea as $csv)
			fputcsv($this->file, $csv, ";");
	}


	public function exportarNConf ()
	{
		$nconf = "/var/www/nconf/bin/add_items_from_csv.pl -c host -f /var/www/finapi/includes/archives/nconf.csv";
		echo "<div class='alert-box comando'><span>resultado: </span><pre>";
		$salida = system ($nconf, $retval);
		echo "</pre></div>";
	}
}
?>