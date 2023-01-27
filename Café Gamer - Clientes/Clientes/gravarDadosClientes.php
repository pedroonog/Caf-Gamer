<html> 
	<head>
		<title>Gravação de dados</title>
	</head>
	<body>
	<?php	
	$codigo				= (int)	$_POST["codigo"];
	
	$ativo=0;
	if ( isset($_POST["ativo"]) )
		$ativo=(int)$_POST["ativo"];
	
	$nome				= $_POST["nome"];
	$ddd				= $_POST["ddd"];
	$foneCelular		= $_POST["foneCelular"];
	$foneResidencial	= $_POST["foneResidencial"];
	$email				= $_POST["email"];
	$nascimento			= $_POST["nascimento"];
	$cpf				= $_POST["cpf"];
	$rg					= $_POST["rg"];
	$endereco			= $_POST["endereco"];
	$bairo				= $_POST["bairro"];
	$cidade				= $_POST["cidade"];
	$uf					= $_POST["uf"];
	$cep				= $_POST["cep"];
	$jaCliente			= $_POST["jaCliente"];
	
	$bloqueio=0;
	if ( isset($_POST["bloqueio"]))		
		$bloqueio = (int)$_POST["bloqueio"];
	
	$motivoBloqueio		= $_POST["motivoBloqueio"];
	
	include "conexao.php";
	
		
	$sql="UPDATE clientes SET 
	ativo='$ativo'	     		,
	nome='$nome'				,
	ddd='$ddd',
	foneCelular='$foneCelular'		,
	foneResidencial='$foneResidencial'	,
	email='$email'			,
	nascimento='$nascimento'		,	
	cpf='$cpf'				,
	rg='$rg'				,	
	endereco='$endereco'			,
	bairro='$bairo'			,	
	cidade='$cidade'			,	
	uf='$uf'				,	
	cep='$cep'				,	
	jaCliente='$jaCliente'	,
	bloqueio='$bloqueio',
	motivoBloqueio='$motivoBloqueio'";
	
	$sql = $sql . " WHERE codigo=$codigo ";
				
	
	mysqli_query ( $conexao , $sql) or 
	   die("Erro na atualização de dados do Cliente
	   $nome: " . mysqli_error($conexao));
	  
	echo "Cliente <b>$nome</b> atualizado com sucesso!";
	echo "<hr>";	
?>
Clique <a href='listagemClientes.php'>aqui</a> para 
continuar

	</body>
</html>