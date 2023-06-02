<?php
namespace App\Operacoes;

class Divisao implements IOperacao {
    public function Calcular(float $n1, float $n2): float {
        return $n1 / $n2;
    }

    public function Operador(): string {
        return "/";
    }
}
?>