<?php

class AvaliadorTest extends PHPUnit_Framework_TestCase {

    public function testMedia() {
        // cenario: 3 lances em ordem crescente
        $joao = new Usuario("Joao");
        $jose = new Usuario("José");
        $maria = new Usuario("Maria");

        $leilao = new Leilao("Playstation 3 Novo");

        $leilao->propoe(new Lance($maria,300.0));
        $leilao->propoe(new Lance($joao,400.0));
        $leilao->propoe(new Lance($jose,500.0));

        // executando a acao
        $leiloeiro = new Avaliador();
        $leiloeiro->avalia($leilao);

        // comparando a saida com o esperado
        $this->assertEquals(400, $leiloeiro->getMedia(), 0.0001);
    }


    public function testAceitaLeilaoApenasUmLance() 
{
    $joao = new Usuario("Joao");

    $leilao = new Leilao("Playstation 3");

    $leilao->propoe(new Lance($joao,250));

    $leiloeiro = new Avaliador();
    $leiloeiro->avalia($leilao);

    $maiorEsperado  = 250;
    $menorEsperado = 250;

    $this->assertEquals( $leiloeiro->getMaiorLance(), $maiorEsperado );
    $this->assertEquals( $leiloeiro->getMenorLance(), $menorEsperado );
}

    public function testesOrdemAleatoria() 
{
    $daniel   = new Usuario("Daniel"); 
    $vitor  = new Usuario("Vitor"); 

    $leilao = new Leilao("Playstation 3 Novo");

    $leilao->propoe( new Lance( $daniel , 200.0) );
    $leilao->propoe( new Lance( $vitor, 450.0) );
    $leilao->propoe( new Lance( $daniel , 120.0) );
    $leilao->propoe( new Lance( $vitor, 700.0) );
    $leilao->propoe( new Lance( $daniel , 630.0) );
    $leilao->propoe( new Lance( $vitor, 230.0) );

    $leiloeiro = new Avaliador();
    $leiloeiro->avalia($leilao);

    $this->assertEquals(700.0, $leiloeiro->getMaiorLance(), 0.0001);
    $this->assertEquals(120.0, $leiloeiro->getMenorLance(), 0.0001);
}



public function testOrdemDecrescente() 
{
    $daniel     = new Usuario("Daniel"); 
    $vitor  = new Usuario("Vitor"); 

    $leilao = new Leilao("Playstation 3 Novo");

    $leilao->propoe( new Lance($daniel , 400.0) );
    $leilao->propoe( new Lance($vitor, 300.0) );
    $leilao->propoe( new Lance($daniel , 200.0) );
    $leilao->propoe( new Lance($vitor, 100.0) );

    $leiloeiro = new Avaliador();
    $leiloeiro->avalia($leilao);

    $this->assertEquals(400.0, $leiloeiro->getMaiorLance(), 0.0001);
    $this->assertEquals(100.0, $leiloeiro->getMenorLance(), 0.0001);
}
}