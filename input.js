let primeiroNumero = "";
let segundoNumero = "";
let operador = "";

let numeroAtual = 0;
let concluido = false;
let primeiroPonto = false;
let segundoPonto = false;

const resultadoVisual = document.getElementById("calculator__finalresult");
const preview = document.getElementById("calculator__preview");

// Adiciona um digito ao número atual
function AdicionarNumero(charAdicionado) {
    if (concluido)
        ResetarTela();

    if (charAdicionado === '.') {
        if (numeroAtual == 0) {
            if (primeiroPonto)
                return;
            
            primeiroPonto = true;
        }

        if (numeroAtual == 1) {
            if (segundoPonto)
                return;

            segundoPonto = true;
        }
    }

    if (numeroAtual === 0) {
        if (primeiroNumero.length < 4)
            primeiroNumero += charAdicionado;
    }

    if (numeroAtual === 1) {
        if (segundoNumero.length < 4)
            segundoNumero += charAdicionado;
    }

    AtualizarTela();
}

// Remove um digito do número atual
function RemoverNumero() {
    if (concluido)
        ResetarTela();

    if (numeroAtual === 0) {
        if (primeiroNumero.length > 0) {
            if (primeiroNumero.charAt(primeiroNumero.length - 1) == '.') {
                primeiroPonto = false;
            }

            primeiroNumero = primeiroNumero.slice(0, primeiroNumero.length - 1);
        }
    }

    if (numeroAtual === 1) {
        if (segundoNumero.length > 0) {
            if (segundoNumero.charAt(segundoNumero.length - 1) == '.') {
                segundoPonto = false;
            }

            segundoNumero = segundoNumero.slice(0, segundoNumero.length - 1);
        } else {
            operador = "";
            numeroAtual = 0;
        }
    }

    AtualizarTela();
}

// Seta o operador a ser utilizado pela calculadora
function SetarOperador(operadorAdicionado) {
    if (concluido)
        ResetarTela();

    if (primeiroNumero.length > 0) {
        numeroAtual = 1;
        operador = operadorAdicionado;

        AtualizarTela();
    }
}

// Atualiza a tela com os dados inseridos
function AtualizarTela() {
    preview.innerText = `${primeiroNumero} ${operador} ${segundoNumero}`;
}

// Reseta a tela para seu estado original
function ResetarTela() {
    primeiroNumero = "";
    segundoNumero = "";
    operador = "";

    numeroAtual = 0;
    concluido = false;
    primeiroPonto = false;
    segundoPonto = false;

    resultadoVisual.innerText = "";
    AtualizarTela();
}

// Calcula o resultado fazendo uma requisição php
async function CalcularResultado() {
    if (!primeiroNumero.length > 0 && !segundoNumero.length > 0 && !operador.length > 0)
        return;

    data = {"valor1": primeiroNumero, "valor2": segundoNumero, "operador": operador};

    const response = await fetch("index.php", {method: "POST", body: JSON.stringify(data)})
    const json = await response.json();

    resultadoVisual.innerText = JSON.parse(json);

    concluido = true;
}