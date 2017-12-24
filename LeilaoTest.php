<?php
class LeilaoTest extends PHPUnit_Framework_TestCase {


public function testNaoAceitarDoisLancesSeguidosDoMesmoUsuario() 
{
    $leilao = new Leilao("Notebook");

    $danielMendes = new Usuario("Daniel Mendes");

    $leilao->propoe(new Lance($danielMendes, 2000));
    $leilao->propoe(new Lance($danielMendes, 3000));

    $this->assertEquals(1, count($leilao->getLances()));
    $this->assertEquals(2000, $leilao->getLances()[0]->getValor(), 0.00001);
}

public function testNaoDeveAceitarMaisDoQue5LancesDeUmMesmoUsuario() 
{
    $leilao = new Leilao("Notebook");

    $danielMendes = new Usuario("Daniel Mendes");
    $vitor = new Usuario("Vitor");

    $leilao->propoe( new Lance( $danielMendes, 2000) );
    $leilao->propoe( new Lance( $vitor, 3000) );
    $leilao->propoe( new Lance( $danielMendes, 3000) );
    $leilao->propoe( new Lance( $vitor, 3000) );
    $leilao->propoe( new Lance( $danielMendes, 4000) );
    $leilao->propoe( new Lance( $vitor, 3000) );
    $leilao->propoe( new Lance( $danielMendes, 5000) );
    $leilao->propoe( new Lance( $vitor, 3000) );
    $leilao->propoe( new Lance( $danielMendes, 6000) );
    $leilao->propoe( new Lance( $vitor,  999) );
    $leilao->propoe( new Lance( $danielMendes, 7000) );

    $this->assertEquals(10, count($leilao->getLances()));

    $ultimo = count($leilao->getLances())- 1;

    $this->assertEquals(999, $leilao->getLances()[$ultimo]->getValor(), 0.00001);
}




 public function testDobrarOUltimoLanceDado() 
    {
        $leilao = new Leilao("Macbook Pro 15");
        $danielMendes = new Usuario("Daniel Mendes");
        $vitor = new Usuario("Vitor");

        $leilao->propoe(new Lance($danielMendes, 2000));
        $leilao->propoe(new Lance($vitor, 3000));
        $leilao->dobraLance($danielMendes);

        $this->assertEquals(4000, $leilao->getLances()[2]->getValor(), 0.00001);
    }



  public function testNaoDobrarCasoNaoHajaLanceAnterior() 
    {
        $leilao = new Leilao("Notebook");
        $danielMendes = new Usuario("Daniel Mendes");

        $leilao->dobraLance($danielMendes);

        $this->assertEquals(0, count($leilao->getLances()));
    }

}