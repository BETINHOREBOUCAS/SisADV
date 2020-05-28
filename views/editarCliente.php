<?php

$acao = 0;

if (isset($_POST['acao']) && !empty($_POST['acao'])) {
    $dados = $_POST;
    $clienteAtt = new Clientes();
    $clienteAtt->atualizar($dados);
}

$id = $_POST['id'];

$cliente = new Clientes();
$dados = $cliente->buscarCliente($id);

?>

<div class="containner">
    <div class="box">
        <form method="post">
            <div class="form-group">

                <h4>Dados Pessoais</h4>
                <hr>
                <input type="hidden" name="id" value="<?php echo $dados['id_cliente']; ?>">
                CPF: <br>
                <input value="<?php echo $dados['cpf']; ?>" type="text" name="cpf" class="form-control form-control-sm"> <br>

                Nome: <br>
                <input value="<?php echo $dados['nome']; ?>" type="text" name="nome" class="form-control form-control-sm"> <br>

                <div class="flex">
                    <div class="w33 marge">
                        Data de Nascimento: <br>
                        <input value="<?php echo $dados['nascimento']; ?>" type="text" name="nascimento" class="form-control form-control-sm"> <br>
                    </div>
                    <div class="w33 marge">
                        Sexo: <br>
                        <input value="<?php echo $dados['sexo']; ?>" type="text" name="sexo" class="form-control form-control-sm"><br>
                    </div>
                    <div class="w33">
                        Estado cívil:<br>
                        <input value="<?php echo $dados['est_civil']; ?>" type="text" name="estadoCivil" class="form-control form-control-sm"><br>
                    </div>
                </div>
                <div class="flex">
                    <div class="w33 marge">
                        RG: <br>
                        <input value="<?php echo $dados['rg']; ?>" type="text" name="RG" class="form-control form-control-sm"><br>
                    </div>
                    <div class="w33 marge">
                        Data de emissão: <br>
                        <input value="<?php echo $dados['data_emissao_rg']; ?>" type="text" name="emissaoRG" class="form-control form-control-sm"> <br>
                    </div>
                    <div class="w33">
                        Orgão: <br>
                        <input value="<?php echo $dados['orgao']; ?>" type="text" name="orgaoRG" class="form-control form-control-sm"> <br>
                    </div>
                </div>
                <div class="flex">
                    <div class="w33 marge">
                        Telefone: <br>
                        <input value="<?php echo $dados['telefone']; ?>" type="text" name="tel" class="form-control form-control-sm"><br>
                    </div>
                    <div class="w33 marge">
                        Celular: <br>
                        <input value="<?php echo $dados['celular']; ?>" type="text" name="celular" class="form-control form-control-sm"> <br>
                    </div>
                    <div class="w33">
                        Whatsapp: <br>
                        <input value="<?php echo $dados['zap']; ?>" type="text" name="zap" class="form-control form-control-sm"> <br>
                    </div>
                </div>

                <hr>
                <h4>Endereço</h4>
                <hr>

                <div class="flex">
                    <div class="w33 marge">
                        CEP: <br>
                        <input value="<?php echo $dados['cep']; ?>" type="text" name="CEP" class="form-control form-control-sm"><br>
                    </div>
                    <div class="w50 marge">
                        Endereço: <br>
                        <input value="<?php echo $dados['endereco']; ?>" type="text" name="endereco" class="form-control form-control-sm"> <br>
                    </div>
                    <div class="w33">
                        Nº: <br>
                        <input value="<?php echo $dados['numero']; ?>" type="text" name="numero" class="form-control form-control-sm"> <br>
                    </div>
                </div>
                <div class="flex">
                    <div class="w33 marge">
                        Bairro: <br>
                        <input value="<?php echo $dados['bairro']; ?>" type="text" name="bairro" class="form-control form-control-sm"> <br>
                    </div>
                    <div class="w33 marge">
                        UF: <br>
                        <input value="<?php echo $dados['uf']; ?>" type="text" name="UF" class="form-control form-control-sm"> <br>
                    </div>
                    <div class="w33">
                        Cidade: <br>
                        <input value="<?php echo $dados['cidade']; ?>" type="text" name="cidade" class="form-control form-control-sm"> <br>
                    </div>
                </div>
                OBS: <br>
                <textarea name="obs" id="" cols=86" rows="3" class="form-control form-control-sm"><?php echo $dados['obs']; ?></textarea> <br>
            <input type="submit" value="Salvar alterações" class="btn btn-success btn-block btn-md">


            
            </div>

        </form>
    </div>
</div>

</body>

</html>