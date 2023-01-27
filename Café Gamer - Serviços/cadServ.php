<?php
	// Criar vari�veis
	$codServ		= (int) $_POST["codServ"];
	$nomeServ		= $_POST["nomeServ"];
	$tipo			= $_POST["tipo"];
	$estoque		= $_POST["estoque"];
	$preco			= (float) $_POST["preco"];
	$promocao		= $_POST["promocao"];
	$aluguel		= $_POST["aluguel"];
	$obs			= $_POST["obs"];
	
	/* validar dados
	if ( strlen($nome) <2 )
		die("Informe nome com no m�nimo 2 caracteres.");
	
	if (  ($sexo <> "M") and ($sexo <> "F")  )
		die("Sexo informado incorretamente.");
	
	if ( $tipo == "")
		die("Tipo deve ser informado");

	if ($peso <= 0)
		die("Peso deve ser informado.");

	if (  ($vacinado <> 0) and ($vacinado <> 1)  )
		die("Vacinado informado incorretamente.");
	
	if ($foto=="")
		die("Foto do Pet � obrigat�ria.");
	*/
	
	//3 - exibir dados
	echo "<h2>Dados Recebidos</h2>";
	echo "C�digo: $codServ<br>";
	echo "Nome: $nomeServ<br>";
	echo "Tipo de servi�o: $tipo<br>";
	echo "Estoque: $estoque<br>";
	echo "Pre�o: $preco<br>";
	echo "Promo��o: $promocao<br>";
	echo "Alugado? $aluguel<br>";
	echo "Observa��es:<br>";
	echo "$obs<br>";
	
	//5 - Conectar no SGBD MySQL - mysqli_connect( "endere�o do banco" , "usuario", "senha")
	$url ="localhost";
	$user="root";
	$password="";
	$database="cafegamer";
	
	
	echo ("1 - Conectando no MySQL...<br>");
	$con = mysqli_connect( "localhost" , "root", "");
	echo ("MySQL conectado<br>");
	
	//6 - Abrindo o banco cafegamer
	echo "2 - Selecionando o banco de dados  <br>cafegamer</br><br>";
	mysqli_select_db($con, "cafegamer") or
		die ("Erro na sele��o do banco : " . mysqli_error($con));
	echo "banco <b>cafegamer</br> aberto.<br>";
	
	//7 - Criar a varial com o comando de inser��o
	$comandoSQL = "INSERT INTO servicos
	(codServ, nomeServ, tipo, estoque, codForn, preco, promocao, aluguel, obs)
	VALUES
	('$codServ', '$nomeServ', '$tipo', '$estoque', '$codForn', '$preco', '$promocao', '$aluguel', '$obs')";
	
	echo $comandoSQL; //exibindo a variavel na tela
	
	
	//8 - Executar o comando no banco
	mysqli_query($con, $comandoSQL) or
		die ("Erro na iser��o do registro de servi�o" . mysqli_error ($con));
		
	echo "Servi�o <b>$nomeServ</b> inserido com sucesso!";
	
?>