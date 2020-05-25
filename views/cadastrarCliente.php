<?php
if (isset($_POST) && !empty($_POST)) {
    $dados = $_POST;

    $cliente = new Clientes();
    $resposta = $cliente->cadastrar($dados);
}

?>

<div class="containner">
    <div class="box">
        <form method="post">
            <div class="form-group">

                <?php
                if (isset($_POST) && !empty($_POST)) : ?>
                    <div class="alerta">
                        <div class="alert <?php echo $resposta['codigo'];?> alert-dismissible fade show" role="alert">
                            <?php echo $resposta['resposta']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                <?php endif ?>

                <h4>Dados Pessoais</h4>
                <hr>
                CPF: <br>
                <input type="text" name="cpf" class="form-control form-control-sm"> <br>

                Nome: <br>
                <input type="text" name="nome" class="form-control form-control-sm"> <br>

                <div class="flex">
                    <div class="w33 marge">
                        Data de Nascimento: <br>
                        <input type="text" name="nascimento" class="form-control form-control-sm"> <br>
                    </div>
                    <div class="w33 marge">
                        Sexo: <br>
                        <input type="text" name="sexo" class="form-control form-control-sm"><br>
                    </div>
                    <div class="w33">
                        Estado cívil:<br>
                        <input type="text" name="estadoCivil" class="form-control form-control-sm"><br>
                    </div>
                </div>
                <div class="flex">
                    <div class="w33 marge">
                        RG: <br>
                        <input type="text" name="RG" class="form-control form-control-sm"><br>
                    </div>
                    <div class="w33 marge">
                        Data de emissão: <br>
                        <input type="text" name="emissaoRG" class="form-control form-control-sm"> <br>
                    </div>
                    <div class="w33">
                        Orgão: <br>
                        <input type="text" name="orgaoRG" class="form-control form-control-sm"> <br>
                    </div>
                </div>
                <div class="flex">
                    <div class="w33 marge">
                        Telefone: <br>
                        <input type="text" name="tel" class="form-control form-control-sm"><br>
                    </div>
                    <div class="w33 marge">
                        Celular: <br>
                        <input type="text" name="celular" class="form-control form-control-sm"> <br>
                    </div>
                    <div class="w33">
                        Whatsapp: <br>
                        <input type="text" name="zap" class="form-control form-control-sm"> <br>
                    </div>
                </div>

                <hr>
                <h4>Endereço</h4>
                <hr>

                <div class="flex">
                    <div class="w33 marge">
                        CEP: <br>
                        <input type="text" name="CEP" class="form-control form-control-sm"><br>
                    </div>
                    <div class="w50 marge">
                        Endereço: <br>
                        <input type="text" name="endereco" class="form-control form-control-sm"> <br>
                    </div>
                    <div class="w33">
                        Nº: <br>
                        <input type="text" name="numero" class="form-control form-control-sm"> <br>
                    </div>
                </div>
                <div class="flex">
                    <div class="w33 marge">
                        Bairro: <br>
                        <input type="text" name="bairro" class="form-control form-control-sm"> <br>
                    </div>
                    <div class="w33 marge">
                        UF: <br>
                        <input type="text" name="UF" class="form-control form-control-sm"> <br>
                    </div>
                    <div class="w33">
                        Cidade: <br>
                        <input type="text" name="cidade" class="form-control form-control-sm"> <br>
                    </div>
                </div>
                OBS: <br>
                <textarea name="obs" id="" cols=86" rows="3" class="form-control form-control-sm"></textarea> <br>
                <input type="submit" value="Salvar" class="btn btn-success btn-block btn-md">
            </div>

        </form>
    </div>
</div>

</body>

</html>