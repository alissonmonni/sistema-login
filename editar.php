<?php
require_once "config.php";

$id = $_GET["id"];


if($_SERVER['REQUEST_METHOD'] == "POST"){

   $name = $_POST['name'];
   $email = $_POST['email'];
   $hashed_password = password_hash($password, PASSWORD_DEFAULT);

   $sql = "UPDATE usuarios SET name='$name', email='$email', password='$hashed_password' WHERE id='$id'";

   if($conexao->query($sql) === TRUE){
     echo "Registro alterado com sucesso";
      header('location: listar.php');
   }else{
      echo "Erro ao alterar o registro" . $conexao->error;
   }
}

$sql = "SELECT * FROM usuarios WHERE id='$id'";
$resultado = $conexao->query($sql);

if($resultado->num_rows > 0){
   $linha = $resultado->fetch_assoc();
   $name = $linha['name'];
   $email = $linha['email'];
   $hashed_password = password_hash($password, PASSWORD_DEFAULT);
}else{
   echo "Registro não localizado";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="estilo_editar.css">
   <title>Editar usuários</title>
</head>
<body>
   

   <form method="post" action="<?php echo $_SERVER['PHP_SELF']. "?id=" . $id; ?>">
   <h2>Edição de usuários</h2>
      <p>         
        Nome:  <input id="name" type="text" name="name" value="<?php echo $name; ?>" required>
      </p>

      <p>
         E-Mail: <input id="email" type="email" name="email" value="<?php echo $email; ?>"  required>
      </p>

      <p>
        Password: <input id="password" type="password" name="password" value="<?php echo $hashed_password; ?>" required>
      </p>

      <p>
         <button class="btn" type="submit">Salvar</button>
      </p>
   </form>
</body>
</html>