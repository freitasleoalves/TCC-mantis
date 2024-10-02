<?php include_once 'header.php'; ?>
<body>
    <div class="main">
        <div class="content" style="padding-bottom:25px;"><div class="ic"></div>
            <div class="container_12">
                <div class="grid_6">
                    <h2>Onde fica?</h2>
                    <div class="map">
                        <figure class="img_inner">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3624.648066424408!2d-48.0088439!3d-24.704621999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94dad6d0ff26009f%3A0x6c08d92cfb8eede4!2zUnVhIEd1YXLDoSwgMjYy!5e0!3m2!1spt-BR!2sbr!4v1401629737446" width="400" height="300" frameborder="0" style="border:0"></iframe>
                        </figure>
                        <?php
                        include_once 'classes/empresa.php';
                        $Empresa = new Empresa();
                        $Empresa->DefinirInformacoes();
                        ?>
                        <address>
                            <dl>
                                <dt>
                                <p>
                                    <?php print $Empresa->nome; ?><br>
                                    <?php print $Empresa->endereco; ?>,<br>
                                    <?php print $Empresa->cidade; ?>,  <?php print $Empresa->cep; ?>.
                                </p>
                                </dt>
                                <dd><span>Telefone:</span> <?php print $Empresa->telefone; ?></dd>
                                <dd><span>E-mail:</span> <?php print $Empresa->email; ?></dd>
                            </dl>
                        </address>
                        <br>
                    </div>
                </div>
                <div class="grid_5 prefix_1">

                    <form id="form">
                        <div class="div-form" style="margin:45px;margin-left:50px;margin-top:60px;">
                            <h1>Entre em contato</h1>
                            <!-- <div class="success_wrapper">
                                  <div class="success">Mensagem enviada!<br>
                                      <strong>Retornaremos assim que possivel!</strong> 
                                  </div>
                              </div> -->
                            <fieldset>
                                <label class="name">
                                    <input type="text" placeholder="Nome:">
                                    <br class="clear">
                                     <!-- <span class="error error-empty">*Esse não é um nome valido.</span>
                                    <span class="empty error-empty">*Esse campo é obrigatorio.</span>  -->
                                </label>
                                <label class="email">
                                    <input type="text"  placeholder="E-mail:">
                                    <br class="clear">
                                    <!--  <span class="error error-empty">*Esse não é um email valido.</span>
                                    <span class="empty error-empty">*Esse campo é obrigatorio.</span> -->
                                </label>
                                <label class="phone">
                                    <input type="text"  placeholder="Telefone:">
                                    <br class="clear">
                                    <!--  <span class="error error-empty">*Esse não é um telefone valido..</span>
                                    <span class="empty error-empty">*Esse campo é obrigatorio.</span> -->
                                </label>
                                <label class="message">
                                    <textarea  placeholder="Mensagem:"></textarea>
                                    <br class="clear">
                                     <!--  <span class="error">*A mensagem está muito curta.</span>
                                    <span class="empty">*Esse campo é obrigatorio.</span>  -->
                                </label>
                                <div class="clear"></div>
                                <div class="btns"><a data-type="reset" class="btn">Limpar</a><a data-type="submit" class="btn">Enviar</a>
                                    <div class="clear"></div>
                                </div>
                            </fieldset>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'footer.php'; ?>
