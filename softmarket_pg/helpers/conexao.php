
<?php

	$host = "localhost port=5432";
	$usuario = "postgres";
	$senha = "12345";
	$bd = "db_softmarket";

	try  {
		$conexao = pg_connect("host=".$host." dbname=".$bd." user=".$usuario." password=".$senha) or die("Falha na Conexão");
	}  catch (Exception $e)  {
		echo "Falha na Conexão: " . $e->getMessage();
	}
		
?>