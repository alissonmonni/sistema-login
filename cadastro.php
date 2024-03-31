<?php

require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (name, email, password) VALUES (?, ?, ?)";

    $stmt = $conexao->prepare($sql);

    $stmt->bind_param("sss", $name, $email, $hashed_password);

    if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso.";
    } else {
        echo "Erro ao cadastrar: " . $sql . "<br>" . $conexao->error;
    }

    echo "<a href='index.php?'>Fazer Login</a>";
    
    $stmt->close();
}

$conexao->close();
?>


<style>
    body {
        background-color: #000;
        color: #fff;
        font-family: Arial, sans-serif;
        text-align: center;
    }

    .success {
        color: #4caf50;
    }

    .error {
        color: #f44336;
    }

    .login-link {
        display: block;
        margin-top: 20px;
        color: #aaa;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .login-link:hover {
        color: #fff;
    }
</style>