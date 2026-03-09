<!-- 01 php-intro/index.php -->
<!--
Desenvolvimento Web II (DWII) Disciplina
Aula : 03 Arquitetura Web e Introdução ao PHP
Autor : Rafael de Morais
Data : 02/03/2026
Repositório: https://github.com/rafamassa67/2026-DWII
-->
<?php
// Variaveis de php - serão utilizaas no HTML a baixo
$nome = "Rafael";
$profissao = "Estudante de Tecnologia";
$curso = "Técnico em informatica - IFPR";
$pagina_atual = "inicio";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portifólio - <?php echo $nome; ?></title>
    <style>
        body {font-family: Arial, sans-serif; margin: 0; background-color: #f3f4f6;}
        nav {background-color: #4c0377; padding: 15px 30px;}
        nav a {color: white; text-decoration: none; margin-right: 20px; font-weight: bold;}
        nav a:hover {text-decoration: underline;}
        .hero {background: linear-gradient(135deg, #ff0000, #0040ff); color: white; text-align: center; padding: 60px 20px;}
        .hero h1 {font-size: 2.5em; margin-bottom: 10px;}
        .hero p {font-size: 1.2em; opacity: 0.9;}
        .container {max-width: 800px; margin: 40px auto; padding: 0 20px;}
        footer {background-color: #010000; color: #6b7280; text-align: center; padding: 20px; margin-top: 60px; font-size: 14px;}
    </style>
</head>
<body>
<?php include "includes/cabecalho.php"; ?>
    <div class="hero">
        <h1><?php echo $nome; ?>!</h1>
        <p><?php echo $profissao; ?> | <?php echo $curso; ?></p>
    </div>

    <div class="container">
        <h1>Bem-vindo ao meu portfólio</h1>
        <p>Esta página foi gerado pelo PHP em: 
            <strong><?php echo date("d/m/Y \á\s H:i"); ?></strong></p>
        </div>

'<?php include "includes/rodape.php"; ?>
</body>
</html>
