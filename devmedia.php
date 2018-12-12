<?php 	
function select($tabela,$campo,$where=NULL,$order=NULL){
	$conn = mysql_connect("localhost","root",""); // editar host, usuario, senha
	mysql_select_db("database",$conn); // editar para o seu banco de dados
	$sql = "SELECT {$campo} FROM {$tabela} {$where} {$order}";
	$query = mysql_query($sql);
	echo $sql_rows = "SELECT {$campo} FROM {$tabela} {$where}";
	$query_rows = mysql_query($sql_rows);
	$num = mysql_num_fields($query_rows);
	for($y = 0; $y < $num; $y++){ 
		$names[$y] = mysql_field_name($query_rows,$y);
	}
	for($k=0;$resultado = mysql_fetch_array($query);$k++){
		for($i = 0; $i < $num; $i++){ 
			$resultados[$k][$names[$i]] = $resultado[$names[$i]];
		}
	}
	mysql_close($conn);
	return $resultados; // retorna um array com os resultados da consulta
}

/**
*	modo de usar
*
*	//$result = select("clientes","*",NULL,"ORDER BY nome ASC"); // se quiser uma consulta apenas com o nome da tabela e os campos e ordenar os resultados
*	
*	//$result = select("clientes","*","WHERE id = '1'",NULL); // se quiser utilizar uma condição na consulta e não ordernar o resultado
*
*	//$result = select("clientes","nome, id, cidade"); // se quiser uma consulta apenas com o nome da tabela e os campos
*
*	for($i=0;$i<count($result);$i++){
*
*		echo $result[$i]['nome']."<br>";
*	
*		echo $result[$i]['id']."<br>";
*	
*		echo $result[$i]['cidade']."<br>";
*
*	}
*/
?>