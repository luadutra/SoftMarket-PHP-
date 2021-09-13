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
				<div class="row">
					<div class="col-sm-2 text-center">
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
                        <h4 class="item-menu-produtos pl-4 pointer" onClick="window.location='add_tipo';"><i class="fas fa-chevron-right"></i> Cadastrar Tipos</h4>
                        <h4 class="item-menu-produtos pl-4 pt-2 pointer" onClick="window.location='tipos';"><i class="fas fa-chevron-right"></i> Listar Tipos</h4>
                     </div>
						</div>
						<div class="mt-4">					
							<h4 class="btn-home" title="Voltar para a Home" onClick="window.location='menu';"><i class="fas fa-home"></i></h4>
						</div>
					</div>
               <?php if($_GET['op'] == 'add_produto') { ?>
                  <div class="col-sm-10 px-4 pl-5">
                     <i title="Sair do Sistema" class="fas fa-times btn-close pointer" onClick="window.location='helpers/sair';"></i>
                     <h3 class="text-center">Cadastro de Produto</h3>
                     <div class="border-gray mt-4 px-5">
                        <form action="insert.php" method="POST">
                           <input type="hidden" name="tipo_insert" value="add_produto">
                           <div class="form-group mt-4">
                              <label>Selecione o Tipo de Produto</label>
                              <select class="form-control" required name="tipo_produto">
                                 <option value="">Selecione</option>
                                 <?php while($item = pg_fetch_assoc($arr_tipos_nome)) { ?>
                                    <option value="<?=$item['id']?>"><?=$item['nome']?></option>
                                 <?php } ?>
                              </select>
                           </div>
                           <div class="form-group">
                              <label>Nome do Produto</label>
                              <input type="text" name="nome" required class="form-control" id="nome" placeholder="Informe o Nome do Produto">
                           </div>
                           <div class="form-group">
                              <label>Descrição do Produto</label>
                              <textarea placeholder="Informe a Descrição do Produto" required class="form-control" name="descricao" rows="3"></textarea>
                           </div>
                           <div class="form-group">
                              <label>Preço do Produto</label>
                              <input type="text" mascara="moeda" class="form-control" name="preco" required placeholder="Informe o Preço do Produto">
                           </div>
                           <div class="text-center py-4">
                              <button type="submit" class="btn btn-primary w-25 bg-orange bold">SALVAR</button>
                           </div>
                        </form>	
                     </div>
                  </div>
               <?php } else if($_GET['op'] == 'editar_produto') { ?>
                  <?php 
                     $id = $_GET['id']; 
                     $produto = "SELECT * FROM produtos WHERE id = '$id'";
                     $resultado = pg_query($conexao, $produto); 
                     $id_produto = pg_fetch_assoc($resultado);
                  ?>
                  <div class="col-sm-10 px-4 pl-5">
                     <i title="Sair do Sistema" class="fas fa-times btn-close pointer" onClick="window.location='helpers/sair';"></i>
                     <h3 class="text-center">Cadastro de Produto</h3>
                     <div class="border-gray mt-4 px-5">
                        <form action="update.php" method="POST">
                           <input type="hidden" name="tipo_insert" value="editar_produto">
                           <input type="hidden" name="id_produto" value="<?=$id_produto['id']?>">
                           <div class="form-group mt-4">
                              <label>Selecione o Tipo de Produto</label>
                              <select class="form-control" required name="tipo_produto">
                                 <option value="">Selecione</option>
                                 <?php while($item = pg_fetch_assoc($arr_tipos_nome)) { var_dump($item); ?>
                                    <option <?php echo ($id_produto['id_tipo_produto'] == $item['id']) ? 'selected' : ''; ?> value="<?=$item['id']?>"><?=$item['nome']?></option>
                                 <?php } ?>
                              </select>
                           </div>
                           <div class="form-group">
                              <label>Nome do Produto</label>
                              <input type="text" name="nome" required class="form-control" value="<?=$id_produto['nome']?>" id="nome" placeholder="Informe o Nome do Produto">
                           </div>
                           <div class="form-group">
                              <label>Descrição do Produto</label>
                              <textarea placeholder="Informe a Descrição do Produto" required class="form-control" name="descricao" rows="3"><?=$id_produto['descricao']?></textarea>
                           </div>
                           <div class="form-group">
                              <label>Preço do Produto</label>
                              <input type="text" mascara="moeda" class="form-control" value="<?=$id_produto['preco']?>" name="preco" required placeholder="Informe o Preço do Produto">
                           </div>
                           <div class="text-center py-4">
                              <button type="submit" class="btn btn-primary w-25 bg-orange bold">SALVAR</button>
                           </div>
                        </form>	
                     </div>
                  </div>
               <?php } ?>				
            </div>
			</div>	
		</body>
	</html>
<?php } ?>