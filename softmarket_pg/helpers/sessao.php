<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>

		<?php
		
		require "helpers/conexao.php";
		
		session_start();
		
		$login = $_SESSION['login'];
		$senha = $_SESSION['senha'];
		$aux = $_SESSION['aux'];

		if($login == '') {
			header('Location: helpers/sair');	
		} else if($senha == '') {
			header('Location: helpers/sair');	
		}
				
		?>

	</body>
</html>