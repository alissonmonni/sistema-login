<?php
    require_once "config.php";

    function logout()
    {
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit;
    }

    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("Location: index.php");
        exit;
    }

?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo_painel.css">
    <title>Web Site</title>
</head>
<body>

<p>
<?php
   
    if (isset($_SESSION["name"])) {
        echo "Bem vindo ao Painel, <span class='user-name'>" . $_SESSION["name"] . "</span>!";
    } else {
        
        echo "A sessão expirou. Faça login novamente.";
        
    }
    ?>
</p>
<br>
      <a href="listar.php">Lista de usuários cadastrados.</a>
      <br>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<input type="submit" name="logout" value="logout">

<?php 
if (isset($_POST["logout"])) {
    logout();
}
?>

</body>
</html>
