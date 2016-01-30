<?php
class MainTest extends PHPUnit_Framework_TestCase
{
    public function testgetDolar()
    {
        $cot = new Cotacao;
        $this->assertGreaterThan(0, $cot->getDolar());
    }

    public function testgetDolarFormato()
    {
        $cot = new Cotacao;
        $this->assertEquals(true, strpos($cot->getDolar(), "."));
    }
}
