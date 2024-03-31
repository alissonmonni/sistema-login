<?php

require_once 'config.php';

$sql = "SELECT * FROM usuarios";
$resultado = $conexao->query($sql);

   echo "<a href='cadastrar.php?'> Cadastrar novo</a>";

if(mysqli_num_rows($resultado) > 0) {

   echo "<table>
            <tr>
               <th>Identificador</th>
               <th>Nome</th>
               <th>E-mail</th>
               <th>Senha</th>
               <th>Opções</th>
            </tr>";

   while($linha = mysqli_fetch_assoc($resultado)) {
      echo "<tr>";
      echo "<td>" . $linha['id']. "</td>";
      echo "<td>" . $linha['name']. "</td>";
      echo "<td>" . $linha['email']. "</td>";
      echo "<td>" . $linha['password']. "</td>";
      echo "<td><a href='editar.php?id=" .$linha['id']. "'>&#9998;</a> <a href='deletar.php?id=" .$linha['id']. "'>&#10060;</a></td>";
      echo "</tr>";
   }  

}else{
   echo "<tr><td colspan='4'> Nenhum registro encontrado</td></tr>";
   
}

echo "</table>";
   
?>

<style>
    body {
        background-color: #000;
        color: #fff;
        font-family: Arial, sans-serif;
    }

    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
    }

    th, td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #333;
        color: #fff;
    }


    tr:hover {
        background-color: #555;
    }

    a.link {
        display: block;
        text-align: center;
        color: #aaa;
        text-decoration: none;
        transition: color 0.3s ease;
        margin-bottom: 20px;
    }

    a.link:hover {
        color: #fff;
    }

    a.edit-link, a.delete-link {
        color: #4caf50;
        margin-right: 10px;
        text-decoration: none;
    }

    a.edit-link:hover, a.delete-link:hover {
        color: #45a049;
    }

    .no-record {
        text-align: center;
        margin-top: 20px;
    }
</style>