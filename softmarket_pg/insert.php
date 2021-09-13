<?php 

ini_set('display_errors',0);
require "helpers/sessao.php";

if(empty($_POST)) {
	echo "<script> alert('ACESSO NÃO PERMITIDO !!'); location.href='produtos';</script>";
}

if(isset($_POST['op']) && $_POST['op'] == 'grava_compra') {

    $codigo = $_POST['codigo_compra'];
    $id = $_POST['id_produto'];
    $qtd = $_POST['quantidade'];
    $valor = $_POST['valor'];
    $valor_si = $_POST['valor_total_exibe'];
    $imposto = $_POST['valor_imposto'];
    $valor_ci = $_POST['total_com_imposto'];

    $gravando = "INSERT INTO vendas (codigo_venda,id_produto, quantidade, valor_unitario, total_sem_imposto, valor_impostos, total_com_imposto, data_venda) 
                 VALUES ('$codigo','$id', '$qtd', $valor, $valor_si, $imposto, $valor_ci, now())";
                 var_dump($gravando);
    $resultado = pg_query($conexao, $gravando);
    
    exit();

}

if($_POST['tipo_insert'] == 'add_produto') {

    if(!empty($_POST['tipo_produto'])) {
        $tipo_produto = $_POST['tipo_produto'];
    }

    if(!empty(trim($_POST['nome']))) {
        $nome = $_POST['nome'];
    }

    if(!empty(trim($_POST['descricao']))) {
        $descricao = $_POST['descricao'];
    }

    if(!empty(trim($_POST['preco']))) {
        $preco = str_replace(',','.',$_POST['preco']);
    }

    $sql_produtos = "SELECT * FROM produtos";
    $result = pg_query($conexao, $sql_produtos);

    foreach($result as $value) {
        if(strtolower($value['nome']) == strtolower($nome)) {
            echo "<script> alert('PRODUTO JÁ CADASTRADO !!'); 
            location.href='op_produto?op=add_produto';</script>";
            exit();
        }
    }
   
    $gravando = "INSERT INTO produtos (id_tipo_produto,nome, descricao, preco) VALUES ('$tipo_produto','$nome', '$descricao', $preco)";
    $resultado = pg_query($conexao, $gravando);

    if($resultado) {
        echo "<script> alert('CADASTRO CONCLUÍDO !!'); location.href='produtos';</script>";
    } else {
        echo "<script> alert('ERRO INESPERADO! TENTE NOVAMENTE'); location.href='op_produto?op=add_produto';</script>";
    }

} else if($_POST['tipo_insert'] == 'add_tipo') {

    if(!empty(trim($_POST['nome']))) {
        $nome = $_POST['nome'];
    }

    if(!empty(trim($_POST['imposto']))) {
        $imposto = $_POST['imposto'];
    }

    $sql_tipos = "SELECT * FROM tipos_produto";
    $result = pg_query($conexao, $sql_tipos);

    foreach($result as $value) {
        if(strtolower($value['nome']) == strtolower($nome)) {
            echo "<script> alert('TIPO DE PRODUTO JÁ CADASTRADO !!'); 
            location.href='op_tipo?op=add_tipo';</script>";
            exit();
        }
    }
   
    $gravando = "INSERT INTO tipos_produto (nome, imposto) VALUES ('$nome', $imposto)";
    $resultado = pg_query($conexao, $gravando);

    if($resultado) {
        echo "<script> alert('CADASTRO CONCLUÍDO !!'); location.href='tipos';</script>";
    } else {
        echo "<script> alert('ERRO INESPERADO! TENTE NOVAMENTE'); location.href='op_tipo?op=add_tipo';</script>";
    }

}

?>