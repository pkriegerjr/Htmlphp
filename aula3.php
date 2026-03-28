<?php
session_start(); // Faz o PHP "lembrar" de quem está acessando

// 1. Pega os dados do JavaScript
$json = file_get_contents("php://input");
$dadosF = json_decode($json, true);

if ($dadosF) {
    // 2. Se a lista de filmes ainda não existe na "memória", cria ela
    if (!isset($_SESSION['meusFilmes'])) {
        $_SESSION['meusFilmes'] = [];
    }

    // 3. Adiciona o filme atual à lista da sessão
    $_SESSION['meusFilmes'][] = $dadosF;

    // 4. Responde para o JavaScript (Acessando a chave 'titulo')
    echo "Sucesso! O filme " . $dadosF['filme'] . " foi guardado no servidor.";
} else {
    echo "Erro: Nenhum dado recebido.";
}
?>
