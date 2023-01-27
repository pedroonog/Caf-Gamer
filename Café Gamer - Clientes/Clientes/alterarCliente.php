<html> 
	<head>
		<title>Cadastro de Cliente - Alteração</title>
	</head>
	<body>
		<h2>Cadastro de Cliente - Alteração</h2>
		<?php
			
			if ( ! isset($_GET["c"]))
				die("Programa chamado de forma incorreta.");
			
			
			$codigo = $_GET["c"]; 

			
			include "conexao.php";
			
			
			$comandoSQL = "SELECT * FROM clientes 
				WHERE codigo=$codigo";
				
			
			$registro=mysqli_query( $conexao , 
									$comandoSQL) or 
				die("Erro na seleção do 
				cliente: " . mysqli_error($conexao));
			
			
			$linhas = mysqli_num_rows($registro);
			
			if($linhas<1)
				die("Código $codigo não encontrado. 
						Cliente foi excluído?");
			
				$dados = mysqli_fetch_array($registro);
							
				$ativo				 = $dados["ativo"];
				$nome				 = $dados["nome"];
				$ddd				 = $dados["ddd"];
				$foneCelular		 = $dados["foneCelular"];
				$foneResidencial	 = $dados["foneResidencial"];
				$email				 = $dados["email"];
				$nascimento			 = $dados["nascimento"];
				$cpf				 = $dados["cpf"];
				$rg					 = $dados["rg"];
				$endereco			 = $dados["endereco"];
				$bairro				 = $dados["bairro"];
				$cidade				 = $dados["cidade"];
				$uf					 = $dados["uf"];
				$cep				 = $dados["cep"];
				$jaCliente			 = $dados["jaCliente"];
				$bloqueio			 = $dados["bloqueio"];
				$motivoBloqueio		 = $dados["motivoBloqueio"];
		?>
		<form 	action="gravarDadosClientes.php" 
				enctype="multipart/form-data"
				method="post">
				
			<input type="hidden" name="codigo" value="<?php echo $codigo;?>">
			
			Ativo:  <input type="radio" name="ativo" value="S" <?php if ($ativo == 1) echo 'checked';?>>Sim
					<input type="radio" name="ativo" value="N" <?php if ($ativo == 0) echo 'checked';?>>Não
			<br>
			
			Nome: <input 	type="text"
							name="nome"
							maxlength="30" 
							size="30" 
							placeholder="Informe o nome do Cliente"
							value = "<?php echo $nome;?>">
							<br>
			DDD:	<input 	type="text" 
							name="ddd" 
							maxlength="2" 
							size="2"
							OnKeyPress="formatar('##')" 
							value="<?php echo $ddd;?>">
						
			Fone Celular: <input 	type="text" 
									name="foneCelular" 
									maxlength="10" 
									size="10"
									OnKeyPress="formatar('#####-####')" 
									value = "<?php echo $foneCelular;?>">
					 
					
			Fone Residencial:<input 	type="text" 
										name="foneResidencial" 
										maxlength="9" 
										size="9"
										OnKeyPress="formatar('####-####')" 
										value = "<?php echo $foneResidencial;?>"><br>
					 
					
			E-mail: <input 	type="text" 
							name="email" 
							maxlength="50" 
							size="50"
							value = "<?php echo $email;?>"> 
							<br>
						
			Nascimento: <input 	type="date" 
								name="nascimento"
								min="1900-01-01"
								max="2018-01-01"
								value = "<?php echo $nascimento;?>">
								<br>
					
			CPF: <input type="text" 
						name="cpf"
						maxlength="15" 
						size="15"
						OnKeyPress="formatar('###.###.###-##')"
						value = "<?php echo $cpf;?>">
						<br>
					
			RG:  <input type="text" 
						name="rg"
						maxlength="12" 
						size="12" 
						value  = "<?php echo $rg;?>">
						<br>
					
			Endereço: <input 	type="text" 
								name="endereco" 
								maxlength="50" 
								size="50"
								value = "<?php echo $endereco;?>"> 
								<br>
						
			Bairro: <input 	type="text" 
							name="bairro" 
							maxlength="30" 
							size="30"
							value = "<?php echo $bairro;?>"> 	
							<br>
						
			Cidade: <input 	type="text" 
							name="cidade" 
							maxlength="20" 
							size="20"
							value = "<?php echo $cidade;?>"> 	
							<br>
							
			UF: <input 	type="text" 
						name="uf" 
						maxlength="3" 
						size="3"
						value = "<?php echo $uf;?>"> 	
						<br>
			
			CEP: <input 	type="text" 
							name="cep" 
							maxlength="10" 
							size="10"
							OnKeyPress="formatar('#####-###')"
							value = "<?php echo $cep;?>"> 	
							<br>
			
			
			Último Compra: 	<input 	type="radio" name="jaCliente" value="S"<?php if ($jaCliente==1) echo 'checked';?>>Sim
							<input 	type="radio" name="jaCliente" value="S"<?php if ($jaCliente==0) echo 'checked';?>>Não
			<br>
			
			Bloquear Cliente:	 	<input type="radio" name="bloqueio" value="S"<?php if ($bloqueio==1) echo 'checked';?>>Sim
									<input type="radio" name="bloqueio" value="N"<?php if ($bloqueio==0) echo 'checked';?>>Não
			<br>
			
			Motivo do bloqueio: <br>
				<textarea 	name="motivoBloqueio" 
							rows="4" 
							cols="80"
							><?php echo $motivoBloqueio;?></textarea>
				<br>
			    
			<hr>	

			<input type="submit" value="Enviar">
		</form>
	</body>
</html>