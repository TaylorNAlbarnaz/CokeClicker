<?php
namespace App;

use App\Operacoes\Adicao;
use App\Operacoes\Divisao;
use App\Operacoes\IOperacao;
use App\Operacoes\Modulo;
use App\Operacoes\Multiplicacao;
use App\Operacoes\Subtracao;

class Aplicacao {
    public Calculadora $calculadora;
    public IOperacao $operacoes;

    public function __construct(Calculadora $calculadora) {
        $this->calculadora = $calculadora;
    }

    // Adiciona todas as operações à aplicação
    public function InicializarOperacoes() {
        $adicao = new Adicao();
        $divisao = new Divisao();
        $modulo = new Modulo();
        $multiplicacao = new Multiplicacao();
        $subtracao = new Subtracao();

        $operacoes = array($adicao, $divisao, $modulo, $multiplicacao, $subtracao);

        foreach ($operacoes as $operacao) {
            echo $operacao->Operador();
        }
    }
}
?>