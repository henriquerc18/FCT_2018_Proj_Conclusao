<!-- Nome: Henrique Rosa Carvalho -->
<!-- Data: 11/10/2018 -->



<!DOCTYPE html>
	<html>
		<head>
			<title> Cadastre-se </title>
			<meta charset="UTF-8">
		</head>
		<body>
		
			<?php
				include 'global.php';
			?>
			
			<div> Cadastro de usuário </div>
			<form action="controle.php" method="post">
				<label> Login </label><input type="text" name="login" value=""/><br>
				<label> Senha </label><input type="password" name="senha" value=""/><br>
				<label> Tipo de usuário </label>
				<select name="tipo_usuario">
					<option value=""> Selecione </option>
					<option value="1"> Aluno(a) </option>
					<option value="2"> Coordenador </option>
					<option value="3"> Administrador </option>
				</select><br>
				<input type="submit" name="cadastrar" value="cadastrar"/>
				<a href="cadastrar.php"> Sem cadastro? </a>
			</form>
		</body>
	</html>
