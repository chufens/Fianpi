<?php
class Red
{
	protected $ip;
	public function __contructor() {}
	//{
		//$this->ip = $ip;
//	}
	public function setipserver ($valor)
	{
		$this->ip = $valor;
	}
	private function encuentrapunto ()
	{
		$contador = 0;
		$posicion = 0;

		while ($contador < 3)
		{
			$pos = strpos($this->ip, '.', $posicion);
			$posicion = $pos + 1;  
			$contador ++;
		}
		return $pos;
	}
	public function cualeslared ()
	{
		$inicio = $this->ip;
		$fin = substr($inicio, 0, $this->encuentrapunto()) ;
		return $fin;
	}
}

?>