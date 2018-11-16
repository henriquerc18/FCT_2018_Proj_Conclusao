<!-- Nome: Henrique Rosa Carvalho -->
<!-- Data: 11/10/2018 -->



<!DOCTYPE html>
	<html>
		<head>
			<title> Teste de validação DEVMEDIA </title>
			<meta charset="UTF-8">
		</head>
		<body>
		
			<?php
				include 'global.php';
			?>
		
			<div> Login </div>
			<form action="controle.php" method="post">
				<input type="text" name="login" value=""/>
				<input type="password" name="senha" value=""/>
				<input type="submit" name="enviar" value="Login"/>
				<a href="cadastrar.php"> Sem cadastro? </a>
			</form>
		</body>
	</html>
