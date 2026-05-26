<?php
/**
 * ============================================================================
 * Disciplina : Desenvolvimento Web II (DWII)
 * Projeto : Portfólio Pessoal - versão refatorada
 * Arquivo : catalogo.php (migrado de 03_pdo/index.php)
 * Autor : Rafael de Morais Farias
 * Data : 25/05/26
 * Descrição : Lista pública de tecnologias do banco unificado.
 * Exibe apenas registros com status = 'ativo'.
 * ============================================================================
 */

// session_start() é idempotente: já iniciada não dá erro,
if (session_status() === PHP_SESSION_NONE) session_start();

// Trio padrão de variáveis que cabecalho.php espera:
$pagina_atual = 'catalogo';
$titulo_pagina = 'Catálogo de Tecnologias | Portfólio DWII';
$caminho_raiz = './';

// __DIR__ retorna o caminho ABSOLUTO do diretório deste arquivo,
require_once __DIR__ . '/includes/conexao.php';

// conectar() devolve uma instância PDO nova.
$pdo = conectar();

// Filtro WHERE status = 'ativo':
// tecnologias com status = 'inativo' ainda existem no banco,
// mas não aparecem ao visitante. O painel admin pode listar
// todas (filtro diferente) para reativar quando quiser.
$stmt = $pdo->query(
"SELECT * FROM tecnologias
WHERE status = 'ativo'
ORDER BY nome ASC"
);
$tecnologias = $stmt->fetchAll();
?>
<!DOCTYPEDOCTYPE html>
<html lang="pt-BR">
<head>
<?php
  // Note o __DIR__ aqui também - não dependemos do CWD em
  // NENHUM include do projeto.
  include __DIR__ . '/includes/cabecalho.php';
?>
</head>
<body>
<div class="container">
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;"></div>
<h1 class="titulo-secao" style="margin: 0;">🦓 Catálogo de Tecnologias</h1>
<span style="color: #6b7280; font-size: 14px;">
  <?php echo count($tecnologias); ?> tecnologia(s)
</span>
</div>

<?php if (empty($tecnologias)): ?>
<!-- Estado vazio: nenhuma tecnologia ativa cadastrada. -->
<div class="card" style="text-align: center; padding: 40px 20px; color: #6b7280;">
<p style="font-size: 40px; margin: 0 0 12px;">📁</p>
<p style="font-size: 16px; margin: 0;">Nenhuma tecnologia ativa.</p>
</div>
<?php else: ?>

<?php foreach ($tecnologias as $tec): ?>
<div class="card">
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
<h3 style="margin: 0;">
<?php
// htmlspecialchars(): converte < > " & em entidades.
// Bloqueia XSS - se um atacante salvar <script>
// no banco, vira texto literal aqui, não código.
echo htmlspecialchars($tec['nome']);
?>
</h3>
<span style="background: #e8edf5; color: #3b579d; padding: 3px 10px;
border-radius: 20px; font-size: 13px; white-space: nowrap;">
<?php echo htmlspecialchars($tec['categoria']); ?>
</span>
</div>
<p style="margin: 0 0 10px;"><?php echo htmlspecialchars($tec['descricao']); ?></p>

<!-- (int) sobre o ID: cast defensivo. Mesmo vindo do banco
como string, garantimos que só inteiro entra na URL. -->
<a href="detalhe.php?id=<?php echo (int) $tec['id']; ?>"
class="btn-secundario">Ver detalhes ➔</a>
</div>
<?php endforeach; ?>

<?php endif; ?>
</div>

<?php include __DIR__ . '/includes/rodape.php'; ?>
</body>
</html>