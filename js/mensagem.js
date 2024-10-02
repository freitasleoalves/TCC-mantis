function callMensagem(mensagem, titulo) {
    $.magnificPopup.open({items: {
            src: "<div class='white-popup msg-box'>" +
                    "<div class='msg-titulo'>" + titulo + "</div>" +
                    "<div class='msg-mensagem'>" + mensagem + "</div>" +
                    "</div>",
            type: 'inline',
            closeOnBgClick: true
        }
    });
}
