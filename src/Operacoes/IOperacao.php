<?php 
namespace App\Operacoes;

interface IOperacao {
    public function Operador();
    public function Calcular($n1, $n2);
}
?>