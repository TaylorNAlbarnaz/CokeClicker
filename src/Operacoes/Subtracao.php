<?php
namespace App\Operacoes;

class Subtracao implements IOperacao {
    public function Calcular($n1, $n2) {
        return $n1 - $n2;
    }

    public function Operador() {
        return "-";
    }
}
?>