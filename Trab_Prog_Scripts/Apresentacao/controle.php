<?php
	
	namespace controle{
		include 'global.php';
		include 'processaAcesso.php';
		
		$controle = new \processaAcesso\ProcessaAcesso;
		if(@$_POST['enviar']){
			$login = $_POST['login'];
			$senha = md5($_POST['senha']);
			$usuario = $controle->verificaAcesso($login, $senha);
			echo $login;
			echo $senha;
			if($usuario[0]['acesso_idAcesso'] == 1){
				header("Location: pagina1.html");
			}else if($usuario[0]['acesso_idAcesso'] == 2){
				header("Location: pagina2.html");
			}else if($usuario[0]['acesso_idAcesso'] == 3){
				header("Location: admin.html");
			}else{				
				header("Location: pagina3.html");
			}
		}else if($_POST['cadastrar']){
			$nome = $_POST['nome'];
			$login = $_POST['login'];
			$senha = md5($_POST['senha']);
			$tipo_usuario = 1;
			$grupo = $_POST['selecionar_grupo'];
			$arr = array('nome' => $nome, 'usuario' => $login, 'senha' => $senha, 'acesso_idAcesso' => $tipo_usuario, 'tb_grupo_idGrupo' => $grupo);
			if(!$controle->cadastraUsuario($arr)){
				echo 'Aconteceu algum erro';
			}else{
				$acesso_idAcesso = $controle->verificaAcesso($login, $senha);
				 if($acesso_idAcesso[0]['acesso_idAcesso'] == 1){
					header("Location: pagina1.html");
				}else{
					echo 'Erro ao cadastrar aluno!';
				}
			}
		}else if($_POST['cadUsuario']){
			$nome = $_POST['nome'];
			$login = $_POST['login'];
			$senha = md5($_POST['senha']);
			$tipo_usuario = $_POST['tipo_usuario'];
			$grupo = $_POST['selecionar_grupo'];
			$arr = array('nome' => $nome, 'usuario' => $login, 'senha' => $senha, 'acesso_idAcesso' => $tipo_usuario, 'tb_grupo_idGrupo' => $grupo);
			if(!$controle->cadastraUsuario($arr)){
				echo 'Aconteceu algum erro';
			}else{
				$acesso_idAcesso = $controle->verificaAcesso($login, $senha);
				if($acesso_idAcesso[0]['acesso_idAcesso'] == 1){
					header("Location: pagina1.html");
				}else if($acesso_idAcesso[0]['acesso_idAcesso'] == 2){
					header("Location: pagina2.html");
				}else if($acesso_idAcesso[0]['acesso_idAcesso'] == 3){
					header("Location: admin.html");
				}
			}
		}
	}
?>