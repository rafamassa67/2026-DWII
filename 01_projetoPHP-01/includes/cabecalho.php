<?php
// isset() verifica se a variável foi definida antes de usá-la.
// Valor padrão ativa caso a página esqueça de declarar $titulo_pagina.
if (!isset($titulo_pagina)) $titulo_pagina = "Portfólio DWII";
if (!isset($caminho_raiz)) $caminho_raiz = "./"; // padrão: um nível acima
?>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo htmlspecialchars($titulo_pagina); ?></title>

<!-- 
<link> aponta para o CSS usando $caminho_raiz.
01_php-intro/index.php -> $caminho_raiz = '../' -> '../includes/style.css'
02_formularios/contato.php -> igual: '../includes/style.css'
Assim um único arquivo CSS serve a todas as pastas.
-->

<link rel="stylesheet" href="<?php echo $caminho_raiz; ?>includes/style.css">

<?php
// __DIR__ é uma constante PHP que retorna o caminho absoluto
// do diretório onde este arquivo está - garante que o include
// funciona independente de onde a página que o chamou está.
include __DIR__ . '/nav.php';
?>