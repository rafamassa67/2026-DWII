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
<body style="font-family: Arial, sans-serif; margin: 0; background-color: #f3f4f6;">
    <?php include "includes/cabecalho.php"; ?>
        <div style="max-width: 800px; margin: 40px auto; padding: 0 20px;">
            <h1 style="color: #3b579d;">👁️‍🗨️ Sobre mim</h1>
            <p> Olá! Sou <strong><?php echo $nome; ?></strong>, estudante de tecnico em informatica no IFPR de Ponta Grossa</p>
            <p> Gosto de desenhar, jogar mine, fazer origamis, projetos pessoais meus pros meus amigos e prefiro frio do que calor. <br>
        Gosto de andar de bicicleta, me cuidar, ler mangas e livros, escrever historias e crônicas, gosto de filosofia e discussões, em especial a area da metafísica, gosto de ouvir musica, falar com meus amigos do SDG, gosto de comer krakovia com ovo frito, misto quente de requeijão e amo de coração café. <p>
        Pretendo me tornar um militar pra ganhar bastante dinheiro e regalias e tambem professor porque essa é a minha verdadeira profissão dos sonhos. Depois disso vou fazer um monte de faculdades e me tornar um intelectual.<br>
            </p>
        </div>

    <?php include "includes/rodape.php"; ?>
</body>
</html>