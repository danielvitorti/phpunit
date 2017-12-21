<?php 

class Lance
{

	private $usuario;
	private $valor;


	function __construct(Usuario $usuario, $valor)
	{
		$this->usuario = $usuario;
		$this->valor = $valor;
		
	}
	
	public function getUsuario()
	{
		return $this->Usuario;
	}

	public function getValor()
	{
		return $this->valor;
	}

}

