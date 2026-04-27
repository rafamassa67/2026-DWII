<?php
/**
 * Disciplina : Desenvolvimento Web II (DWII)
 * Aula       : 06 - Autenticação com sessões e controle de acesso
 * Arquivo    : 04_sessoes/logout.php
 * Autor      : Rafael de Morais Farias
 * Data       : 06/04/2026
 */

session_start();

//1. limpar todos os dados da sessão
session_unset();

// 2. destruir o cookie de sessão
session_destroy();

// 3. redirecionar para a página de login
header('Location: publico.php');
exit;
?>