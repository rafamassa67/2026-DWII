<?php
/**
 * ----------------------------------------------------------------------------
 * ARQUIVO     : 02_formularios/obrigado.php
 * Disciplina  : Desenvolvimento Web II (2026-DWII)
 * Aula        : 04 - PHP para Web: Formulários, GET e POST
 * Autor       : Rafael de Morais Farias
 * Conceitos   : header() + exit (PRG), $_GET para parâmetros
 *               de confirmação, htmlspecialchars()
 * ----------------------------------------------------------------------------
 * 
 * Página de confirmação - destino do redirecionamento PRG.
 * Recebe o nome via GET apenas para exibição amigável.
 * Nenhum dado de formulário é processado aqui.
 */


// --- VARIÁVEIS DO TEMPLATE
$nome          = "Rafael de Morais Farias";
$pagina_atual  = "contato";
$caminho_raiz  = "./";
$titulo_pagina = "Obrigado!";

$nome_visitante = htmlspecialchars($_GET['nome'] ?? 'visitante');
$assunto        = htmlspecialchars($_GET['assunto'] ?? 'Não informado');
$chars          = htmlspecialchars($_GET['chars'] ?? '0');

include './includes/cabecalho.php';
?>

<div class="container confirmacao">
    <p class="confirmacao-icone">📧</p>
    
    <h1 class="confirmacao-titulo">
        Obrigado, <?php echo $nome_visitante; ?>!
    </h1>

    <p class="confirmacao-texto">
        Sua mensagem foi recebida com sucesso.
    </p>

    <p><strong>Assunto:</strong> <?php echo $assunto; ?></p>

    <p><?php echo $chars; ?> de 500 caracteres usados</p>

    <a href="contato.php" class="btn">Enviar outra mensagem</a>
</div>

<?php include './includes/rodape.php'; ?>
