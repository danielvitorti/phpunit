<?php
require "AnoBissexto.pphp"
class AnoBissextoTest extends PHPUnit_Framework_TestCase {


	public function testAnoBissexto() 
    {
        $anoBissexto = new MatematicaMaluca();
        $this->assertEquals(50*4, $matematica->contaMaluca(50));
    }



}