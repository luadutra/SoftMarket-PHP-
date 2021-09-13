<?php require "helpers/sessao.php";

date_default_timezone_set('America/Sao_Paulo');

if($_SESSION['aux'] != 1) {
	
	echo "<script> alert('VOCÊ NÃO TEM PERMISSÃO PARA ACESSAR ESTA PÁGINA !!'); location.href='helpers/sair';</script>";

} else { ?>

	<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
			<link rel="stylesheet" type="text/css" href="css/style.css" />
			<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
			<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		</head>

		<body class="bg-gradiente">

			<div class="px-5">
				<div class="row text-center">
					<div class="col-sm-2">
						<img src="img/logo.png" alt="" class="w-75">
						<h2 class="text-logo">SOFTMARKET</h2>
						<div class="pb-5">
							<h4><?php echo date('d/m/Y') ?></h4>
							<h4><?php echo date('H:i:s') ?></h4>
						</div>
						<div class="mt-4">					
							<i class="fas fa-cash-register text-center btn-opcoes" onClick="window.location='caixa';"></i>
							<h4>Registrar Compra</h4>
						</div>
						<div class="pt-4">					
							<i class="fas fa-boxes text-center btn-opcoes" onClick="window.location='produtos';"></i>
							<h4>Produtos</h4>
						</div>
					</div>
					<div class="col-sm-10 text-center">
						<i title="Sair do Sistema" class="fas fa-times btn-close pointer" onClick="window.location='helpers/sair';"></i>
					</div>
				</div>
			</div>	
		</body>
	</html>

<?php } ?>