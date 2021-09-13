<?php

session_start();
$_SESSION['aux'] = 0;
		
include('helpers/conexao.php');
	
	$login = preg_replace('/[^[:alnum:]_]/', '',base64_decode($_POST['login']));
	$senha = preg_replace('/[^[:alnum:]_]/', '',base64_decode($_POST['senha']));

	$busca = "SELECT * FROM usuario WHERE usuario = '$login' AND senha = '$senha' ";

	$resultado = pg_query($conexao, $busca);

	if(pg_num_rows($resultado) > 0) {

		$_SESSION['login'] = $login;
		$_SESSION['senha'] = $senha;
		$_SESSION['aux'] = 1;
				
		echo "r={'msg':'true'}";
		
	} else {

		echo "r={'msg':'false'}";

	}

?>
