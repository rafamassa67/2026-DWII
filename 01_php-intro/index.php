<?php
/**
 * ARQUIVO      : 01_php-intro/index.php
 * Autor        : Rafael de Morais Farias
 */

$nome          = "Rafael de Morais Farias";
$pagina_atual  = "inicio"; 
$caminho_raiz  = "../";
$titulo_pagina = "Home - $nome";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include '../includes/cabecalho.php'; ?>
</head>
<body>
    <main>
        <h1>Página Inicial</h1>
        <p>Bem-vindo ao meu portfólio de Desenvolvimento Web II.</p>
    </main>

    <?php include '../includes/rodape.php'; ?>
</body>
</html>
