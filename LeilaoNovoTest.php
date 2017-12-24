<?php
require "CriadorDeLeilao.php";

class LeilaoTest {

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

public class AvaliadorTest {

    private $leiloeiro;
    private $maria;
    private $jose;
    private $joao;

    public void setUp() {
        $this->leiloeiro = new Avaliador();
        $this->joao = new Usuario("João");
        $this->jose = new Usuario("José");
        $this->maria = new Usuario("Maria");
    }

    public function testEntenderLancesEmOrdemCrescente() {
        $criador = new CriadorDeLeilao();
        $leilao = $criador->
            ->para("Playstation 4 Novo")
            ->lance($this->joao, 250)
            ->lance($this->jose, 300)
            ->lance($this->maria, 400)
            ->constroi();

        $this->leiloeiro->avalia($leilao);

        $this->assertEquals(400.0, $leiloeiro->getMaiorLance(), 0.00001);
        $this->assertEquals(250.0, $leiloeiro->getMenorLance(), 0.00001);
    }

    public function testEntenderLeilaoComApenasUmLance() {
        $criador = new CriadorDeLeilao();
        Leilao leilao = $criador->
        para("Playstation 4 Novo")
        ->lance(joao, 1000)
        ->constroi();

        $this->leiloeiro->avalia($leilao);

        $this->assertEquals(1000.0, $leiloeiro->getMaiorLance(), 0.00001);
        $this->assertEquals(1000.0, $leiloeiro->getMenorLance(), 0.00001);
    }

    public function testEncontrarOsTresMaioresLances() {
        $criador = new CriadorDeLeilao();
        $leilao = $criador->
            para("Playstation 4 Novo")
            ->lance($this->joao, 100)
            ->lance($this->maria, 200)
            ->lance($this->joao, 300)
            ->lance($this->maria, 400)
            ->constroi();

        $this->leiloeiro->avalia($leilao);

        $maiores = $this->leiloeiro->getTresMaiores();
        $this->assertEquals(3, maiores.size());
        $this->assertEquals(400.0, $maiores[0]->getValor(), 0.00001);
        $this->assertEquals(300.0, $maiores[1]->getValor(), 0.00001);
        $this->assertEquals(200.0, $maiores[2]->getValor(), 0.00001);
    }

}