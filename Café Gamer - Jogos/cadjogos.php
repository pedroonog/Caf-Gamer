<?php
	// Criar variáveis
	$codigo  		= (int) $_POST["codigo"];
	$nome			= $_POST["nome"];
	$plataforma	    = $_POST["plataforma"];
	$ativo			= $_POST["ativo"];
	$datalancamento	= $_POST["datalancamento"];
	$faixaetaria	= $_POST["faixaetaria"];
	$descricao      = $_POST["descricao"];
	
	$foto			= $_FILES["foto"]["name"];
	$tamanho		= $_FILES["foto"]["size"];
	$tipoArquivo	= $_FILES["foto"]["type"];
	$nomeTemporario	= $_FILES["foto"]["tmp_name"];
	
	/* validar dados
	if ( strlen($nome) <2 )
		die("Informe nome com no mínimo 2 caracteres.");
	
	if (  ($sexo <> "M") and ($sexo <> "F")  )
		die("Sexo informado incorretamente.");
	
	if ( $tipo == "")
		die("Tipo deve ser informado");

	if ($peso <= 0)
		die("Peso deve ser informado.");

	if (  ($vacinado <> 0) and ($vacinado <> 1)  )
		die("Vacinado informado incorretamente.");
	
	if ($foto=="")
		die("Foto do Pet é obrigatória.");
	*/
	
	//3 - exibir dados
	echo "<h2>Dados Recebidos</h2>";
	echo "Codigo: $codigo<br>";
	echo "Nome: $nome<br>";
	echo "Plataforma: $plataforma<br>";
	echo "Ativo: $ativo<br>";
	echo "Data de Lançamento: $datalancamento<br>";
	echo "Faixa Etária: $faixaetaria<br>";
	echo "Foto: $foto<br>";
	echo "Descrição: $descricao<br>";

	echo "tamanho: $tamanho<br>";
	echo "tipoArquivo: $tipoArquivo<br>";
	echo "nomeTemporario: $nomeTemporario<br>";
	echo "<hr>";
	
	//4 - Tranferir o arquivo (fotoProd) do temporario para a pasta fotos

	if (($foto <> "") and ($tamanho>0))
	{
		$destino="fotos/$foto";
		
		if (move_uploaded_file ($nomeTemporario, $destino))
			echo "Sucesso no recebimento da <b>$foto</b><b>";
		else 
			die ("Erro no recebimento do arquivo:" . $_FILES["foto"]["error"]);
	}
	
	
	//5 - Conectar no SGBD MySQL - mysqli_connect( "endereço do banco" , "usuario", "senha")
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
		die ("Erro na seleção do banco : " . mysqli_error($con));
	echo "banco <b>cafegamer</br> aberto.<br>";
	
	//7 - Criar a varial com o comando de inserção
	$comandoSQL = "INSERT INTO jogos
	(codigo, nome, plataforma, ativo, datalancamento, faixaetaria, foto, descricao)
	VALUES
	('$codigo', '$nome', '$plataforma', '$ativo', '$datalancamento', '$faixaetaria', '$foto', '$descricao')";
	
	echo $comandoSQL; //exibindo a variavel na tela
	
	
	//8 - Executar o comando no banco
	mysqli_query($con, $comandoSQL) or
		die ("Erro na iserção do registro de jogos" . mysqli_error ($con));
		
	echo "Jogos <b>$nome</b> inserido com sucesso!";
	
?>
