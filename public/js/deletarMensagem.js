let tempoExibicao = 10000; // 10 segundos
// Função para ocultar a mensagem após o tempo definido
function deletaMensagem() {
    var node = document.getElementById("mensagem");
    if (node.parentNode) {
        node.parentNode.removeChild(node);
    }

    var node = document.getElementById("script");
    if (node.parentNode) {
        node.parentNode.removeChild(node);
    }
}
// Configura o temporizador para chamar a função após o tempo definido
setTimeout(deletaMensagem, tempoExibicao);