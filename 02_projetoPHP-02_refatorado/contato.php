<?php
/**
 * ----------------------------------------------------------------------------
 * ARQUIVO     : 02_formularios/contato.php (versão GET + exibição)
 * Disciplina  : Desenvolvimento Web II (2026-DWII)
 * Aula        : 04 - PHP para Web: Formulários, GET e POST
 * Autor       : Rafael de Morais Farias
 * Conceitos   : $_GET, operador ??, htmlspecialchars(), XSS
 * ----------------------------------------------------------------------------
 */

// --- 1. VARIÁVEIS DO TEMPLATE -----------------------------------------------
$nome_visitante = '';
$email_visitante = '';
$mensagem = '';
$assunto = '';
$erros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome_visitante  = trim($_POST['nome_visitante'] ?? '');
    $email_visitante = trim($_POST['email_visitante'] ?? '');
    $mensagem        = trim($_POST['mensagem'] ?? '');
    $assunto         = $_POST['assunto'] ?? '';

    // validações
    if (empty($nome_visitante)) {
        $erros[] = 'O campo Nome é obrigatório.';
    }

    if (empty($email_visitante)) {
        $erros[] = 'O campo Email é obrigatório.';
    } elseif (!filter_var($email_visitante, FILTER_VALIDATE_EMAIL)) {
        $erros[] = 'O email informado não é válido.';
    }

    if (empty($assunto)) {
        $erros[] = 'Selecione um assunto.';
    }

    if (empty($mensagem)) {
        $erros[] = 'O campo Mensagem é obrigatório.';
    } elseif (strlen($mensagem) < 10) {
        $erros[] = 'A mensagem deve ter pelo menos 10 caracteres.';
    } elseif (strlen($mensagem) > 500) {
        $erros[] = 'Máximo de 500 caracteres.';
    }

    // PRG (redirect)
    if (empty($erros)) {
        header("Location: obrigado.php?nome=" . urlencode($nome_visitante) .
               "&assunto=" . urlencode($assunto) .
               "&chars=" . strlen($mensagem));
        exit;
    }
}

// 3.
$pagina_atual = "contato";
$caminho_raiz = "./";
$nome = "Rafael de Morais Farias";
$titulo_pagina = "Contato";

include './includes/cabecalho.php';
?>

<div class="container">
    <h1 class="titulo-secao">📮 Formulário de Contato</h1>

    <!-- ERROS -->
    <?php if (!empty($erros)) : ?>
        <div class="alerta-erro">
            <p><strong>⚠️ Corrija os erros:</strong></p>
            <ul>
                <?php foreach ($erros as $erro) : ?>
                    <li><?php echo $erro; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- FORM -->
    <form class="form-container" action="contato.php" method="post">

        <label>Seu nome:</label>
<input type="text" name="nome_visitante"
       placeholder="Escreva aqui seu nome"
       value="<?php echo htmlspecialchars($nome_visitante); ?>">

        <label>Seu email:</label>
        <input type="email" name="email_visitante"
               placeholder="Escreva aqui seu email"
               value="<?php echo htmlspecialchars($email_visitante); ?>">

        <label>Assunto:</label>
        <select name="assunto">
            <option value="">Selecione</option>
            <option value="Duvida" <?php if($assunto=="Duvida") echo "selected"; ?>>Dúvida</option>
            <option value="Proposta" <?php if($assunto=="Proposta") echo "selected"; ?>>Proposta de trabalho</option>
            <option value="Colaboracao" <?php if($assunto=="Colaboracao") echo "selected"; ?>>Colaboração</option>
            <option value="Outro" <?php if($assunto=="Outro") echo "selected"; ?>>Outro</option>
        </select>

        <label>Sua mensagem:</label>
        <textarea name="mensagem" rows="4" maxlength="500"
          placeholder="Mínimo de 10 caracteres e máximo de 500"><?php echo htmlspecialchars($mensagem); ?></textarea>
        <button type="submit">Enviar Mensagem</button>
    </form>
</div>

<?php include './includes/rodape.php'; ?>