<?php
/**
 * Disciplina : Desenvolvimento Web II (DWII)
 * Aula       : 08 - CRUD completo uptade e delete
 * Arquivo    : 05_crud/index.php
 * Autor      : Rafael de Morais Farias
 * Data       : 06/04/2024
 * Descrição  : Exibe a listagem de projetos e exibe mensagens de feedback após ações de cadastro, edição ou exclusão.
 */

// --- Proteção: apenas usuários autenticados ---
require_once __DIR__ . '/../04_sessoes/includes/auth.php';
requer_login();

// --- Dependências ---
require_once __DIR__ . '/includes/conexao.php';

// --- Busca todos os projetos ordenados pelo mais recente ---
$pdo = conectar();

$busca = trim($_GET['busca'] ?? '');

if ($busca !== '') {
    $stmt = $pdo->prepare('SELECT * FROM projetos WHERE nome LIKE :busca ORDER BY criado_em DESC');
    $stmt->execute([
        ':busca' => '%' . $busca . '%'
    ]);
} else {
    $stmt = $pdo->query('SELECT * FROM projetos ORDER BY criado_em DESC');
}

$projetos = $stmt->fetchAll();

// --- Mensagem de sucesso após cadastro ---
$cadastroOk = isset($_GET['cadastro']) && $_GET['cadastro'] === 'ok';

// --- Mensagem de sucesso após atualização ---
$editadoOk = isset($_GET['editado']) && $_GET['editado'] === 'ok';

// --- Mensagem de sucesso após exclusão ---
$excluidoOk = isset($_GET['excluido']) && $_GET['excluido'] === 'ok';

// mensagens de erro de validação ou operação
$erroMsg = isset($_GET['erro']) ? $_GET['erro'] : '';

$titulo_pagina = 'Meus Projetos - Portfólio';
$caminho_raiz = '../';
$pagina_atual = '';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php require_once __DIR__ . '/../includes/cabecalho.php'; ?>
</head>
<body>

<div class="container">

<div class="topo-projetos">

    <h1 class="titulo-secao">🗃️ Meus Projetos</h1>

    <form method="get" style="display:flex; gap:10px; align-items:center;">
        <input type="text" name="busca"
               placeholder="Buscar projeto..."
               value="<?php echo htmlspecialchars($_GET['busca'] ?? ''); ?>"
               style="padding:8px; border-radius:6px; border:1px solid #ccc;">

        <button type="submit" class="btn btn-primario">🔍</button>
    </form>

    <a href="cadastrar.php" class="btn btn-primario">🔆 Novo Projeto</a>

</div>

    <?php if ($cadastroOk): ?>
        <div class="alerta-sucesso">
            <p>🆗 Projeto cadastrado com sucesso!</p>
        </div>
    <?php endif; ?>

    <?php if ($editadoOk): ?>
        <div class="alerta-sucesso">
            <p>🔄️ Projeto atualizado com sucesso!</p>
        </div>
    <?php endif; ?>

    <?php if ($excluidoOk): ?>
        <div class="alerta-sucesso">
            <p>🚮 Projeto removido com sucesso!</p>
        </div>
    <?php endif; ?>

    <?php if ($erroMsg === 'nao_encontrado'): ?>
        <div class="alerta-erro">
        <p>❔ Projeto não encontrado</p>
        </div>

    <?php elseif ($erroMsg === 'id_invalido'): ?>
        <div class="alerta-erro">
        <p>❕ Requisição inválida</p>
        </div>
    <?php endif; ?>

    <?php if (empty($projetos)): ?>
        <!-- Estado vazio: nenhum projeto ainda -->
        <div class="card vazio">
            <p class="icone-vazio">📁</p>
            <p>Nenhum projeto cadastrado ainda.</p>
            <a href="cadastrar.php" class="btn btn-primario">➕ Cadastrar o primeiro projeto</a>
        </div>

    <?php else: ?>
        <!-- Grade de projetos -->
        <div class="grid-projetos">
            <?php foreach ($projetos as $projeto): ?>
                <div class="card projeto-card">

                    <h3>
                        <?php echo htmlspecialchars($projeto['nome']); ?>
                    </h3>

                    <p class="descricao">
                        <?php echo htmlspecialchars($projeto['descricao']); ?>
                    </p>

                    <p class="meta">
                        🛠️ <?php echo htmlspecialchars($projeto['tecnologias']); ?>
                    </p>

                    <p class="meta">
                        ⌚ <?php echo htmlspecialchars($projeto['ano']); ?>
                    </p>

                    <?php if ($projeto['link_github']): ?>
                        <a href="<?php echo htmlspecialchars($projeto['link_github']); ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                        style="
                            display:inline-block;
                            margin-top:10px;
                            margin-right:6px;
                            padding:6px 12px;
                            background:#7209B7;
                            color:white;
                            border-radius:6px;
                            text-decoration:none;
                            font-size:13px;
                            font-weight:bold;">
                            👾 GitHub
                        </a>
                    <?php endif; ?>

                    <a href="editar.php?id=<?php echo $projeto['id']; ?>"
                    style="
                        display:inline-block;
                        margin-top:10px;
                        margin-right:6px;
                        padding:6px 12px;
                        background:#8318c9;
                        color:white;
                        border-radius:6px;
                        text-decoration:none;
                        font-size:13px;
                        font-weight:bold;">
                        ✏️ Editar
                    </a>

                    <a href="excluir.php?id=<?php echo $projeto['id']; ?>"
                    style="
                        display:inline-block;
                        margin-top:10px;
                        padding:6px 12px;
                        background:#4D067B;
                        color:white;
                        border-radius:6px;
                        text-decoration:none;
                        font-size:13px;
                        font-weight:bold;">
                        🗑️ Excluir
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <p class="contador-projetos">
            <?php echo count($projetos); ?> projeto(s) cadastrado(s)
        </p>
        <?php endif; ?>

</div>

<?php require_once __DIR__ . '/../includes/rodape.php'; ?>
</body>
</html>