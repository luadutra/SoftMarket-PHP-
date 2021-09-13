<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<script type="text/javascript" src="js/scripts.js"></script>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	</head>
	<body style="background: #FFFFFF url('img/fundo.jpg') no-repeat center;">
		<div>
			<div class="pt-5 container">
				<div class="text-center">
					<hr>
					<div class="alert alert-info pt-5" role="alert"> 
						<h4 class="font-30">BEM VINDO AO SOFTMARKET</h4> 
					</div>
				</div>
			</div>
			<div class="caixa_login">
				<form name="form">
					<hr>
					<div class="form-group">
						<div class="text-center">
							<label class="color-white" for="login_adm"><b>LOGIN</b></label> 
						</div>
						<input autocomplete="off" name="login" id="login" type="login" class="form-control text-center" placeholder="Insira o Login" autofocus required>
					</div>
					<div class="form-group py-3">
						<div class="text-center">
						<label class="color-white" for="password"><b>SENHA</b></label> </div>
						<input autocomplete="off" name="senha" id="senha" type="password" class="form-control text-center" placeholder="Insira sua senha" required>
					</div>
					<div class="text-center">
						<button style="font-size:15px; margin:auto" type="submit" class="btn btn-primary btn-sm" onclick="valida_login(); return false;" name="botao">ACESSAR</button>
						<hr>
					</div>
				</form>
			</div>
		</div>
	</body>
	<div class="text-center color-white">Desenvolvido por Luã Dutra ® 2021</div>
</html>