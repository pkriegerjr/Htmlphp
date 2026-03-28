<?php
session_start(); // Faz o PHP "lembrar" das infos

// Pega os dados do JavaScript
$json = file_get_contents("php://input");
$dadosF = json_decode($json, true);

if ($dadosF) {
    // Se a lista de filmes ainda não existe na "memória", cria ela
    if (!isset($_SESSION['meusFilmes'])) {
        $_SESSION['meusFilmes'] = [];
    }

    // Adiciona o filme atual no array
    $_SESSION['meusFilmes'][] = $dadosF;

    // Responde para o JavaScript (Acessando a chave 'titulo')
    echo "Sucesso! O filme " . $dadosF['filme'] . " foi guardado no servidor.";
} else {
    echo "Erro: Nenhum dado recebido.";
}
?>
