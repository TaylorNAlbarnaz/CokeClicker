<?php 
namespace App\Operacoes;

interface IOperacao {
    public function Operador();
    public function Calcular(float $n1, float $n2): float;
}
?>