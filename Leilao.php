<?php
	class Leilao {
		private $descricao;
		private $lances;
		
		function __construct($descricao) {
			$this->descricao = $descricao;
			$this->lances = array();
		}
		
		public function propoe(Lance $lance) {
			$this->lances[] = $lance;
		}

		public function getDescricao() {
			return $this->descricao;
		}

		public function getLances() {
			return $this->lances;
		}


		public function propoe(Lance $lance) 
{
    if(count($lances) == 0 || $this->podeDarLance($lance->getUsuario())) {
        $lances[] $lance;
    }
}

private function podeDarLance(Usuario $usuario) 
{
    return !$this->ultimoLanceDado()->getUsuario()->getNome() == $usuario->getNome() && $this->qtdDelancesDo($usuario) < 5;
}

private function qtdDelancesDo(Usuario $usuario) 
{
    $total = 0;

    foreach($lances as $lance) {
        if($lance->getUsuario()->getNome() == $usuario->getNome()) $total++;
    }

    return $total;
}

private function ultimoLanceDado() 
{
    return $lances[count($lances)-1);
}





	 public function dobraLance(Usuario $usuario) 
    {
        $ultimoLance = $this->ultimoLanceDo($usuario);
            $this->propoe(new Lance($usuario, $ultimoLance->getValor()*2));
    }

    private function ultimoLanceDo(Usuario $usuario) 
    {
        $ultimo = null;
        foreach($this->lances as $lance) {
            if($lance->getUsuario()->getNome() == $usuario->getNome() ) $ultimo = $lance;
        }

        return $ultimo;
    }










	}
?>