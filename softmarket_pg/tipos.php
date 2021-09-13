<?php 

date_default_timezone_set('America/Sao_Paulo');
require "helpers/sessao.php";
require "querys.php";

if($_SESSION['aux'] != 1) {
	
	echo "<script> alert('VOCÊ NÃO TEM PERMISSÃO PARA ACESSAR ESTA PÁGINA !!'); location.href='helpers/sair';</script>";

} else { ?>

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
                  <img src="img/logo.png" onClick="window.location='menu';" alt="" class="w-75 pointer">
						<h2 class="text-logo pointer">SOFTMARKET</h2>
						<div class="pb-5">
							<h4><?php echo date('d/m/Y') ?></h4>
							<h4><?php echo date('H:i:s') ?></h4>
						</div>
						<div class="mt-4 pb-3">					
							<h4 class="btn-item-produto op-produtos">Produtos <i class="fas fa-chevron-down arrow-down"></i></h4>
                     <div class="item-sel-produtos none pt-3 text-left">
                        <h4 class="item-menu-produtos pl-4 pointer" onClick="window.location='op_produto?op=add_produto';"><i class="fas fa-chevron-right"></i> Cadastrar Produto</h4>
                        <h4 class="item-menu-produtos pl-4 pt-2 pointer" onClick="window.location='produtos';"><i class="fas fa-chevron-right"></i> Listar Produtos</h4>
                     </div>
						</div>
						<div class="mt-4 pb-4">					
							<h4 class="btn-item-produto op-tipos">Tipos <i class="fas fa-chevron-down arrow-down"></i></h4>
                     <div class="item-sel-tipos none pt-3 text-left">
                        <h4 class="item-menu-produtos pl-4 pointer" onClick="window.location='op_tipo?op=add_tipo';"><i class="fas fa-chevron-right"></i> Cadastrar Tipos</h4>
                        <h4 class="item-menu-produtos pl-4 pt-2 pointer" onClick="window.location='tipos';"><i class="fas fa-chevron-right"></i> Listar Tipos</h4>
                     </div>
						</div>
                  <div class="mt-4">					
							<h4 class="btn-home" title="Voltar para a Home" onClick="window.location='menu';"><i class="fas fa-home"></i></h4>
						</div>
					</div>
					<div class="col-sm-10 text-center table-responsive px-4 pl-5">
                  <i title="Sair do Sistema" class="fas fa-times btn-close pointer" onClick="window.location='helpers/sair';"></i>
                  <h3>Lista de Tipos de Produtos
                     <i class="fas fa-plus-circle font-20 color-green pointer ml-2" onClick="window.location='op_tipo?op=add_tipo';" title="Cadastrar Tipo de Produto"></i>
                  </h3>
                  <div class="text-center">
                     <form class="form-inline md-form mr-auto mb-4" action="tipos" method="post">
                        <div class="form-group col-md-12 text-center pt-3 pb-2">
                           <input autofocus autocomplete="off" style="text-align:center" class="form-control mr-sm-6" type="text" name="valor_busca_tipo" placeholder="Buscar na Lista">
                           <button class="btn btn-primary btn-sm" name="buscar_tipo" type="submit"><i class="fas fa-search font-20"></i></button>
                        </div>
                     </form>
                  </div>
                  <table class="table table-striped">
                     <thead>
                        <tr class="table-secondary">
                           <th class="text-center col-sm-2 border" scope="col">Código</th>
                           <th class="text-center col-sm-7 border" scope="col">Tipo de Produto</th>
                           <th class="text-center col-sm-2 border" scope="col">Imposto</th>
                           <th class="text-center col-sm-1 border" scope="col">Opções</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php while($item = pg_fetch_assoc($arr_tipos)) { ?>
                           <tr>
                              <th class="text-center middle border" scope="row"><?=$item['id']?></th>
                              <td class="text-center middle border"><?=$item['nome']?></td>
                              <td class="text-center middle border"><?=str_replace(".",",",$item['imposto'])?> %</td>
                              <td class="text-center middle border">
                                 <i class="fas fa-edit font-20 color-blue pointer" onClick="window.location='op_tipo?op=editar_tipo&id=<?php echo $item['id'];?>';" title="Editar Tipo de Produto"></i>
                                 <i class="fas fa-times-circle font-20 color-red pointer" onClick="delete_tipo('<?=$item['id']?>'); return false;" title="Remover Tipo de Produto"></i>
                              </td>
                           </tr>
                        <?php } ?>
                     </tbody>
                  </table>
					</div>
				</div>
			</div>	
		</body>
	</html>

<?php } ?>