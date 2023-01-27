<?php
	// Criar variáveis
	$notafiscal  	= (int) $_POST["notafiscal"];
	$codcliente	    = (int) $_POST["codcliente"];
	$dataentrada	= $_POST["dataentrada"];
	$datasaida	    = $_POST["datasaida"];
	$codprod     	= $_POST["codprod"];
	$valor       	= (float) $_POST["valor"];
	$tipopag        = (int) $_POST["tipopag"];
	$modopag        = $_POST["modopag"];
	$observacao	    = $_POST["observacao"];
	
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
	echo "Nota Fiscal: $notafiscal<br>";
	echo "Codigo Cliente: $codcliente<br>";
	echo "Data de Entrada: $dataentrada<br>";
	echo "Data de Saida: $datasaida<br>";
	echo "Codigo do Produto: $codprod<br>";
	echo "Valor: $valor<br>";
	echo "Tipo de Pagamento: $tipopag<br>";
	echo "Modo de Pagamento: $modopag<br>";
	echo "Observações: $observacao<br>";
	
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
	$comandoSQL = "INSERT INTO caixa
	(notafiscal, codcliente, dataentrada, datasaida, codprod, valor, tipopag, modopag, observacao)
	VALUES
	('$notafiscal', '$codcliente', '$dataentrada', '$datasaida', '$codprod', '$valor', '$tipopag', '$modopag', 'observacao')";
	
	echo $comandoSQL; //exibindo a variavel na tela
	
	
	//8 - Executar o comando no banco
	mysqli_query($con, $comandoSQL) or
		die ("Erro na iserção do registro no caixa" . mysqli_error ($con));
		
	echo "Caixa <b>$nome</b> inserido com sucesso!";
	
?>