<?php
class MatematicaMalucaTest 
{
    public function testMultiplicaMaiorQue30() 
    {
        $matematica = new MatematicaMaluca();
        $this->assertEquals(50*4, $matematica->contaMaluca(50));
    }

    public function testMultiplicaMaioresQue10EMenoresQue30() 
    {
        $matematica = new MatematicaMaluca();
        $this->assertEquals(20*3, $matematica->contaMaluca(20));
    }

    public function testDeveMultiplicarMenoresQue10() 
    {
        $matematica = new MatematicaMaluca();
        $this->assertEquals(5*2, $matematica->contaMaluca(5));
    }
}