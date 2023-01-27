<html>
	<head>
		<title>Listagem de Clientes</title>
	</head>
	<body>
	<?php 
		
	include "conexao.php";
		
		$comandoSQL="SELECT * FROM clientes ORDER BY codigo";
		
		 
			$rs = mysqli_query($conexao , $comandoSQL) or
		die("Falha na seleção de dados:" .
			mysqli_error($conexao) );
			  
		$linhas = mysqli_num_rows($rs) ;
		
		if ($linhas ==0) 
			die ("Tabela de <b>Clientes</b> está vazia!");
		
		echo "Foram encontrados <b>$linhas</b> Clientes <br>";
		
		
		$contador = 0;
		
		echo "<table border='1'>";
		echo "	<tr>";
		echo "		<th>Código</th>";
		echo "		<th>Ativo</th>";
		echo "		<th>Nome</th>";
		echo "		<th>DDD</th>";
		echo "		<th>Celular</th>";
		echo "		<th>email</th>";
		echo "		<th>CPF</th>";
		echo "		<th>Endereço</th>";
		echo "		<th>Cidade</th>";
		echo "		<th>UF</th>";
		echo "		<th>Já é Cliente</th>";
		echo "		<th>Bloqueio</th>";
		echo "		<th colspan=2>Ações</th>";
		echo "	</tr>";
		
		
		
		while ($contador < $linhas)
		{
			$dados = mysqli_fetch_array($rs);
			$codigo  	 = $dados["codigo"];
			$ativo  	 = $dados["ativo"];
			$nome 		 = $dados["nome"];
			$ddd		 = $dados["ddd"];
			$foneCelular = $dados["foneCelular"];
			$email  	 = $dados["email"];
			$cpf 		 = $dados["cpf"];
			$endereco	 = $dados["endereco"];
			$cidade		 = $dados["cidade"];
			$uf			 = $dados["uf"];
			$jaCliente	 = $dados["jaCliente"];
			$bloqueio  	 = $dados["bloqueio"];
			
			echo "<tr>";
			
			echo "	<td>$codigo</td>" ;
			echo "	<td>$ativo</td>" ;
			echo "	<td>$nome</td>" ;
			echo "	<td>$ddd</td>";
			echo "	<td>$foneCelular</td>" ;
			echo "	<td>$email</td>" ;
			echo "	<td>$cpf</td>" ;
			echo "	<td>$endereco</td>" ;
			echo "	<td>$cidade</td>";
			echo "	<td>$uf</td>";
			echo "	<td>$jaCliente</td>";
			echo "	<td>$bloqueio</td>" ;
			echo "		<td> <a href='alterarCliente.php?c=$codigo'>Alterar</a> </td>" ;
			echo "		<td> <a href='excluirClientes.php?c=$codigo'>Excluir</a> </td>" ;
			echo "	</tr>";
		
			++$contador;
		}
		echo "</table>";
		
	
		
?>
	<hr>
	Clique <a href='cadClientes.html'>aqui</a> para 
		incluir um novo Cliente.
		
	</body>
</html>