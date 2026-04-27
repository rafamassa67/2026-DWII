<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


$pagina_atual  = 'inicio';
$caminho_raiz  = './';
$titulo_pagina = 'Portfólio — Rafael de Morais Farias';

// ── 3. Dados de apresentação ─────────────────────────────────

$nome      = 'Rafael de Morais Farias';
$descricao = 'Eu sou o Rafael de Morais Farias, o cara aí da foto e estudo no IF. Tenho 17 anos e to no terceiro ano porque nao reprovei ainda. Gosto de desenhar, jogar mine, fazer origamis, projetos pessoais meus pros meus amigos e prefiro frio do que calor. Gosto de andar de bicicleta, me cuidar, gosto de ler mangas e livros, escrever historias e crônicas, gosto de filosofia e discussões, em especial a area da metafísica, gosto de ouvir musica, falar com meus amigos do SDG, gosto de comer krakovia com ovo frito, misto quente de requeijão e amo de coração café e mulheres de personalidade marcante.';
$email     = 'rafaelfarias3380@gmail.com';
?>

<!DOCTYPE html>

<html lang="pt-BR">
<head>
  <?php

include __DIR__ . '/includes/cabecalho.php';
?>

</head>
<body>

  <main>
    <section class="apresentacao">

  <!-- Foto de perfil -->
  <div class="foto-container">
    <img
      src="<?php echo $caminho_raiz; ?>includes/imgs/eu.jpeg"
      alt="Foto de <?php echo htmlspecialchars($nome); ?>"
      class="foto-perfil">
  </div>

  <!-- Bloco de texto + cards informativos -->
  <div class="texto-container">

    <h2>
      Olá, eu sou <?php echo htmlspecialchars($nome); ?>! 👋
    </h2>

    <?php
    ?>
    <p><?php echo htmlspecialchars($descricao); ?></p>

    <div class="info-cards">

      <div class="info-card">
        <span class="card-icon">🎓</span>
        <span class="card-texto">Técnico em Informática — IFPR CRPG</span>
      </div>

      <div class="info-card">
        <span class="card-icon">💻</span>
        <span class="card-texto">Desenvolvimento Web II — 2026</span>
      </div>

      <div class="info-card">
        <span class="card-icon">📧</span>
        <span class="card-texto">
          <?php echo htmlspecialchars($email); ?>
        </span>
      </div>

    </div><!-- /info-cards -->

  </div><!-- /texto-container -->

</section>
  </main>

  <?php include __DIR__ . '/includes/rodape.php'; ?>

</body>
</html>