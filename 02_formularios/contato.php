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
$pagina_atual = "contato";
$caminho_raiz = "../";
$nome = "Rafael de Morais Farias";
$titulo_pagina = "Contato";

$nome_visitante = '';
$email_visitante = '';
$mensagem       = '';

$nome_exibir    = '';
$mensagem_exibir= '';
$email_exibir   = '';
$erros          = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_visitante = trim($_POST['nome_visitante'] ?? '');
    $email_visitante = trim($_POST['email_visitante'] ?? '');
    $mensagem       = trim($_POST['mensagem'] ?? '');

    // validações
    if (empty($nome_visitante)) {
        $erros[] = 'O campo Nome é obrigatório.';
    }

    if (empty($email_visitante)) {
        $erros[] = 'O campo Email é obrigatório.';
    } else {
        // validação de formato de email
        if (!filter_var($email_visitante, FILTER_VALIDATE_EMAIL)) {
            $erros[] = 'O email informado não é válido.';
        }
    }

    if (empty($mensagem)) {
        $erros[] = 'O campo Mensagem é obrigatório.';
    } elseif (strlen($mensagem) < 10) {
        $erros[] = 'A mensagem deve ter pelo menos 10 caracteres.';
    }

    // sucesso
    if (empty($erros) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        header('Location: obrigado.php?nome=' . urlencode($nome_visitante) . '&email=' . urlencode($email_visitante) . '&mensagem=' . urlencode($mensagem));
        exit;
    }
    if (empty($erros)) {
        $nome_exibir = $nome_visitante;
        $email_exibir = $email_visitante;
        $mensagem_exibir = $mensagem;

        // limpa form
        $nome_visitante = '';
        $email_visitante = '';
        $mensagem = '';
    }
}
include '../includes/cabecalho.php'; 
?>

<div class="container">
    <h1 class="titulo-secao">📮 Formulário de Contato</h1>

    <!-- EXIBIÇÃO DE ERROS (Caso existam) -->
    <?php if (!empty($erros)) : ?>
        <div class="alerta-erro" style="background-color: #ffcccc; padding: 10px; border-radius: 5px; margin-bottom: 20px; color: #a00;">
            <p><strong>⚠️ Por favor, corrija os seguintes erros:</strong></p>
            <ul>
                <?php foreach ($erros as $erro) : ?>
                    <li><?php echo $erro; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- FORMULÁRIO HTML -->
    <form class="form-container" action="contato.php" method="post">
        <label>Seu nome:</label>
        <input type="text" name="nome_visitante" value="<?php echo htmlspecialchars($nome_visitante); ?>">

        <label>Seu email:</label>
        <input type="email" name=   "email_visitante" value="<?php echo htmlspecialchars($email_visitante); ?>">

        <label>Sua mensagem:</label>
        <textarea name="mensagem" rows="4"><?php echo htmlspecialchars($mensagem); ?></textarea>

        <button type="submit">Enviar Mensagem</button>
    </form>

    <!-- 3. EXIBIR DADOS (Somente se for POST e NÃO houver erros) -------------- -->
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($erros)) : ?>
        <div class="alerta-sucesso" style="margin-top: 20px; padding: 15px; border: 2px solid #4D067B; border-radius: 8px;">
            <h3>📩 Dados recebidos com sucesso!</h3>
            <p><strong>Nome:</strong> 
                <?php echo htmlspecialchars($nome_exibir); ?>
            </p>

            <p><strong>Email:</strong> 
                <?php echo htmlspecialchars($email_exibir); ?>
            </p>

            <p><strong>Mensagem:</strong> 
                <?php echo htmlspecialchars($mensagem_exibir); ?>
            </p>
        </div>
    <?php endif; ?>
</div>

<?php include '../includes/rodape.php'; ?>
