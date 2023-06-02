<?php
namespace App;

interface IAplicacao {
    public function __construct(Calculadora $calculadora);

    public function InicializarOperacoes(): void;

    public function SetarValores($valor1, $valor2): void;

    public function SetarOperador($operador): void;

    public function CalcularResultado(): float;
}
?>