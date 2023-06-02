<?php
namespace App;

use App\Operacoes\Adicao;
use App\Operacoes\Divisao;
use App\Operacoes\Modulo;
use App\Operacoes\Multiplicacao;
use App\Operacoes\Subtracao;

class Aplicacao implements IAplicacao {
    public ICalculadora $calculadora;
    public $operacoes;

    public function __construct(ICalculadora $calculadora) {
        $this->calculadora = $calculadora;
    }

    // Adiciona todas as operações à aplicação
    public function InicializarOperacoes(): void {
        $adicao = new Adicao();
        $divisao = new Divisao();
        $modulo = new Modulo();
        $multiplicacao = new Multiplicacao();
        $subtracao = new Subtracao();

        $this->operacoes = array($adicao, $divisao, $modulo, $multiplicacao, $subtracao);
    }

    public function SetarValores($valor1, $valor2): void {
        $this->calculadora->SetarValores($valor1, $valor2);
    }

    public function SetarOperador($operador): void {
        foreach ($this->operacoes as $operacao) {
            if ($operacao->Operador() === $operador) {
                $this->calculadora->SetarOperacao($operacao);
            }
        }
    }

    public function CalcularResultado(): float {
        $resultado = round($this->calculadora->CalcularResultado(), 4);
        return $resultado;
    }
}
?>