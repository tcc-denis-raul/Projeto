<?php
include_once "quotation.php";

$range_prices = array(
    "ate30"   => array(0, 30.0),
    "31a60"   => array(31.0, 60.0),
    "61a100"  => array(61.0, 100.0),
    "101a150" => array(101.0, 150.0),
    "151mais" => array(151.0),
);

class CheckAttributes extends Quotation
{
    /*
    funcao para verificar se um certo valor está no array(bd)
    Entrada:
    $vet_bd:     array com as caracteristicas do curso a ser avaliado
    $valor:      caracteristica a ser encontrado
    Saída:
    1:      contém
    0:      nao contém
     */
    public function checkAttribute($attr_bd, $attribute)
    {
        foreach ((array) $attr_bd as $attr) {
            if ($attr == $attribute) {
                return 1;
            }
        }
        return 0;
    }

    /*
    Verifica se o curso está na faixa solicitada pelo cliente.
    Entrada:
    $vet_bd:    array de preços.
    $faixa:     faixa de preço selecionado pelo cliente.
    $moeda:     tipo da moeda: dolar ou real

    Saída:
    1:          curso com preço na faixa
    0:          cuso fora da faixa
     */
    public function rangePrice($prices, $range, $coin)
    {
        global $range_prices;
        foreach ((array) $prices as $price) {
            //dolar
            if ($coin == "dolar") {
                $dolar      = $this->Dolar();
                $price      = $price * $dolar;
            }
            if ($range == "151mais") {
                if (floatval($price) >= floatval($range_prices[$range]["0"])) {
                    return 1;
                }
            } else if (floatval($price) >= floatval($range_prices[$range]["0"]) && 
                        floatval($price) <= floatval($range_prices[$range]["1"])) {
                return 1;
            }
        }
        return 0;
    }

    public function getMinMaxPrice($prices_real, $prices_dolar)
    {
        $min = 999999999;
        $max = 0;
        if(sizeof($prices_real) != 0){
            foreach ($prices_real as $value) {
                if($value <= $min) {
                    $min = $value;
                }
                if($value > $max || $max == 0) {
                    $max = $value;
                }
            }
        }
        if(sizeof($prices_dolar) != 0){
            foreach ($prices_dolar as $valor) {
                $dolar     = $this->Dolar();
                $value     = $value * $dolar;
                if($value < $min || $min == 0) {
                    $min = $value;
                }
                if($value > $max || $max == 0) {
                    $max = $value;
                }
            }
        }
        return array("min" => $min, "max" => $max);
    }
}
