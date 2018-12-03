<?php
	
	namespace Mysql{
		include 'global.php';
		
		define('DB_SERVER', 'localhost');
		define('DB_NAME', 'sefa');
		define('DB_USERNAME', 'root');
		define('DB_PASSWORD', 'amazingday250193');
		
		class mysql{
			
			var $db, $conn;
			
			private $sql_ins = "";
			private $sql_del = "";
			private $tabela = "";
			
			public function __construct($tabela){
				$this->tabela = $tabela;
				return $this->tabela;
			}
			
			public function __construct($server, $database, $username, $password){
				$this->conn = @mysql_connect($server, $username, $password);
				$this->db = @mysql_select_db($database, $this->conn);
			}
			
			public function select($tabela, $colunas = "*", $where = "1=1"){
				$sql = "SELECT $colunas FROM $tabela $where";
				$result = $this->executar($sql);
				while($row = @mysql_fetch_array($result, MYSQL_ASSOC)){
					$return[] = $row;
				}
				return $return;
			}
			
			/*public function selectUser($tabela, $colunas = "*", $where = "'acesso_idAcesso' = 'acesso_idAcesso'"){
				$sql = "SELECT $colunas FROM $tabela $where";
				$result = $this->executar($sql);
				while($row = @mysql_fetch_array($result, MYSQL_ASSOC)){
					$return[] = $row;
				}
				return $return;
			}*/
			
			public function insert($tabela, $dados){
				foreach($dados as $key => $value){
					$keys[] = $key;
					$insertvalues[] = '\'' . $value . '\'';
				}
				$keys = implode(',', $keys);
				$insertvalues = implode(',', $insertvalues);
				
				$sql = "INSERT INTO $tabela ($keys) VALUES ($insertvalues)";
				
				return $this->executar($sql);
			}
			
			public function excluir($where=null){
				if($where){
					$this->sql_sel = "SELECT * FROM";
					$this->tabela = "WHERE $where";
					$this->sql_del = "DELETE FROM ".$this->tabela."WHERE $where";					
				}else{
					$this->sql_sel = "SELECT * FROM " .$this->tabela;
					$this->sql_del = "DELETE * FROM " .$this->tabela;
				}
				$sel = @mysql_query($this->sql_sel);
				$regs = mysql_num_rows($sel);
				
				if($regs > 0){
					if(!$this->del = mysql_query($this->sql_del)){
						die("Erro na exclusão ".'<br>Linha: '.__LINE__. "<br><a href='deletar_Aluno.html'> Voltar ao Menu </a>");
					}else{
						print "Registro excluído com sucesso!<br><a href='deletar_Aluno.html'> Voltar ao Menu </a>");
					}
				}else{
					print "Registro não encontrado!<br><a href='deletar_Aluno.html'> Voltar ao Menu </a>"
				}
			}
			
			/*public function deletar($tabela, $dados){
				foreach($dados as $key => $value){
					$keys[] = $key;
					$deletevalues[] = '\'' . $value . '\'';
				}
				$keys = implode(',', $keys);
				$deletevalues = implode(',', $deletevalues);
				
				$sql = "DELETE FROM $tabela WHERE idUsuario = $deletevalues";
				
				return $this->executar($sql);
			}*/
			
			public function atualizaSenha($tabela, $dados){
				foreach($dados as $key => $value){
					$keys[] = $key;
					$updatevalues[] = '\'' . $value . '\'';
				}
				$keys = implode(',', $keys);
				$updatevalues = implode(',', $updatevalues);
				
				$sql = "UPDATE $tabela SET $keys WHERE idUsuario = $updatevalues";
				
				return $this->executar($sql);
			}
			
			private function executar($sql){
				$return_result = @mysql_query($sql, $this->conn);
				if($return_result){
					return $return_result;
				}else{
					$this->sql_error($sql);
				}
			}
			
			private function sql_error($sql){
				echo @mysql_error($this->conn) . '<br>';
				die('error: ' . $sql);
			}
		}
	}
?>
