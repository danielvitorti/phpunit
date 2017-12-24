<?php

class AvaliadorNovoTest {

    private $leiloeiro;

    public function setUp() {
        $this->leiloeiro = new Avaliador();

        var_dump("inicializando teste!");
    }

    public function tearDown() {
         var_dump("fim");
    }


    public function testDeveEntenderLancesEmOrdemCrescente() {
        // parte 1: cenario
        $daniel = new Usuario("Daniel");
        $vitor = new Usuario("Vitor");
        $lucas = new Usuario("Lucas");

        $leilao = new Leilao("Playstation 4 Novo");

        $leilao->propoe(new Lance($daniel, 250.0));
        $leilao->propoe(new Lance($vitor, 300.0));
        $leilao->propoe(new Lance($lucas, 400.0));

        // parte 2: acao
        $this->leiloeiro->avalia($leilao);

        // parte 3: validacao
        $this->assertEquals(400.0, $this->leiloeiro->getMaiorLance(), 0.00001);
        $this->assertEquals(250.0, $this->leiloeiro->getMenorLance(), 0.00001);
    }

    public function testDeveEntenderLeilaoComApenasUmLance() {
        $daniel = new Usuario("Daniel");
        $leilao = new Leilao("Playstation 4 Novo");

        $leilao->propoe(new Lance($daniel, 1000.0));

        $this->leiloeiro->avalia($leilao);

        $this->assertEquals(1000.0, $this->leiloeiro->getMaiorLance(), 0.00001);
        $this->assertEquals(1000.0, $this->leiloeiro->getMenorLance(), 0.00001);
    }

    public function testDeveEncontrarOsTresMaioresLances() {
        $daniel = new Usuario("Daniel");
        $lucas = new Usuario("Lucas");
        $leilao = new Leilao("Playstation 4 Novo");

        $leilao->propoe(new Lance($daniel, 100.0));
        $leilao->propoe(new Lance($lucas, 200.0));
        $leilao->propoe(new Lance($daniel, 300.0));
        $leilao->propoe(new Lance($lucas, 400.0));

        $this->leiloeiro->avalia($leilao);

        $maiores = $this->leiloeiro->getTresMaiores();
        $this->assertEquals(3, count($maiores));
        $this->assertEquals(400.0, $maiores.get[0]->getValor(), 0.00001);
        $this->assertEquals(300.0, $maiores.get[1]->getValor(), 0.00001);
        $this->assertEquals(200.0, $maiores.get[2]->getValor(), 0.00001);
    }

}