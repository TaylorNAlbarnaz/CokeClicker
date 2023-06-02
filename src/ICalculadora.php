<?php
namespace App;

interface ICalculadora {
    public function CalcularResultado(): float;

    public function SetarValores($n1, $n2): void;

    public function SetarOperacao($operacao): void;
}
?>