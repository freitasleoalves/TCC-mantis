function setCodigo(codigo, tipo) {
    var dados = {};

    switch (tipo) {
        case 1:
            dados["codProduto"] = codigo;
            break;
        case 2:
            dados["codPedido"] = codigo;
            break;
    }
    $.ajax({
        type: "POST",
        url: '../pizzamantis/ajax/manipularCodigo.php',
        data: dados
    });

}
