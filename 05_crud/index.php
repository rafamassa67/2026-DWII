<?php
/**
 * Disciplina : Desenvolvimento Web II (DWII)
 * Aula       : 07 - CRUD: Create e Read
 * Arquivo    : 05_crud/index.php
 * Autor      : Rafael de Morais Farias
 * Data       : 06/04/2024
 * Descrição  : Exibe a listagem de projetos
 */

// --- Proteção: apenas usuários autenticados ---
require_once __DIR__ . '/../04_sessoes/includes/auth.php';
requer_login();

// --- Dependências ---
require_once __DIR__ . '/includes/conexao.php';

// --- Busca todos os projetos ordenados pelo mais recente ---
$pdo = conectar();
$stmt = $pdo->query('SELECT * FROM projetos ORDER BY criado_em DESC');
$projetos = $stmt->fetchAll();

// --- Mensagem de sucesso após cadastro ---
$cadastroOk = isset($_GET['cadastro']) && $_GET['cadastro'] === 'ok';

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
        <a href="cadastrar.php" class="btn btn-primario">🔆 Novo Projeto</a>
    </div>

    <?php if ($cadastroOk): ?>
        <div class="alerta-sucesso">
            <p>✅ Projeto cadastrado com sucesso!</p>
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
                           class="btn btn-secundario">
                            👾 Ver no GitHub
                        </a>
                    <?php endif; ?>

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