<?php
/**
 * Disciplina : Desenvolvimento Web II (DWII)
 * Aula       : 08 - CRUD Completo: Delete
 * Arquivo    : 05_crud/excluir.php
 * Autor      : rafael de Morais Farias
 * Data       : 11/04/2026
 * Descrição  : Implementa o D do CRUD (Delete).
 *              Este arquivo tem três responsabilidades:
 *              1. Validar o ID recebido via GET
 *              2. Exibir tela de confirmação (GET)
 *              3. Processar o DELETE após confirmação (POST)
 * 
 *              REGRA: DELETE nunca é executado via GET.
 *              Somente um POST intencional dispara a remoção.
 */

// --- Proteção: apenas usuários autenticados ---
require_once __DIR__ . '/../04_sessoes/includes/auth.php';
requer_login();

// --- Dependências ---
require_once __DIR__ . '/includes/conexao.php';

// --- Validação do ID - Camada 1: formato ---
$id = (int) ($_GET['id'] ?? 0);

if ($id <= 0) {
    header('Location: index.php?erro=id_invalido');
    exit;
}

// --- Validação do ID - Camada 2: existência no banco ---
$pdo = conectar();
$stmt = $pdo->prepare('SELECT nome FROM projetos WHERE id = :id');
$stmt->execute([':id' => $id]);
$projeto = $stmt->fetch();

if (!$projeto) {
    header('Location: index.php?erro=nao_encontrado');
    exit;
}

// --- Processamento do POST (DELETE) ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $stmt = $pdo->prepare('DELETE FROM projetos WHERE id = :id');
    $stmt->execute([':id' => $id]);

    header('Location: index.php?excluido=ok');
    exit;
}

// --- Variáveis para cabecalho.php ---
$titulo_pagina = 'Excluir Projeto - Portfólio';
$caminho_raiz = '../';
$pagina_atual = '';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php require_once __DIR__ . '/../includes/cabecalho.php'; ?>
</head>
<body>

<div class="container excluir-container">

    <h1 class="titulo-secao titulo-excluir">🗑️ Confirmar Exclusão</h1>

    <!-- Tela de confirmação — exibida apenas via GET -->
    <div class="card-excluir">

        <p>
            Você está prestes a excluir o projeto:
        </p>

        <p class="nome-projeto">
            <?php echo htmlspecialchars($projeto['nome']); ?>
        </p>

        <p class="aviso-excluir">
            🦋 Esta ação <strong>terá consequências</strong>.
        </p>

        <!-- Formulário de confirmação -->
        <form action="excluir.php?id=<?php echo $id; ?>" method="post">
            <div class="acoes-excluir">
                
                <!-- Confirma -->
                <button type="submit" class="btn-perigo">
                    🗑️ Sim, excluir
                </button>

                <!-- Cancela -->
                <a href="index.php" class="btn-secundario">
                    Cancelar
                </a>

            </div>
        </form>

    </div>

</div>

<?php require_once __DIR__ . '/../includes/rodape.php'; ?>
</body>
</html>