<?php
require "views/cabecalho.php";
require "models/clientes.php";

$id = $_POST['id'];

$cliente = new Clientes();
$dados = $cliente->buscarCliente($id);

?>

<div class="containner">
    <div class="box">
        
            <div class="form-group">

                <h4>Dados Pessoais</h4>
                <hr>
                CPF: <br>
                <input value="<?php echo $dados['cpf']; ?>" readonly="readonly" type="text" name="cpf" class="form-control form-control-sm"> <br>

                Nome: <br>
                <input value="<?php echo $dados['nome']; ?>" readonly="readonly" type="text" name="nome" class="form-control form-control-sm" > <br>

                <div class="flex">
                    <div class="w33 marge">
                        Data de Nascimento: <br>
                        <input value="<?php echo $dados['nascimento']; ?>" readonly="readonly" type="text" name="nascimento" class="form-control form-control-sm"> <br>
                    </div>
                    <div class="w33 marge">
                        Sexo: <br>
                        <input value="<?php echo $dados['sexo']; ?>" readonly="readonly" type="text" name="sexo" class="form-control form-control-sm"><br>
                    </div>
                    <div class="w33">
                        Estado cívil:<br>
                        <input value="<?php echo $dados['est_civil']; ?>" readonly="readonly" type="text" name="estadoCivil" class="form-control form-control-sm"><br>
                    </div>
                </div>
                <div class="flex">
                    <div class="w33 marge">
                        RG: <br>
                        <input value="<?php echo $dados['rg']; ?>" readonly="readonly" type="text" name="RG" class="form-control form-control-sm"><br>
                    </div>
                    <div class="w33 marge">
                        Data de emissão: <br>
                        <input value="<?php echo $dados['data_emissao_rg']; ?>" readonly="readonly" type="text" name="emissaoRG" class="form-control form-control-sm"> <br>
                    </div>
                    <div class="w33">
                        Orgão: <br>
                        <input value="<?php echo $dados['orgao']; ?>" readonly="readonly" type="text" name="orgaoRG" class="form-control form-control-sm"> <br>
                    </div>
                </div>
                <div class="flex">
                    <div class="w33 marge">
                        Telefone: <br>
                        <input value="<?php echo $dados['telefone']; ?>" readonly="readonly" type="text" name="tel" class="form-control form-control-sm"><br>
                    </div>
                    <div class="w33 marge">
                        Celular: <br>
                        <input value="<?php echo $dados['celular']; ?>" readonly="readonly" type="text" name="celular" class="form-control form-control-sm"> <br>
                    </div>
                    <div class="w33">
                        Whatsapp: <br>
                        <input value="<?php echo $dados['zap']; ?>" readonly="readonly" type="text" name="zap" class="form-control form-control-sm"> <br>
                    </div>
                </div>

                <hr>
                <h4>Endereço</h4>
                <hr>

                <div class="flex">
                    <div class="w33 marge">
                        CEP: <br>
                        <input value="<?php echo $dados['cep']; ?>" readonly="readonly" type="text" name="CEP" class="form-control form-control-sm"><br>
                    </div>
                    <div class="w50 marge">
                        Endereço: <br>
                        <input value="<?php echo $dados['endereco']; ?>" readonly="readonly" type="text" name="endereco" class="form-control form-control-sm"> <br>
                    </div>
                    <div class="w33">
                        Nº: <br>
                        <input value="<?php echo $dados['numero']; ?>" readonly="readonly" type="text" name="numero" class="form-control form-control-sm"> <br>
                    </div>
                </div>
                <div class="flex">
                    <div class="w33 marge">
                        Bairro: <br>
                        <input value="<?php echo $dados['bairro']; ?>" readonly="readonly" type="text" name="bairro" class="form-control form-control-sm"> <br>
                    </div>
                    <div class="w33 marge">
                        UF: <br>
                        <input value="<?php echo $dados['uf']; ?>" readonly="readonly" type="text" name="UF" class="form-control form-control-sm"> <br>
                    </div>
                    <div class="w33">
                        Cidade: <br>
                        <input value="<?php echo $dados['cidade']; ?>" readonly="readonly" type="text" name="cidade" class="form-control form-control-sm"> <br>
                    </div>
                </div>
                OBS: <br>
                <textareareadonly="readonly" name="obs" id="" cols=86" rows="3" class="form-control form-control-sm"><?php echo $dados['obs']; ?></textarea> <br>
            </div>

        </form>
    </div>
</div>

</body>

</html>
