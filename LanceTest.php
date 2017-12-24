<?php

public class LanceTest 
{
    
    public function testRecusarLancesComValorDeZero() 
    {
        new Lance(new Usuario("Daniel Mendes"), 0);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testRecusarLancesComValorNegativo() 
    {
        new Lance(new Usuario("Daniel Mendes"), -10);
    }
}