<?php
/**
 * ------------------------------------------------------------------
 * ARQUIVO      : includes/nav.php
 * Disciplina   : Desenvolvimento Web II (2026-DWII)
 * Aula         : 04 - PHP para Web: Formulários, GET e POST
 * Autor        : Rafael de Morais Farias
 * Conceitos    : Menu dinâmico, operador ternário, $caminho_raiz
 * ------------------------------------------------------------------
 */

// Valores padrão: evita erro se a página esquecer de declarar
if (!isset($pagina_atual)) $pagina_atual = "";
if (!isset($caminho_raiz)) $caminho_raiz = "./";

function menu_class($item, $atual) {
    return ($item === $atual) ? 'class="ativo"' : '';
}
$logado = isset($_SESSION['usuario']);
?>
<!-- nav usa a classe CSS definida em style.css - sem style inline -->
<nav>
    <!-- Links para o portfólio - Aula 03 -->
    <a href="<?php echo $caminho_raiz; ?>index.php" 
       <?php echo menu_class("inicio", $pagina_atual); ?>>
       🔰 Início
    </a>

    <a href="<?php echo $caminho_raiz; ?>sobre.php" 
       <?php echo menu_class("sobre", $pagina_atual); ?>>
       🩻 Sobre
    </a>

    <a href="<?php echo $caminho_raiz; ?>projetos.php" 
       <?php echo menu_class("projetos", $pagina_atual); ?>>
       🗃️ Projetos
    </a>

    <!-- Link para o formulário - Aula 04 -->
    <a href="<?php echo $caminho_raiz; ?>contato.php" 
       <?php echo menu_class("contato", $pagina_atual); ?>>
       🗣️ Contato
    </a>
   
    <!-- Link para o painel - Aula 04 -->
    <a href="<?php echo $caminho_raiz; ?>publico.php" 
       <?php echo menu_class("publico", $pagina_atual); ?>>
       🌐 Publico
    </a>

           <!-- Link para o catalogo - Aula 05 -->
      <a href="<?php echo $caminho_raiz; ?>05_crud/index.php" 
      <?php echo menu_class("catalogo", $pagina_atual); ?>>
       📚 Catálogo
      </a>

    <?php if (isset($_SESSION['usuario'])): ?>
        <!-- Link para o painel - Aula 04 -->
        <a href="<?php echo $caminho_raiz; ?>04_sessoes/painel.php" 
           <?php echo menu_class("painel", $pagina_atual); ?>>
           💹 Painel
        </a>
        <!-- Link para Sair -->
        <a href="<?php echo $caminho_raiz; ?>04_sessoes/logout.php">
          ⭕ Sair
        </a>
   <?php else: ?>
        <!-- Link para Login -->
        <a href="<?php echo $caminho_raiz; ?>04_sessoes/login.php" 
           <?php echo menu_class("login", $pagina_atual); ?>>
          🔏 Login
        </a>
    <?php endif; ?>
</nav>