<?php
session_start();   // sempre na 1ª linha, antes de qualquer saída

require "conexao.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Acesso inválido");
}

$email = $_POST['email'];
$senha = $_POST['senha'];

// busca pelo E-MAIL (nunca pela senha)
$stmt = $conn->prepare("SELECT id, nome, senha FROM pessoas WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();            // pega o resultado da consulta
$pessoa    = $resultado->fetch_assoc();  // 1 linha em array, ou null se não achou

if ($pessoa && password_verify($senha, $pessoa['senha'])) {   // compara digitada x hash
    session_regenerate_id(true);          // gera novo código de sessão (segurança)
    $_SESSION['id']   = $pessoa['id'];
    $_SESSION['nome'] = $pessoa['nome']; // coluna com o nome
    header("Location: painel.php");
    exit;
} else {
    echo "E-mail ou senha incorretos.";
}