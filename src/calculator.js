let primeiroNumero = "";
let segundoNumero = "";
let operador = "";

let numeroAtual = 0;
let concluido = false;
let primeiroPonto = false;
let segundoPonto = false;

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
        primeiroNumero += charAdicionado;
    }

    if (numeroAtual === 1) {
        segundoNumero += charAdicionado;
    }

    AtualizarTela();
}

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

function SetarOperador(operadorAdicionado) {
    if (concluido)
        ResetarTela();

    if (primeiroNumero.length > 0) {
        numeroAtual = 1;
        operador = operadorAdicionado;

        AtualizarTela();
    }
}

function ResetarTela() {
    primeiroNumero = "";
    segundoNumero = "";
    operador = "";

    numeroAtual = 0;
    concluido = false;
    primeiroPonto = false;
    segundoPonto = false;

    AtualizarTela();
}

function AtualizarTela() {
    const preview = document.getElementById("calculator__preview");
    preview.innerText = `${primeiroNumero} ${operador} ${segundoNumero}`;
}

function CalcularResultado() {
    const resultadoFinal = document.getElementById("calculator__finalresult");
    resultadoFinal.innerText = "999";

    concluido = true;
}