<?php
require_once realpath("vendor/autoload.php");

use App\Aplicacao;
use App\Calculadora;

// Inicializa as classes necessárias
$calculadora = new Calculadora();
$aplicacao = new Aplicacao($calculadora);
$aplicacao->InicializarOperacoes();

// Responde a requisição do usuário
$metodo = $_SERVER['REQUEST_METHOD'];

if ($metodo == 'GET')
{
    readfile("./page.html");
}

if ($metodo == 'POST')
{
    try {
        $json = file_get_contents('php://input');
        $dados = json_decode($json);

        $aplicacao->SetarValores($dados->valor1, $dados->valor2);
        $aplicacao->SetarOperador($dados->operador);
        $resultado = $aplicacao->CalcularResultado();

        echo $resultado;
    } catch (Exception $ex) {
        echo "Invalido";
    }
}

?>