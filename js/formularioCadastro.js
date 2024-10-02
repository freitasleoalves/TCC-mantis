function  defineFormUsuario() {
    var f = document.forms["frmCadastroUsuario"];
    var formulario = {
        username: f.username,
        senha: f.senha,
        repSenha: f.repSenha,
        email: f.email,
        repEmail: f.repEmail,
        msgUsername: $('#msgUsername'),
        msgSenha: $('#msgSenha'),
        msgRepSenha: $('#msgRepSenha'),
        msgEmail: $('#msgEmail'),
        msgRepEmail: $('#msgRepEmail')
    };
    return formulario;
}

function validaUsername() {
    var form = defineFormUsuario();
    form.msgUsername.html("");
    if (!form.username.value) {
        form.msgUsername.html("O username não pode ficar em branco");
        return false;
    }
    else if (form.username.value.length < 6) {
        form.msgUsername.html("Username muito curto (min. 6 caracteres)");
        return false;
    }
    else if (!isNaN(form.username.value.substring(0, 1))) {
        form.msgUsername.html("O username não pode começar com numero");
        return false;
    }
    else if (!/^[a-zA-Z0-9](_[^._]|\.[^_.]|[a-zA-Z0-9]){6,18}$/.test(form.username.value)) {
        form.msgUsername.html("Esse não é um padrão válido");
        return false;
    }
    else {
        form.msgUsername.html("");
        return true;
    }
}

function verificaUsername(msg) {
    var form = defineFormUsuario();
    if (validaUsername(form.username)) {
        $.post('../pizzamantis/ajax/checkExistencia.php', {username: form.username.value}, function(response) {
            if (response) {
                if (msg) {
                    form.msgUsername.html("Username já cadastrado :( ");
                }
                else {
                    form.msgUsername.html("");
                }
                return false;
            }
            else {
                if (msg) {
                    form.msgUsername.html("Username disponível :)");
                }
                else {
                    form.msgUsername.html("");
                }
                return true;
            }
        });
    }
    else {
        form.msgUsername.html("");
        return false;
    }
}

