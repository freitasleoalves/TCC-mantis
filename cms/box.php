<?php
include_once 'header.php';
include_once '../classes/box.php';
$Box = new Box();
$ds = $Box->ListarBox();
$i = 0;
?>
<style>
    .btnAdd{
        border:none;
        margin-top: 5px;
        font-size: 12pt;
        background: #8FBA44;
        margin-bottom:15px;
        padding:7px 0;
        padding-left:20px;
        padding-right:20px;
        height:35px;
        width:155px;
        color:white;
    }
</style>
<div id="pagina" class="container" > 
    <table class="listing t2 b" cellpadding="0" cellspacing="0" style="width:1225px;">
        <tr>
            <th>Código</th>
            <th>Página</th>
            <th>Descrição</th>
            <th>Titulo</th>
            <th>Conteúdo</th>
            <th>Imagem</th>
            <th>Alterar</th>
        </tr>
        <?php
        for ($i = 0; $i < count($ds); $i++) {
            ?>
            <tr <?php
            if ($i % 2 == 0) {
                print "class='bg'";
            }
            ?>>
                <td><?php print $ds[$i]['codBox']; ?></td> 
                <td><?php print $ds[$i]['pagina']; ?></td> 
                <td><?php print $ds[$i]['descricao']; ?></td> 
                <td><?php print $ds[$i]['titulo']; ?></td> 
                <td><?php print substr(strip_tags(html_entity_decode($ds[$i]['conteudo'], ENT_QUOTES, "ISO-8859-1"), '<p><b>'), 0, 150); ?></td> 
                <td><?php print $ds[$i]['imagem']; ?></td> 
                <td><a href="#editBox" class="popup-with-form" onClick="popupForm(<?php print $ds[$i]['codBox']; ?>);">Alterar</a>
                </td>
            </tr> 
<?php } ?>  
    </table>

    <form id="editBox" class="mfp-hide white-popup-block" action="../action/alterarBox.php" method="post" >
        <div class="div-form box" style="width:850px;margin-left:-450px;">
            <h1>Alterar Box</h1>
            <fieldset>
                <input id="codBox" name="codBox" type="hidden">
                <label for="titulo">Titulo</label>
                <input id="titulo" name="titulo" type="text" placeholder="Titulo"  style="margin-bottom: 10px;">
                <textarea id="conteudo" name="conteudo" placeholder="Digite o texto"></textarea>
                <input type="submit" value="Enviar" class="btnAdd"  style="margin-top: 10px;">
            </fieldset>
        </div>
    </form>

</div>

<script>
    function popupForm(codigo) {
        $('#conteudo').editable({
            inlineMode: false
        });
        $.post('../ajax/retornarConteudoBox.php', {codBox: codigo}, function(returnedData) {
            var jsontext = eval("(" + returnedData + ")");
            $("#codBox").val(jsontext.codBox);
            $("#titulo").val(jsontext.titulo);
            $("#conteudo").editable("setHTML", jsontext.conteudo, true);
        });
    }
    $(document).ready(function() {
        $('.popup-with-form').magnificPopup({
            type: 'inline',
            preloader: true,
            focus: '#nome'
        });
    });
    $.magnificPopup.instance.close = function() {
        if ($("#titulo").val()) {
            $("#titulo").val("");
            $("#conteudo").editable("setHTML", "", true);
        }
        $.magnificPopup.proto.close.call(this);
    };
    $(function() {
        $('.selector').editable({
            imageUploadParam: 'img',
            imageUploadURL: '../ajax/uploadImagem.php',
            imageParams: {id: "img"},
            imageErrorCallback: function(data) {
                if (data.errorCode === 1) {
                    alert('bad link');
                }
                else if (data.errorCode === 2) {
                    alert('no link');
                }
                else if (data.errorCode === 3) {
                    alert('error');
                }
                else if (data.errorCode === 4) {
                    alert('sem resposta');
                }
                else {
                    alert('rtes');
                }
            }
        });
    });

</script>

<?php include_once 'footer.php'; ?>