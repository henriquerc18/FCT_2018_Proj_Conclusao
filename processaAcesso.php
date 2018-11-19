<?php
	
	namespace processaAcesso{
		include 'global.php';
		include 'mysql.php';
		
		use Mysql as Mysql;
		
		class ProcessaAcesso {
			
			var $db;
			
			public function __construct(){
				$conexao = new Mysql\mysql(DB_SERVER, DB_NAME, DB_USERNAME, DB_PASSWORD);
				$this->db = $conexao;
			}
			
			public function verificaAcesso($login, $senha){
				$select = $this->db->select('tb_usuario', '*', " where nome = '$nome' and usuario = '$login' and senha = '$senha' and acesso_idAcesso = $'tipo_usuario' and tb_grupo_idGrupo = '$grupo'");
				return $select;
			}
			
			public function cadastraUsuario($dados){
				$insert = $this->db->insert('tb_usuario', $dados);
				return $insert;
			}
		}
	}
?>
