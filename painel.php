<?php
session_start();

if (!isset($_SESSION['id'])) {   // chave que a gente gravou no login
    header("Location: login.html");
    exit;
}
?>
<h1>Bem-vindo, <?= htmlspecialchars($_SESSION['nome']) ?>!</h1>
<a href="logout.php">Sair</a>