<?php
$nome = "Rafael";
$pagina_atual = "sobre";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre - <?php echo $nome; ?></title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; background-color: #eee6c7;">
    <?php include "includes/cabecalho.php"; ?>
        <div style="max-width: 800px; margin: 40px auto; padding: 0 20px;">
        <h1 style="color: #161c4d;">👁️‍🗨️ Sobre mim</h1>
        <p> Olá! Sou <strong><?php echo $nome; ?></strong>, estudante de tecnico em informatica no IFPR de Ponta Grossa. Atualmente estou no terceiro ano. Entrei nesse curso por se não eu ia ira parar no Polivalente, mas por incrivel que pareca eu descobri que gosto de informatica.</p>
        <p> Eu gosto de desenhar, jogar mine, fazer origamis, projetos pessoais meus pros meus amigos e prefiro frio do que calor. <br>
        Gosto de andar de bicicleta, me cuidar, ler mangas e livros, escrever historias e crônicas, gosto de filosofia e discussões, em especial a area da metafísica, gosto de ouvir musica, falar com meus amigos do SDG, gosto de comer krakovia com ovo frito e amo muito café, misto quente e mulheres de cabelo curto com personalidade marcante.<p>
        Pretendo me tornar um militar pra ganhar bastante dinheiro e regalias e tambem professor porque essa é a minha verdadeira profissão dos sonhos. Depois disso vou fazer um monte de faculdades e me tornar um intelectual.</p>
        </div>
    <?php include "includes/rodape.php"; ?>
</body>
</html>