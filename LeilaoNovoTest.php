<?php
require "CriadorDeLeilao.php";

class LeilaoTest {



    public static function setUpBeforeClass() {
         var_dump("before class");
    }

    public static function tearDownAfterClass() 
    {
      var_dump("after class");
    }

    public function testReceberUmLance() {
        $criador = new CriadorDeLeilao();
        $leilao = $criador->para("Macbook")->constroi();
        $this->assertEquals(0, count($leilao->getLances()));

        $leilao->propoe(new Lance(new Usuario("Daniel"), 2000));

        $this->assertEquals(1, count($leilao->getLances()));
        $this->assertEquals(2000.0, $leilao->getLances()[0]->getValor(), 0.00001);
    }



    public function testReceberVariosLances() {
        $criador = new CriadorDeLeilao();
        $leilao = $criador->
            para("Macbook")
            ->lance(new Usuario("Daniel"), 2000)
            ->lance(new Usuario("Vitor"), 3000)
            ->constroi();

        $this->assertEquals(2, count($leilao->getLances()));
        $this->assertEquals(2000.0, $leilao->getLances()[0]->getValor(), 0.00001);
        $this->assertEquals(3000.0, $leilao->getLances()[1]->getValor(), 0.00001);
    }

    public function testNaoAceitarDoisLancesSeguidosDoMesmoUsuario() {
        $daniel = new Usuario("Daniel");
        $criador = new CriadorDeLeilao();
        $leilao = $criador->
            para("Macbook")
            ->lance($daniel, 2000.0)
            ->lance($daniel, 3000.0)
            ->constroi();

        $this->assertEquals(1, count($leilao->getLances()).size());
        $this->assertEquals(2000.0, leilao.getLances()[0]->getValor(), 0.00001);
    }

    public function testNaoAceitarMaisDoQue5LancesDeUmMesmoUsuario() {
        $daniel = new Usuario("Daniel");
        $vitor = new Usuario("Vitor");

        $criador = new CriadorDeLeilao();
        $leilao = $criador->para("Macbook")
                ->lance($daniel, 2000)
                ->lance($vitor, 3000)
                ->lance($daniel, 4000)
                ->lance($vitor, 5000)
                ->lance($daniel, 6000)
                ->lance($vitor, 7000)
                ->lance($daniel, 8000)
                ->lance($vitor, 9000)
                ->lance($daniel, 10000)
                ->lance($vitor, 11000)
                ->lance($daniel, 12000)
                ->constroi();

        $this->assertEquals(10, count($leilao->getLances()));
        $ultimo = count($leilao->getLances()) - 1;
        $this->assertEquals(11000.0, $leilao->getLances()[$ultimo]->getValor(), 0.00001);
    }    
}

