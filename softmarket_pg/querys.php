<?php 

if($_SESSION['aux'] != 1) {
	  echo "<script> alert('         VOCÊ NÃO TEM PERMISSÃO PARA ACESSAR ESTA PÁGINA !!'); location.href='helpers/sair';</script>";
}

$busca = "SELECT * FROM tipos_produto ORDER BY nome";
$arr_tipos_nome = executa_query($conexao, $busca); 

if(isset($_POST['buscar_produto'])) {
    $value = $_POST['valor_busca_produto'];
    $busca = "SELECT * FROM produtos WHERE nome ILIKE '%".$value."%' ORDER BY id";
    $arr_produtos = executa_query($conexao, $busca); 
} else {
    $busca = "SELECT * FROM produtos ORDER BY id";
    $arr_produtos = executa_query($conexao, $busca); 
}

$busca = "SELECT p.*, t.* 
          FROM produtos p
          LEFT JOIN tipos_produto t ON t.id = p.id_tipo_produto
          ORDER BY p.nome";
$arr_produtos_nome = executa_query($conexao, $busca); 

if(isset($_POST['buscar_tipo'])) {
    $value = $_POST['valor_busca_tipo'];
    $busca = "SELECT * FROM tipos_produto WHERE nome ILIKE '%".$value."%' ORDER BY id";
    $arr_tipos = executa_query($conexao, $busca); 
} else {
    $busca = "SELECT * FROM tipos_produto ORDER BY id";
    $arr_tipos = executa_query($conexao, $busca); 
}

function executa_query($conexao, $busca) {
    $filter_resultado = pg_query($conexao, $busca);
    return $filter_resultado;
}

?>