<?php 

ini_set('display_errors',0);
require "helpers/sessao.php";

if(empty($_POST)) {
	echo "<script> alert('ACESSO NÃO PERMITIDO !!'); location.href='produtos';</script>";
}

if($_POST['tipo_insert'] == 'editar_produto') {

    if(!empty($_POST['id_produto'])) {
        $id_produto = $_POST['id_produto'];
    }

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
            location.href='op_produto?op=editar_produto&id=".$id_produto."';</script>";
            exit();
        }
    }

    $gravando = "UPDATE produtos SET id_tipo_produto = '$tipo_produto', nome = '$nome', descricao = '$descricao', preco = $preco WHERE id = $id_produto";
    $resultado = pg_query($conexao, $gravando);

    if($resultado) {
        echo "<script> alert('EDIÇÃO CONCLUÍDA !!'); location.href='produtos';</script>";
    } else {
        echo "<script> alert('ERRO INESPERADO! TENTE NOVAMENTE'); location.href='op_produto?op=editar_produto&id=".$id_produto."';</script>";
    }

} else if($_POST['tipo_insert'] == 'editar_tipo') {

    if(!empty($_POST['id_tipo'])) {
        $id_tipo = $_POST['id_tipo'];
    }

    if(!empty(trim($_POST['nome']))) {
        $nome = $_POST['nome'];
    }

    if(!empty(trim($_POST['imposto']))) {
        $imposto = $_POST['imposto'];
    }

    $sql_tipos_produto = "SELECT * FROM tipos_produto";
    $result = pg_query($conexao, $sql_tipos_produto);

    foreach($result as $value) {
        if(strtolower($value['nome']) == strtolower($nome)) {
            echo "<script> alert('TIPO DE PRODUTO JÁ CADASTRADO !!'); 
            location.href='op_tipo?op=editar_tipo&id=".$id_tipo."';</script>";
            exit();
        }
    }

    $gravando = "UPDATE tipos_produto SET nome = '$nome', imposto = $imposto WHERE id = $id_tipo";
    $resultado = pg_query($conexao, $gravando);

    if($resultado) {
        echo "<script> alert('EDIÇÃO CONCLUÍDA !!'); location.href='tipos';</script>";
    } else {
        echo "<script> alert('ERRO INESPERADO! TENTE NOVAMENTE'); location.href='op_tipo?op=editar_tipo&id=".$id_tipo."';</script>";
    }

}

?>