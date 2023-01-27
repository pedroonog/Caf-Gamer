<?php 

  $conexao=mysqli_connect('localhost', 'root', '') ;
 
  mysqli_select_db($conexao, 'cafegamer') or 
    die("Erro na seleção do banco:" . mysqli_error($conexao));

  $codigo = $_GET["c"];
  $comandoSQL=" DELETE FROM clientes WHERE codigo=$codigo";
  mysqli_query($conexao, $comandoSQL) or 
    die("Erro na exclusão do cliente: " . mysqli_error($conexao));
  
  echo "Cliente $codigo excluído com sucesso!<hr>";
  echo "<a href='listagemClientes.php'>Continuar</a>";
?>
