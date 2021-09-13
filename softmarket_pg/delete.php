<?php require "helpers/sessao.php";

if(empty($_POST)) {
	echo "<script> alert('ACESSO NÃO PERMITIDO !!'); location.href='produtos';</script>";
}

if($_POST['op'] == 'excluir_produto') {
    
    if(!empty($_POST['id'])) {
        $id_produto = $_POST['id'];
    }
  
    $delete = "DELETE FROM produtos WHERE id = '$id_produto'";
    $resultado = pg_query($conexao, $delete);

    if($resultado == false) {
		echo "ret={'msg':'false'}";
    } else {
		echo "ret={'msg':'true'}";
    }

} else if($_POST['op'] == 'excluir_tipo') {

    if(!empty($_POST['id'])) {
        $id_tipo = $_POST['id'];
    }
  
    $delete = "DELETE FROM tipos_produto WHERE id = '$id_tipo'";
    $resultado = pg_query($conexao, $delete);

    if($resultado == false) {
		echo "ret={'msg':'false'}";
    } else {
		echo "ret={'msg':'true'}";
    }

}

?>