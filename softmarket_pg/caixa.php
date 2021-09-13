<?php 

date_default_timezone_set('America/Sao_Paulo');
require "helpers/sessao.php";
require "querys.php";

if($_SESSION['aux'] != 1) {
	
	echo "<script> alert('VOCÊ NÃO TEM PERMISSÃO PARA ACESSAR ESTA PÁGINA !!'); location.href='helpers/sair';</script>";

} else { 

$_SESSION['codigo_venda'] = date('YmdHis');

?>

	<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.11.2/jquery.mask.min.js" integrity="sha512-Y/GIYsd+LaQm6bGysIClyez2HGCIN1yrs94wUrHoRAD5RSURkqqVQEU6mM51O90hqS80ABFTGtiDpSXd2O05nw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
			<script type="text/javascript" src="js/scripts.js"></script>

			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
			<link rel="stylesheet" type="text/css" href="css/style.css" />
   
			<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   			<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>		
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
					<div class="col-sm-10 text-center px-4 pl-5">
						<i title="Sair do Sistema" class="fas fa-times btn-close pointer mb-5" onClick="window.location='helpers/sair';"></i>
						<div class="pt-5">
							<div class="alert alert-secondary mt-5 border" role="alert">
								<span class="bold mr-3">CÓDIGO DA COMPRA: </span><?=$_SESSION['codigo_venda']?>
								<input type="hidden" name="codigo_compra" id="codigo_compra" value="<?=$_SESSION['codigo_venda']?>">
							</div>
						</div>
						<div class="px-4">
							<div class="row">
								<div class="col-6 align-center">
									<div class="form-group">
										<label>Selecione o Produto</label>
										<select class="form-control id_produto_caixa" required name="id_produto_caixa" id="id_produto_caixa">
											<option value="">Selecione</option>
											<?php while($item = pg_fetch_assoc($arr_produtos_nome)) { ?>
												<option data-valor="<?=$item['preco']?>" data-imposto="<?=$item['imposto']?>" value="<?=$item['id']?>"><?=$item['nome']?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-3 align-center">
									<div class="form-group">
										<label>Quantidade</label>
										<input type="number" value='1' min=1 step=1 name="quantidade" mascara="numeros" required class="form-control" id="quantidade_caixa" placeholder="Quantidade">
									</div>
								</div>
								<div class="col-3 align-center">
									<div class="form-group">
										<button type="button" title="Incluir na Compra" class="btn btn-success pd-btn btn-incluir" onclick="incluir_caixa(); return false;">Incluir</button>									
										<button type="button" title="Finalizar Compra" class="btn btn-danger pd-btn" onclick="finalizar_compra(); return false;">Finalizar</button>									
									</div>
								</div>
							</div>
						</div>
						<table class="table table-striped mt-3 tb-caixa">
							<thead>
								<tr class="table-secondary">
									<th class="text-center col-sm-5 border">Produto</th>
									<th class="text-center col-sm-1 border">Qtd</th>
									<th class="text-center col-sm-1 border">Valor Un</th>
									<th class="text-center col-sm-2 border">Total s/ Imposto</th>
									<th class="text-center col-sm-1 border">Impostos</th>
									<th class="text-center col-sm-2 border">Total c/ Impostos</th>
								</tr>
							</thead>
							<tbody class="body-caixa">
							</tbody>
						</table>
						<table class="table table-striped mt-3 tb-final none">
							<thead>
								<tr class="table-secondary">
									<th class="text-center col-sm-4 border">Valor Total</th>
									<th class="text-center col-sm-4 border">Valor Total dos Impostos</th>
									<th class="text-center col-sm-4 border">Valor da Compra</th>
								</tr>
							</thead>
							<tbody class="body-final">
							</tbody>
						</table>
					</div>
				</div>
			</div>	
		</body>
	</html>

<?php } ?>