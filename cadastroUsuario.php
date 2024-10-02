<form id="frmCadastroUsuario" class="mfp-hide white-popup-block"  action="action/cadastrar.php" method="post">
    <?php include_once 'classes/Pagina.php'; ?>  
    <div class="div-form" style="width:260px">
        <h1>Cadastro de Usuario</h1>
        <fieldset>
            <div class="conteiner">
                <label for="usuario">Usuário:</label>
                <input type="text" tabindex="1" id="username" name="username" placeholder="Exemplo: JBatista"  onkeyup="verificaUsername(true);" onblur="validaUsername();">
                <div id="msgUsername" class="alerta"></div>
            </div>
            <div class="conteiner">
                <label for="senha">Senha:</label>
                <input type="password" tabindex="2" id="senha" name="senha"  placeholder="Min. 6 caracteres (Letras E Números)" onblur="validaSenha();
                        validaRepeticao(this);">
                <div id="msgSenha" class="alerta"></div>
            </div>
            <div class="conteiner">
                <label for="repSenha">Repita a senha:</label>
                <input type="password" tabindex="3" id="repSenha" placeholder="Digite a senha novamente" onblur="validaRepeticao(this);">
                <div id="msgRepSenha" class="alerta"></div>
            </div>
            <div class="conteiner">
                <label for="email">E-mail:</label>
                <input type="text" tabindex="4" id="email" name="email" onkeyup="verificaEmail(false);"  placeholder="Exemplo: JBatista@dominio.com"  onblur="verificaEmail(true);
                        validaRepeticao(this);">
                <div id="msgEmail" class="alerta"></div>
            </div>
            <div class="conteiner">
                <label for="repEmail">Repita o E-mail:</label>
                <input type="text" tabindex="5" id="repEmail" placeholder="Digite o e-mail novamente." onblur="validaRepeticao(this);" >
                <div id="msgRepEmail" class="alerta"></div>
            </div>
            <input type="reset" value="Limpar" class="btn" onclick="$('div.alerta').html('');">
            <a href="#frmCadastroUsuario" class="popup-with-form btn" onclick="validarFormularioUsuario($(this));">Prosseguir</a>
        </fieldset>
    </div>
</form>
