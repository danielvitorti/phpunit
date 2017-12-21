<?php

class Avaliador
{

	public $menorValor = -INF;
	public $maiorValor = INF;
	public function avalia(Leilao $leilao)
	{
		foreach($leilao->getLances() as $lance)
		{
			if($lance->getValor() > $this->maiorValor)
			{
				$this->maiorValor = $lance->getValor();
			}
			else if($lance->getValor() < $this->menorValor)
			{
				$this->menorValor = $lance->getValor();
			}
		}
	}


	public function getMaiorLance()
	{
		return $this->maiorValor;
	}

	public function getMenorLance()
	{
		return $this->menorValor;
	}
}

