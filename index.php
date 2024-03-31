<?php

require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE name = ? AND email = ?";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ss", $name, $email);
    $stmt->execute();

    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $row = $resultado->fetch_assoc();

        if (password_verify($password, $row['password'])){

            $_SESSION["loggedin"] = true;

            $_SESSION["name"] = $row['name'];

            header("Location: painel.php");
            exit;
        }
            
           
        } else {
            $error = "Usuário ou senha incorretos.";
        }
    }
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="estilo.css">
   <title>Login</title>
</head>
<body>
   
   <form action="index.php" method="POST">
   <h1>Fazer Login </h1>

        <p>
         
         <input placeholder="Digite seu nome completo: " id="name" type="text" name="name" required>
      </p>

      <p>
         
         <input placeholder="Digite seu E-mail: " id="email" type="email" name="email" required>
      </p>

      <p>
         
         <input placeholder="Digite sua senha: " id="password" type="password" name="password" required>
      </p>
     
      <button class="btn" type="submit">Login</button>
      <br><br>
      <a href="cadastrar.php">Ainda não possui conta? Cadastre-se!</a>
   </form>
   
</body>
</html>
