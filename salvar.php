<?php
require "conexao.php";

// 2º so aceita envio por post
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Acesso invalido");
}

// 3º pega do dados (as chaves = os name do html)
$nome  =  $_POST['nome'];
$email  =  $_POST['email'];
$cpf =  $_POST['cpf'];
$nascimento =  $_POST['nascimento'];
$senha  = password_hash($_POST['senha'], PASSWORD_DEFAULT);

// 4º prepara o insert, com ? no lugar dos valores
$sql  = "INSERT INTO pessoas (nome, email, cpf, nascimento, senha) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// 5º liga os valores aos ? 
$stmt->bind_param("sssss", $nome, $email, $cpf, $nascimento, $senha);

// 6) EXECUTA (agora com tratamento de erro)
try {
    $stmt->execute();
    echo "Cadastro feito com sucesso!";
} catch (\Throwable $e) {
    if ($e->getCode() === 1062) {
         if (str_contains($e->getMessage(), 'email')) {   // qual coluna repetiu?
            echo "E-mail já cadastrado!";
        } else {
            echo "CPF já cadastrado!";
        }
    } else {
        echo "Erro ao cadastrar.";
    }
}


$stmt->close();
$conn->close();