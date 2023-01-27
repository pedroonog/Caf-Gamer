<?php	

	$conexao=mysqli_connect("localhost",
					"root",
					"") or
		die("Erro na conexão com o MYSQL.") ;

	mysqli_select_db($conexao , "cafegamer") or
		die("Falha na seleção do banco de dados:" .
			mysqli_error($conexao) );

?>