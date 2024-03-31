<?php
require_once "config.php";

$id = $_GET["id"];

$sql = "DELETE FROM usuarios WHERE id= $id";

if($conexao->query($sql) === TRUE){
   echo "Registro excluido com sucesso";
   header('location: listar.php');
}else{
   echo "Erro ao excluir o registro" . $conexao->error;
}


?>