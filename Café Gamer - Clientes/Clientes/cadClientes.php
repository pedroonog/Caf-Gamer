
<?php

	$ativo=1;
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
	$bairro				= $_POST["bairro"];
	$cidade				= $_POST["cidade"];
	$uf					= $_POST["uf"];
	$cep				= $_POST["cep"];
	
	$jaCliente=0
	if ( isset($_POST["jaCliente"]))
		$jaCliente = (int)$_POST
	
	$bloqueio=0;	
	if ( isset($_POST["bloqueio"]))		
		$bloqueio = (int)$_POST["bloqueio"];
	
	$motivoBloqueio		= $_POST["motivoBloqueio"];
	
	if ( strlen($nome) <2 )
		die("Informe nome com no mínimo 2 caracteres.");
	
	if ( $cpf =="")
		die("CPF deve ser informado");
	
	if ( $cep =="")
		die("CEP deve ser informado");
	
	echo "<h2>Dados Recebidos</h2>";
	echo "Ativo: $ativo <br>";
	echo "Nome: $nome <br>";
	echo "DDD: $ddd <br>";
	echo "Telefone Celular: $foneCelular <br>";
	echo "Telefone Fixo: $foneResidencial <br>";
	echo "E-mail: $email <br>";
	echo "Data de Nascimento: $nascimento <br>";
	echo "CPF: $cpf <br>";
	echo "RG: $rg <rg>";
	echo "Endereço: $endereco <br>";
	echo "Bairro: $bairro <br>";
	echo "Cidade: $cidade <br>";
	echo "UF: $uf <br>";
	echo "CEP: $cep <br>";
	echo "Já é Cliente: $jaCliente <br>";
	echo "Bloqueio: $bloqueio <br>";
	echo "Motivo do Bloqueio: $motivoBloqueio <br>";
	echo "<hr>";
	
		include "conexao.php";


	$comandoSQL = "INSERT INTO CLIENTES ( ativo, nome, ddd, foneCelular, foneResidencial, email, nascimento,
	cpf, rg, endereco, bairro, cidade, uf, cep, jaCliente, bloqueio,
	motivoBloqueio) VALUES
	('$ativo', '$nome', '$ddd','$foneCelular', '$foneResidencial', '$email', '$nascimento',
	'$cpf', '$rg', '$endereco', '$bairro', '$cidade', '$uf', '$cep', '$jaCliente', '$bloqueio',
	'$motivoBloqueio')";
	
	
	
	mysqli_query($conexao, $comandoSQL) or
		die ("Erro na iserção do registro do Cliente" . mysqli_error ($conexao));
		
	echo "Cliente <b>$nome</b> inserido com sucesso!";
	
	
?>
<html>
	<body>
		<hr>
		Clique <a href='cadClientes.html'>aqui</a> para 
			incluir um novo Cliente.<br>
			
		Clique <a href='listagemClientes.php'>aqui</a> para 
			ir a tabela de Clientes.
	</body>
</html>