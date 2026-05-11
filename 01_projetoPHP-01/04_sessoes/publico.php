<?php
/**
 * Disciplina : Desenvolvimento Web II (DWII)
 * Aula       : 06 - Autenticação com sessões e controle de acesso
 * Arquivo    : 04_sessoes/publico.php
 * Autor      : ra'fael de Morais Farias
 */

session_start(); // verificar se há sessão (mas não exigir)
$logado = isset($_SESSION['usuario']);

$titulo_pagina = 'Página Pública';
$caminho_raiz = '../';
$pagina_atual = '';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php require_once __DIR__ . '/../includes/cabecalho.php'; ?>
</head>
<body>

<div class="container publico-container">

    <h1 class="titulo-secao">🎲 Página Pública</h1>
    <p class="publico-texto">
        Este conteúdo é visível para qualquer visitante, sem login.
    </p>

    <?php if ($logado): ?>
        <p class="publico-texto">
            Olá, <strong><?php echo htmlspecialchars($_SESSION['usuario']); ?></strong>!
            Você já está autenticado.
        </p>

        <a href="painel.php" class="btn btn-verde">
            Ir ao Painel
        </a>

    <?php else: ?>

        <a href="login.php" class="btn btn-azul">
            👁️ Acessar Área Restrita
        </a>

    <?php endif; ?>

</div>

<?php require_once __DIR__ . '/../includes/rodape.php'; ?>
</body>
</html>