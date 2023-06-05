<?php
namespace App;

use App\Operacoes\IOperacao;

class Calculadora implements ICalculadora {
    private $valor1;
    private $valor2;
    private IOperacao $operacao;

    public function CalcularResultado(): float {
        $n1 = $this->valor1;
        $n2 = $this->valor2;
        $resultado = $this->operacao->Calcular((float)$n1, (float)$n2);

        return $resultado;
    }

    public function SetarValores($v1, $v2): void {
        $this->valor1 = $v1;
        $this->valor2 = $v2;
    }

    public function SetarOperacao($operacao): void {
        $this->operacao = $operacao;
    }
}
?>