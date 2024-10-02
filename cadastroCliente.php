<form id="frmCadastroCliente" class="mfp-hide white-popup-block"  action="cadastroCliente.php" method="post">
    <?php include_once 'classes/Pagina.php'; ?>    
    <div class="div-form">
        <h1>Cadastro de Cliente</h1>
        <fieldset>
            <div class="conteiner">
                <label for="nome">Nome:</label>
                <input type="text" tabindex="1" id="nome" name="nome" placeholder="Digite seu nome" onblur="verificaText(this);">
                <div id="msgNome" class="alerta"></div>
            </div>
            <div class="conteiner">
                <label for="sobrenome">Sobrenome:</label>
                <input type="text" tabindex="2" id="sobrenome" name="sobrenome" placeholder="Digite seu sobrenome" onblur="verificaText(this);">
                <div id="msgSobrenome" class="alerta"></div>
            </div>

            <fieldset id="groupSexo" >
                <legend>Sexo:</legend>
                <input type="radio" tabindex="4" id="M" name="sexo" value="M" checked="checked"><label for="M">Masculino</label>
                <input type="radio" tabindex="5" id="F" name="sexo" value="F"><label for="F">Feminino</label>
            </fieldset>

            <fieldset id="groupEndereco">
                <legend>Endereço:</legend>
                <div class="conteiner">
                    <label for="rua">Rua:</label>
                    <input type="text" tabindex="6" id="rua" name="rua" onblur="verificaText(this);"  placeholder="Digite o nome da rua">
                    <div id="msgRua" class="alerta"></div>
                </div>
                <div class="conteiner">
                    <label for="numero">Número:</label>
                    <input type="text" tabindex="7" id="numero" name="numero" onblur="verificaNum(this);"  placeholder="Digite o número de sua residência">
                    <div id="msgNumero" class="alerta"></div>
                </div>
                <div class="conteiner">
                    <label for="complemento">Complemento:</label>
                    <input type="text" tabindex="8" id="complemento" name="complemento" placeholder="Digite o complemento (se existir)" >
                </div>
                <div class="conteiner">
                    <label for="bairro">Bairro:</label>
                    <input type="text" tabindex="9" id="bairro" name="bairro" onblur="verificaText(this);" placeholder="Digite o nome do bairro" >
                    <div id="msgBairro" class="alerta"></div>
                </div>
                <div class="conteiner">
                    <label for="cidade">Cidade:</label>
                    <input type="text" tabindex="10" id="cidade" name="cidade" onblur="verificaText(this);" placeholder="Digite o nome da cidade" >
                    <div id="msgCidade" class="alerta"></div>
                </div>
            </fieldset>

            <fieldset id="groupContato">
                <legend>Contato:</legend>
                <div class="conteiner">
                    <label for="telefone">Telefone:</label>
                    <input type="text" tabindex="11" id="telefone" name="telefone" placeholder="(00) 0000-0000" onblur="verificaText(this);" >
                    <div id="msgTelefone" class="alerta"></div>
                </div>
            </fieldset>
            <script>
                $('#telefone').focusout(function() {
                    var phone, element;
                    element = $(this);
                    element.unmask();
                    phone = element.val().replace(/\D/g, '');
                    if (phone.length > 10) {
                        element.mask("(99) 99999-999?9");
                    } else {
                        element.mask("(99) 9999-9999?9");
                    }
                }).trigger('focusout');
                          </script>
            <div class="conteiner">
                <input type="reset" value="Limpar" class="btn" onclick="$('div.alerta').html('');">
                <input type="button" value="Enviar" class="btn" onclick="validarFormularioCliente();">
            </div>
        </fieldset>
    </div>
</form>

