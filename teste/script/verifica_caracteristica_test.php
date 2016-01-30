<?php
class MainTest extends PHPUnit_Framework_TestCase
{
    protected $backupGlobals = false;
    protected $func;
    protected $dolar;
    protected function setUp()
    {
        $this->func  = new Funcoes();
        $cot         = new Cotacao;
        $this->dolar = $cot->getDolar();
    }
    public function testPossuiCaracteristicaNumber()
    {
        $vet = array(2, 3, 4);
        $this->assertEquals(1, $this->func->possuiCaracteristica($vet, 2));
        $this->assertEquals(0, $this->func->possuiCaracteristica($vet, 5));
    }
    public function testPossuiCaracteristicaString()
    {
        $vet = array("test", "al", "cont");
        $this->assertEquals(1, $this->func->possuiCaracteristica($vet, "cont"));
        $this->assertEquals(0, $this->func->possuiCaracteristica($vet, "naotem"));
    }

    public function testFaixaPrecoRealAte30Validos()
    {
        $vet = array(0.0);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "ate30", "real"));
        $vet = array(15.0);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "ate30", "real"));
        $vet = array(30.0);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "ate30", "real"));
        $vet = array(32.0, -1.0, 29.0);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "ate30", "real"));
    }
    public function testFaixaPrecoRealAte30Invalidos()
    {
        $vet = array(-1.0);
        $this->assertEquals(0, $this->func->faixaPreco($vet, "ate30", "real"));
        $vet = array(32.0);
        $this->assertEquals(0, $this->func->faixaPreco($vet, "ate30", "real"));
        $vet = array(32.0, 34.0, 67.0);
        $this->assertEquals(0, $this->func->faixaPreco($vet, "ate30", "real"));
    }

    public function testFaixaPrecoReal31a60Validos()
    {
        $vet = array(31.0);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "31a60", "real"));
        $vet = array(55.5);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "31a60", "real"));
        $vet = array(50.0);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "31a60", "real"));
        $vet = array(62.0, 30.0, 53.0);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "31a60", "real"));
    }
    public function testFaixaPrecoReal31a60Invalidos()
    {
        $vet = array(30.0);
        $this->assertEquals(0, $this->func->faixaPreco($vet, "31a60", "real"));
        $vet = array(61.0);
        $this->assertEquals(0, $this->func->faixaPreco($vet, "31a60", "real"));
        $vet = array(29.0, 64.0, 67.0);
        $this->assertEquals(0, $this->func->faixaPreco($vet, "31a60", "real"));
    }

    public function testFaixaPrecoReal61a100Validos()
    {
        $vet = array(61.0);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "61a100", "real"));
        $vet = array(88.5);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "61a100", "real"));
        $vet = array(100.0);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "61a100", "real"));
        $vet = array(101.0, 60.0, 77.1);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "61a100", "real"));
    }

    public function testFaixaPrecoReal61a100Invalidos()
    {
        $vet = array(60.0);
        $this->assertEquals(0, $this->func->faixaPreco($vet, "61a100", "real"));
        $vet = array(100.5);
        $this->assertEquals(0, $this->func->faixaPreco($vet, "61a100", "real"));
        $vet = array(59.9, 101.0, 100.1);
        $this->assertEquals(0, $this->func->faixaPreco($vet, "61a100", "real"));
    }

    public function testFaixaPrecoReal101a150Validos()
    {
        $vet = array(101.0);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "101a150", "real"));
        $vet = array(101.5);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "101a150", "real"));
        $vet = array(150.0);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "101a150", "real"));
        $vet = array(150.1, 100.9, 120.0);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "101a150", "real"));
    }

    public function testFaixaPrecoReal101a150Invalidos()
    {
        $vet = array(100.0);
        $this->assertEquals(0, $this->func->faixaPreco($vet, "101a150", "real"));
        $vet = array(150.5);
        $this->assertEquals(0, $this->func->faixaPreco($vet, "101a150", "real"));
        $vet = array(100.9, 151.0, 156.1);
        $this->assertEquals(0, $this->func->faixaPreco($vet, "101a150", "real"));
    }

    public function testFaixaPrecoReal151maisValidos()
    {
        $vet = array(151.0);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "151mais", "real"));
        $vet = array(155.5);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "151mais", "real"));
        $vet = array(150.1, 158.8);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "151mais", "real"));
    }
    public function testFaixaPrecoReal151maisInvalidos()
    {
        $vet = array(100.0);
        $this->assertEquals(0, $this->func->faixaPreco($vet, "151mais", "real"));
        $vet = array(100.9, 149.0, 56.1);
        $this->assertEquals(0, $this->func->faixaPreco($vet, "151mais", "real"));
    }
    /*
    Validos: A<=X<=B
    Testes:
    X = A
    A < X < B
    X = B
    Invalidos:
    X < A
    X > B
     */
    public function testFaixaPrecoDolarAte30Validos()
    {
        $vet = array(0.0);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "ate30", "dolar"));
        $vet = array((30.0 / 2) / $this->dolar);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "ate30", "dolar"));
        $vet = array(30.0 / $this->dolar);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "ate30", "dolar"));
        $vet = array(32.0 / $this->dolar, -1.0 / $this->dolar, 11.0 / $this->dolar);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "ate30", "dolar"));
    }

    public function testFaixaPrecoDolarAte30Invalidos()
    {
        $vet = array(-1.0 / $this->dolar);
        $this->assertEquals(0, $this->func->faixaPreco($vet, "ate30", "dolar"));
        $vet = array(32.0 / $this->dolar);
        $this->assertEquals(0, $this->func->faixaPreco($vet, "ate30", "dolar"));
        $vet = array(32.0 / $this->dolar, 34.0 / $this->dolar, 67.0 / $this->dolar);
        $this->assertEquals(0, $this->func->faixaPreco($vet, "ate30", "dolar"));
    }

    public function testFaixaPrecoDolar31a60Validos()
    {
        $vet = array(31.0 / $this->dolar);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "31a60", "dolar"));
        $vet = array(33.0 / $this->dolar);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "31a60", "dolar"));
        $vet = array(60.0 / $this->dolar);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "31a60", "dolar"));
        $vet = array(64.0 / $this->dolar, 4.0 / $this->dolar, 36.0 / $this->dolar);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "31a60", "dolar"));
    }
    public function testFaixaPrecoDolar31a60Invalidos()
    {
        $vet = array(8.0 / $this->dolar);
        $this->assertEquals(0, $this->func->faixaPreco($vet, "31a60", "dolar"));
        $vet = array(62.0 / $this->dolar);
        $this->assertEquals(0, $this->func->faixaPreco($vet, "31a60", "dolar"));
        $vet = array(28.0 / $this->dolar, 62.0 / $this->dolar, 110.0 / $this->dolar);
        $this->assertEquals(0, $this->func->faixaPreco($vet, "31a60", "dolar"));
    }

    public function testFaixaPrecoDolar61a100Validos()
    {
        $vet = array(61.1 / $this->dolar);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "61a100", "dolar"));
        $vet = array(65.0 / $this->dolar);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "61a100", "dolar"));
        $vet = array(100.0 / $this->dolar);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "61a100", "dolar"));
        $vet = array(102.0 / $this->dolar, 58.0 / $this->dolar, 66.2 / $this->dolar);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "61a100", "dolar"));
    }

    public function testFaixaPrecoDolar61a100Invalidos()
    {
        $vet = array(58.0 / $this->dolar);
        $this->assertEquals(0, $this->func->faixaPreco($vet, "61a100", "dolar"));
        $vet = array(111.0 / $this->dolar);
        $this->assertEquals(0, $this->func->faixaPreco($vet, "61a100", "dolar"));
        $vet = array(199, 8 / $this->dolar, 58.0 / $this->dolar, 200.2 / $this->dolar);
        $this->assertEquals(0, $this->func->faixaPreco($vet, "61a100", "dolar"));
    }

    public function testFaixaPrecoDolar101a150Validos()
    {
        $vet = array(101.0 / $this->dolar);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "101a150", "dolar"));
        $vet = array(130.0 / $this->dolar);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "101a150", "dolar"));
        $vet = array(150.0 / $this->dolar);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "101a150", "dolar"));
        $vet = array(100 / $this->dolar, 151 / $this->dolar, 129 / $this->dolar);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "101a150", "dolar"));
    }
    public function testFaixaPrecoDolarl101a150Invalidos()
    {
        $vet = array(60 / $this->dolar);
        $this->assertEquals(0, $this->func->faixaPreco($vet, "101a150", "dolar"));
        $vet = array(160 / $this->dolar);
        $this->assertEquals(0, $this->func->faixaPreco($vet, "101a150", "dolar"));
        $vet = array(200 / $this->dolar, 20 / $this->dolar, 151 / $this->dolar);
        $this->assertEquals(0, $this->func->faixaPreco($vet, "101a150", "dolar"));
    }

    public function testFaixaPrecoDolar151maisValidos()
    {
        $vet = array(151.0 / $this->dolar);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "151mais", "dolar"));
        $vet = array(255.5 / $this->dolar);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "151mais", "dolar"));
        $vet = array(150.0 / $this->dolar, 168.5 / $this->dolar);
        $this->assertEquals(1, $this->func->faixaPreco($vet, "151mais", "dolar"));
    }
    public function testFaixaPrecoDolar151maisInvalidos()
    {
        $vet = array(20.0 / $this->dolar);
        $this->assertEquals(0, $this->func->faixaPreco($vet, "151mais", "dolar"));
        $vet = array(20.9 / $this->dolar, 150.9 / $this->dolar);
        $this->assertEquals(0, $this->func->faixaPreco($vet, "151mais", "dolar"));
    }
}
