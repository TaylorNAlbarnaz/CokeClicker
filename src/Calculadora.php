<?php
namespace App;

use App\Operacoes\IOperacao;

class Calculadora {
    public $valor1;
    public $valor2;
    public IOperacao $operacao;

    public function CalcularResultado(): float {
        $n1 = $this->valor1;
        $n2 = $this->valor2;
        $resultado = $this->operacao->Calcular((float)$n1, (float)$n2);

        return $resultado;
    }
}
?>