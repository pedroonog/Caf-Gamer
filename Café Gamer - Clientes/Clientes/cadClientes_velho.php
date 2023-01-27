<?php
	// Criar variáveis
	$codigo				= (int)	$_POST["codigo"];
	$ativo				= (int) $_POST["ativo"];
	$nome				= $_POST["nome"];
	$foneCelular		= (int) $_POST["foneCelular"];
	$foneResidencial	= (int) $_POST["foneResidencial"];
	$email				= $_POST["email"];
	$nascimento			= $_POST["nascimento"];
	$cpf				= $_POST["cpf"];
	$rg					= $_POST["rg"];
	$endereco			= $_POST["endereco"];
	$bairo				= $_POST["bairro"];
	$cidade				= $_POST["cidade"];
	$uf					= $_POST["uf"];
	$cep				= $_POST["cep"];
	$ultPedido			= (int)	$_POST["ultPedido"];
	$ultCompra			= $_POST["ultCompra"];
	$bloqueio			= (int) $_POST["bloqueio"];
	$motivo				= $_POST["motivoBloqueio"];
	
	
	
	// exibir dados
	echo "<h2>Dados Recebidos</h2>";
	echo "Código: $codigo <br>";
	echo "Ativo: $ativo <br>";
	echo "Nome: $nome <br>";
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
	echo "Ultimo Pedido: $ultPedido <br>";
	echo "Ultima Compra: $ultCompra <br>";
	echo "Bloqueio: $bloqueio <br>";
	echo "Morivo do Bloqueio: $motivoBloqueio <br>";
	
	$url ="localhost";
	$user="root";
	$password="";
	$database="cafegamer";
	
	echo ("1 - Conectando no MySQL...<br>");
	$con = mysqli_connect( "localhost" , "root", "");
	echo ("MySQL conectado<br>");
	
	echo "2 - Selecionando o banco de dados  <br>cafegamer</br><br>";
	mysqli_select_db($con, "cafegamer") or
		die ("Erro na seleção do banco : " . mysqli_error($con));
	echo "banco <b>cafegamer</br> aberto.<br>";
	
	$comandoSQL = "INSERT INTO clientes (
	codigo, ativo, nome, foneCelular, foneResidencial, email, nascimento, cpf, rg, endereco, 
	bairro, cidade, uf, cep, ultPedido, ultCompra, bloqueio, motivoBloqueio)
	VALUES(
	'$codigo', '$ativo', '$nome', '$foneCelular', '$foneResidencial', '$email', '$nascimento', '$cpf', '$rg', '$endereco',
	'$bairro', '$cidade', '$uf', '$cep', '$ultPedido', '$ultCompra', '$bloqueio', '$motivoBloqueio')";
	
	echo $comandoSQL;
	
	mysqli_query($con, $comandoSQL) or
		die ("Erro na iserção do registro do Cliente" . mysqli_error ($con));
		
	echo "Cliente <b>$nome</b> inserido com sucesso!";			
	
?>