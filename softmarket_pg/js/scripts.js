$(document).ready(function() {

    $('.op-produtos').click(function() {
        if($('.item-sel-produtos').hasClass('none')) {
            $('.item-sel-produtos').removeClass('none');
        } else {
            $('.item-sel-produtos').addClass('none');
        }
    });

    $('.op-tipos').click(function() {
        if($('.item-sel-tipos').hasClass('none')) {
            $('.item-sel-tipos').removeClass('none');
        } else {
            $('.item-sel-tipos').addClass('none');
        }
    });

    $("[mascara=moeda]").on("focus", function () {
        $(this).mask('000.000.000,00', {
            reverse: true
        });
    });

    $("[mascara=imposto]").on("focus", function () {
        $(this).mask('000.00', {
            reverse: true
        });
    });

    $("[mascara=numeros]").on("keyup", function () {
        $(this).val($(this).val().replace(/\D/g, ''));
    });

});

function valida_login() {
    var login = btoa($('#login').val());
    var senha = btoa($('#senha').val());
    $.ajax({
        url: 'processa_login.php',
        type: 'POST',
        data: {'login':login,'senha':senha},
        success(r) {
            eval(r);
            if(r.msg === 'false') {
                alert('Dados Inválidos! Tente Novamente.');
            } else if(r.msg === 'true') {
                window.location = 'menu';
            } else {
                alert('Erro Inesperado! Tente Novamente.');
            }
        }
    })
}

function delete_produto(id) {
    if(window.confirm("Deseja realmente excluir este produto?")) {
        $.ajax({
            url: "delete.php",
            type: "POST",
            data: {'op':'excluir_produto','id':id},
            success(r) {
                if(r.msg === 'false') {
                    alert('ERRO INESPERADO! TENTE NOVAMENTE'); 
                    location.href='op_produto';
                } else {
                    alert('EXCLUSÃO CONCLUÍDA !!'); 
                    location.href='produtos';
                }
            }
        });
    }
}

function delete_tipo(id) {
    if(window.confirm("Deseja realmente excluir este tipo de produto?")) {
        $.ajax({
            url: "delete.php",
            type: "POST",
            data: {'op':'excluir_tipo','id':id},
            success(r) {
                if(r.msg === 'false') {
                    alert('ERRO INESPERADO! TENTE NOVAMENTE'); 
                    location.href='op_tipo';
                } else {
                    alert('EXCLUSÃO CONCLUÍDA !!'); 
                    location.href='tipos';
                }
            }
        });
    }
}

function incluir_caixa() {
    var codigo_venda = $("#codigo_compra").val();
    var quantidade = $("#quantidade_caixa").val();
    var id_produto = $("#id_produto_caixa").val();
    var produto = $('#id_produto_caixa').find(":selected").text();
    var valor = $('#id_produto_caixa').find(':selected').data('valor');
    var valor_total = valor * quantidade.toString().replace(".",",");
    var valor_total_exibe = valor_total.toFixed(2);
    var imposto = $('#id_produto_caixa').find(':selected').data('imposto');
    var valor_imposto = ((valor * quantidade) * (imposto / 100)).toFixed(2);
    var total_com_imposto = ((valor * quantidade) + (valor * quantidade) * (imposto / 100)).toFixed(2);
    $.ajax({
        url: 'insert.php',
        type: 'POST',
        data: {'op':'grava_compra',
               'quantidade':quantidade,
               'id_produto':id_produto,
               'codigo_compra':codigo_venda,
               'valor':valor,
               'valor_total_exibe':valor_total_exibe,
               'valor_imposto':valor_imposto,
               'total_com_imposto':total_com_imposto},
        success() {}
    })
    var html = '<tr>';
    html += '<td class="text-center middle border">'+produto+'</td>';
    html += '<td class="text-center qtd middle border">'+quantidade+'</td>';
    html += '<td class="text-center middle border">'+valor.toString().replace(".",",")+'</td>';
    html += '<td class="text-center vt middle border">'+valor_total_exibe.replace(".",",")+'</td>';
    html += '<td class="text-center vi middle border">'+valor_imposto.replace(".",",")+'</td>';
    html += '<td class="text-center vc middle border">'+total_com_imposto.replace(".",",")+'</td>';
    html += '<tr>';
    $(".tb-caixa .body-caixa").append(html);
    $("#id_produto_caixa").val('');
    $("#quantidade_caixa").val('1');
}

function finalizar_compra() {
    $('.btn-incluir').hide();
    var valor_total = 0;
    var valor_impostos = 0;
    var valor_compra = 0;
    $('.tb-caixa .body-caixa .vt').each(function(){
        valor_total += parseFloat(jQuery(this).text().replace(",","."));
    });  
    $('.tb-caixa .body-caixa .vi').each(function(){
        valor_impostos += parseFloat(jQuery(this).text().replace(",","."));
    });  
    $('.tb-caixa .body-caixa .vc').each(function(){
        valor_compra += parseFloat(jQuery(this).text().replace(",","."));
    });  
    valor_total_exibe = valor_total.toFixed(2);
    valor_impostos_exibe = valor_impostos.toFixed(2);
    valor_compra_exibe = valor_compra.toFixed(2);
    var html = '<tr>';
    html += '<td class="text-center middle border">R$ '+valor_total_exibe.toString().replace(".",",")+'</td>';
    html += '<td class="text-center middle border">R$ '+valor_impostos_exibe.toString().replace(".",",")+'</td>';
    html += '<td class="text-center middle border">R$ '+valor_compra_exibe.toString().replace(".",",")+'</td>';
    html += '<tr>';
    $(".tb-final .body-final").append(html);
    $(".tb-final").show();
}