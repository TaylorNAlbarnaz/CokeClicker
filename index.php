<?php

use App\Aplicacao;
use App\Calculadora;

require_once realpath("vendor/autoload.php");

include "./page.html";

$calculadora = new Calculadora();
$aplicacao = new Aplicacao($calculadora);

$aplicacao->InicializarOperacoes();

?>