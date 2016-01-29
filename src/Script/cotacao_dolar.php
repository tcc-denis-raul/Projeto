<?php
class Cotacao
{
    public function getDolar()
    {
        if (!$fp = fopen("http://dolarhoje.com/cotacao.txt", "r")) {
            echo "Erro ao abrir a página de cotação";
            exit;
        }
        $dolar = str_replace(",", ".", fgets($fp));
        fclose($fp);
        return $dolar;
    }
}
