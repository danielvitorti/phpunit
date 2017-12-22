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
    }