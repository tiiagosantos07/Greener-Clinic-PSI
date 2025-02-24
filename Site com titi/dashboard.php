<?php
// dashboard.php

session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['username'])) {
    // Redirecionar para a página de login caso o usuário não esteja logado
    header("Location: login.php");
    exit();
}

echo "Bem-vindo, " . $_SESSION['username'];
?>
