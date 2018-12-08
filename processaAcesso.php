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
				$select = $this->db->select('sefa.tb_usuario', '*', " where usuario = '$login' and senha = '$senha'");
				return $select;
			}
			
			public function verificaUsuario($tipo_usuario){
				$select = $this->db->selectUser('sefa.tb_usuario', '*', " where acesso_idAcesso = '$tipo_usuario'");
				return $select;
			}
			
			/*public function verificaSenha($login, $senha, $novaSenha){
				$select = $this->db->selectUser('sefa.tb_usuario', '*', " where usuario = '$usuario' and senha = '$senha' and senha = '$novaSenha'");
				return $select;
			}*/
			
			public function cadastraUsuario($dados){
				$insert = $this->db->insert('tb_usuario', $dados);
				return $insert;
			}
			
			public function deletaUsuario($dados){
				echo "Tentando deletar";
				$delete = $this->db->deletar('tb_usuario', $dados);
				return $delete;
			}
			
			/*public function updateUsuario($dados){
				$update = $this->db->atualizaSenha('tb_usuario', $dados);
				return $update;
			}*/
		}
	}
?>
