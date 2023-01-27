<?php
	// Criar variáveis
	$codForn		= (int) $_POST["codForn"];
	$ativo			= $_POST["ativo"];
	$codProd		= (int) $_POST["codProd"];
	$nomeForn		= $_POST["nomeForn"];
	$razaoSoc		= $_POST["razaoSoc"];
	$endereço		= $_POST["endereço"];
	$bairro			= $_POST["bairro"];
	$cidade 		= $_POST["cidade"];
	$uf 			= $_POST["uf"];
	$cnpj 			= (int) $_POST["cnpj"];
	$telPrin 		= (int) $_POST["telPrin"];
	$telSec 		= (int) $_POST["telSec"];
	$email 			= $_POST["email"];
	$ultEntr 		= $_POST["ultEntr"];
	$proxEntr 		= $_POST["proxEntr"];
	$obs			= $_POST["obs"];
	
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
	echo "Ativo: $ativo<br>";
	echo "Foto: $foto<br>";
	echo "Código do Produto: $codProd<br>";
	echo "Nome do Fornecedor: <b>$nomeForn</b> <br>";
	echo "Razão Social do Fornecedor: <b>$razaoSoc</b> <br>";
	echo "Endereço: $endereço<br>";
	echo "Bairro: $bairro<br>";
	echo "Cidade: $cidade<br>";
	echo "UF: $uf<br>";
	echo "CNPJ:  $cnpj<br>";
	echo "Telefone Principal:  $telPrin<br>";
	echo "Telefone Secundário:  $telSec<br>";
	echo "E-mail: $email<br>";
	echo "Última Entrega: $ultEntr<br>";
	echo "Próxima Entrega: $proxEntr<br>";
	echo "Observações:<br>";
	echo "$obs<br>";

	echo "tamanho: $tamanho<br>";
	echo "tipoArquivo: $tipoArquivo<br>";
	echo "nomeTemporario: $nomeTemporario<br>";
	echo "<hr>";
	
	//4 - Tranferir o arquivo (fotoProd) do temporario para a pasta fotos

	if (($fotoProd <> "") and ($tamanho>0))
	{
		$destino="fotos/$fotoProd";
		
		if (move_uploaded_file ($nomeTemporario, $destino))
			echo "Sucesso no recebimento da <b>$fotoProd</b><b>";
		else 
			die ("Erro no recebimento do arquivo:" . $_FILES["fotoProd"]["error"]);
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
	$comandoSQL = "INSERT INTO fornecedores
	(codForn, ativo, codProd, nomeForn, razaoSoc, endereço, bairro, cidade, uf, cnpj, telPrin, telSec, email, ultEntr, proxEntr, obs, fotoProd)
	VALUES
	('$codForn', '$ativo', '$codProd', '$nomeForn', '$razaoSoc', '$endereço', '$bairro', '$cidade', '$uf', '$cnpj', '$telPrin', '$telSec', '$email', '$ultEntr', '$proxEntr', '$obs', '$fotoProd')";
	
	echo $comandoSQL; //exibindo a variavel na tela
	
	
	//8 - Executar o comando no banco
	mysqli_query($con, $comandoSQL) or
		die ("Erro na iserção do registro do fornecedore" . mysqli_error ($con));
		
	echo "Fornecedor <b>$nomeForn</b> inserido com sucesso!";
	
?>