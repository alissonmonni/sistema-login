<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo_cadastro.css">
    <title>Cadastro</title>
</head>
<body>
    
    <form action="cadastro.php" method="post">
    <h1>Cadastro de Usuário</h1>
        <p>
            <input placeholder="Informe o nome completo" type="text" name="name" id="name" required>
        </p>
        <p>
            <input placeholder="Informe o E-mail" type="email" name="email" id="email" required>
        </p>
        <p>
            <input placeholder="Senha" type="password" name="password" id="password" required>
        </p>
        <p>
            <button type="submit" name="cadastrar">Cadastrar</button>
        </p>
        <a href="index.php">Ja tem conta? Faça o Login!</a>
    </form>
    
</body>
</html>

