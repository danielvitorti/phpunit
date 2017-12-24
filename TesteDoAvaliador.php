<?php
require "Usuario.php";
require "Lance.php";
require "Leilao.php";

    class TesteDoAvaliador extends PHPUnit_Framework_TestCase {

        public function testa() {

            $joao = new Usuario("Joao");
            $renan = new Usuario("Renan");
            $felipe = new Usuario("Felipe");

            $leilao = new Leilao("Playstation 3");

            $leilao->propoe(new Lance($joao,300));
            $leilao->propoe(new Lance($renan,400));
            $leilao->propoe(new Lance($felipe,250));

            $leiloeiro = new Avaliador();
            $leiloeiro->avalia($leilao);

            echo $leiloeiro->getMaiorLance(); // imprime 400

        }


        public function testAceitaLeilaoEmOrdemCrescente() {

            $joao = new Usuario("Joao");
            $renan = new Usuario("Renan");
            $felipe = new Usuario("Felipe");

            $leilao = new Leilao("Playstation 3");

            $leilao->propoe(new Lance($joao,250));
            $leilao->propoe(new Lance($renan,300));
            $leilao->propoe(new Lance($felipe,400));

            $leiloeiro = new Avaliador();
            $leiloeiro->avalia($leilao);

            $maiorEsperado = 400;
            $menorEsperado = 250;

            var_dump($leiloeiro->getMaiorLance() == $maiorEsperado);
            var_dump($leiloeiro->getMenorLance() == $menorEsperado);

        }


        public function testDeveEncontrarOsTresMaioresLances() 
{
    $daniel   = new Usuario("Daniel");
    $vitor  = new Usuario("Vitor");

    $leilao = new Leilao("Playstation 3 Novo");

    $leilao->propoe( new Lance( $daniel , 100.0) );
    $leilao->propoe( new Lance( $vitor, 200.0) );
    $leilao->propoe( new Lance( $daniel , 300.0) );
    $leilao->propoe( new Lance( $vitor, 400.0) );

    $leiloeiro = new Avaliador();
    $leiloeiro->avalia($leilao);

    $maiores = $leiloeiro->getTresMaiores();

    $this->assertEquals(3, count($maiores));
    $this->assertEquals(400, $maiores[0]->getValor(), 0.00001 );
    $this->assertEquals(300, $maiores[1]->getValor(), 0.00001 );
    $this->assertEquals(200, $maiores[2]->getValor(), 0.00001 );
}

public void testDeveDevolverTodosLancesCasoNaoHajaMinimo3() 
{
    $daniel   = new Usuario("Daniel");
    $vitor  = new Usuario("Vitor");

    $leilao = new Leilao("Playstation 3 Novo");

    $leilao->propoe( new Lance($daniel , 100.0) );
    $leilao->propoe( new Lance($vitor, 200.0) );

    $leiloeiro = new Avaliador();
    $leiloeiro->avalia($leilao);

    $maiores = $leiloeiro->getTresMaiores();

    assertEquals(2, count($maiores));
    assertEquals(200, $maiores[0]->getValor(), 0.00001 );
    assertEquals(100, $maiores[1]->getValor(), 0.00001 );
}

public void testDeveDevolverListaVaziaCasoNaoLances() 
{
    $leilao = new Leilao("Playstation 3 Novo");

    $leiloeiro = new Avaliador();
    $leiloeiro->avalia($leilao);

    $maiores = $leiloeiro->getTresMaiores();

    $this->assertEquals(0, count($maiores));
}
    }

