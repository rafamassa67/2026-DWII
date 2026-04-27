<?php
/**
 * ARQUIVO      : 01_php-intro/sobre.php
 * Autor        : Rafael de Morais Farias
 */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$nome          = "Rafael de Morais Farias";
$pagina_atual  = "sobre"; 
$caminho_raiz  = "./";
$titulo_pagina = "Sobre Mim - $nome";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include './includes/cabecalho.php'; ?>
</head>
<body>
    <main>
        <h1>Sobre Mim</h1>
        <p>Estudante de Análise e Desenvolvimento de Sistemas no IFPR.</p>
    </main>

    <?php include './includes/rodape.php'; ?>
</body>
</html>