function emailEval(email) {
    var emailRegex = /[a-z0-9_-]+(?:\.[a-z0-9_-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
    var matches = email.match(emailRegex);
    if (matches !== null) {
        matches = matches.toString().length;
        if (email.length === matches) {
            return true;
        }
        else {
            return false;
        }
    }
    else {
        return false;
    }
}

function validaRepeticao(rep) {
    var form = defineFormUsuario();
    switch (rep.id) {
        case 'repSenha':
            if (form.senha.value === rep.value) {
                form.msgRepSenha.html("");
                return true;
            }
            else {
                form.msgRepSenha.html("Os campos não conferem");
                return false;
            }
            break;
        case 'repEmail':
            if (form.email.value === rep.value) {
                form.msgRepEmail.html("");
                return true;
            }
            else {
                form.msgRepEmail.html("Os campos não conferem");
                return false;
            }
            break;
        case 'senha' :
            if (/\S/.test(form.repSenha.value)) {
                if (form.repSenha.value === rep.value) {
                    form.msgRepSenha.html("");
                    return true;
                }
                else {
                    form.msgRepSenha.html("Os campos não conferem");
                    return false;
                }
            }
            else {
                form.msgRepSenha.html("");
                return false;
            }
            break;
        case 'email' :
            if (/\S/.test(form.repEmail.value)) {
                if (form.repEmail.value === rep.value) {
                    form.msgRepEmail.html("");
                    return true;
                }
                else {
                    form.msgRepEmail.html("Os campos não conferem");
                    return false;
                }
            }
            else {
                form.msgRepEmail.html("");
                return false;
            }
            break;
    }
}

function verificaEmail(msg) {
    var form = defineFormUsuario();
    if (!/\S/.test(form.email.value)) {
        if (msg) {
            form.msgEmail.html("O e-mail não pode ficar em branco");
        }
        else {
            form.msgEmail.html("");
        }
        return false;
    }
    else if (!emailEval(form.email.value)) {
        if (msg) {
            form.msgEmail.html("Esse não é um e-mail válido");
        }
        else {
            form.msgEmail.html("");
        }
        return false;
    }
    else {
        var post = $.post('../pizzamantis/ajax/checkExistencia.php', {emailUsuario: form.email.value});
        post.done(function(response) {
            if (response) {
                form.msgEmail.html("E-mail já cadastrado :( ");
                return false;
            }
            else {
                form.msgEmail.html("");
                return true;
            }
        });
    }
}

function validaSenha() {
    var form = defineFormUsuario();
    if (/((?=.*[0-9])(?=.*[a-zA-Z])(?=[\S]+$).{6,})/.test(form.senha.value)) {
        form.msgSenha.html("");
        return true;
    }
    else if (!form.senha.value) {
        form.msgSenha.html("A senha não pode ficar em branco!");
        return false;
    }
    else {
        form.msgSenha.html("A senha não obedece aos padrões (min. 6 caracteres, sendo necessarios no minimo uma letra e um número)");
        return false;
    }
}

function  validarFormularioUsuario(link) {
    var form = defineFormUsuario();
    $('div.alerta').html('');
    var a, b, c, d;
    a = validaUsername();
    b = validaSenha();
    c = validaRepeticao(form.repSenha);
    d = validaRepeticao(form.repEmail);

    if (a && b && c && d) {
        if (confirm('Tem certeza que suas informações estão corretas?')) {
            link.attr({href: '#frmCadastroCliente'});
            return true;
        }
        else {
            link.attr({href: '#frmCadastroUsuario'});
            return false;
        }
    }
    else {
        link.attr({href: '#frmCadastroUsuario'});
        return false;
    }
}

$(function() {
    $('input').blur(function() {
        var alerta = $(this).next('div.alerta');
        var valor = alerta.html();
        if (!/\S/.test(valor) && $(this).closest('div').attr('class') === 'conteiner')
        {
            alerta.hide();
        }
        else {
            alerta.show();
        }
    });
});

$(function() {
    $('.alerta').bind("DOMSubtreeModified", function() {
        var valor = $(this).html().trim();
        if (!/\S/.test(valor))
        {
            $(this).hide();
        }
        else {
            $(this).show();
        }
    });
});

$(function() {
    $('input').click(function() {
        if ($(this).closest('div').attr('class') === 'conteiner') {
            $(this).next('div.alerta').html("");
        }
    });
});

function verificaText(campo) {
    if (!/\S/.test(campo.value)) {
        $('#' + campo.id).next('div.alerta').html("Esse campo não pode ficar vazio");
        return false;
    }
    else {
        return true;
    }
}
function verificaNum(campo) {
    if (!/[0-9]/.test(campo.value)) {
        $('#' + campo.id).next('div.alerta').html("Esse campo só suporta números");
        return false;
    }
    else {
        return true;
    }
}

function validarFormularioCliente() {
    var inputs = $("#frmCadastroCliente input:not(#complemento,[type='radio'],[type='reset'],[type='button'])");
    var bool = true;
    $('div.alerta').html('');
    inputs.each(function() {
        if (verificaText(this)) {
            if (this.id === "numero") {
                if (!verificaNum(this)) {
                    bool = false;
                }
            }
        }
        else {
            bool = false;
        }
    });
    if (bool) {
        if (confirm('Tem certeza que suas informações estão corretas?')) {
            submeterForms();
        }
    }
}
function submeterForms() {
    var usuario = $("#frmCadastroUsuario #username,#frmCadastroUsuario #senha,#frmCadastroUsuario #email");
    var cliente = $("#frmCadastroCliente input:not([type='reset'],[type='button'])");
    var dados = {};
    dados["usuario"] = {};
    dados["cliente"] = {};
    usuario.each(function() {
        dados["usuario"][this.name] = this.value;
    });
    cliente.each(function() {
        if (this.name === "sexo") {
            dados["cliente"][this.name] = $("#frmCadastroCliente input[name='sexo']:checked").val();
        }
        else {
            dados["cliente"][this.name] = this.value;
        }
    });
    $.post('../pizzamantis/action/cadastrar.php', dados, function(response) {
        if (response) {
            location.reload();
        }
        else {
            callMensagem("Falha no cadastro ", "Cadastro");
        }
    });

}