<?php
$id = $_POST['id'];

$pagamento = isset($_POST['pagamento']) ? addslashes($_POST['pagamento']) : "1=1";
$situacao = isset($_POST['situacao']) ? addslashes($_POST['situacao']) : "1=1";
$pericia = isset($_POST['pericia']) ? addslashes($_POST['pericia']) : "";
$rpv = isset($_POST['rpv']) ? addslashes($_POST['rpv']) : "";
$obs = isset($_POST['obs']) ? addslashes($_POST['obs']) : "";

if (!empty($pagamento) || !empty($situacao) || !empty($obs) || !empty($rpv) || !empty($pericia)) {
    
    $atualizar = new Processos();
    $atualizar->atualizarProcesso($id, $pagamento, $situacao, $pericia, $rpv, $obs);
}
?>

<div class="containner">
    <div class="box">
        <form method="post">
            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                Qual a situação do processo? <br>
                <select name="situacao" class="form-control form-control-sm" size="1">
                    <option value=""></option>
                    <option value="andamento">Andamento</option>
                    <option value="aprovado">Aprovado</option>
                    <option value="negado">Negado</option>
                </select> <br>
                
                Todos os valores devidos foram pagos? <br>
                <select name="pagamento" class="form-control form-control-sm" size="1">
                    <option value=""></option>
                    <option value="2">SIM</option>
                    <option value="1">NÃO</option>
                </select> <br>
                <div>
                    <h4>Existe perícia agendada?</h4>
                    <input type="radio" name="pericia" id="pericia1"> Sim <br>
                    <input type="radio" name="pericia" id="pericia2"> Não <br>

                    <div style="display: none" id="data_pericia">
                    Selecione uma data: <br>
                    <input type="date" name="data_pericia"  class="form-control"> <br>
                    </div>
                    
                </div>

                <div>
                    <h4>Existe data prevista para o RPV?</h4>
                    <input type="radio" name="rpv" id="rpv1"> Sim <br>
                    <input type="radio" name="rpv" id="rpv2"> Não <br>

                    <div style="display: none" id="data_rpv">
                    Selecione uma data: <br>
                    <input type="date" name="data_rpv"  class="form-control"> <br>
                    </div>
                    
                </div> 

                Obs: <br>
                <textarea class="form-control" name="obs" cols="73" rows="3"></textarea>

                <br>
                <input type="submit" value="Salvar Alteração" class="btn btn-success btn-block btn-md">
            </div>
        </form>
    </div>
</div>
<script src="<?php echo BASE_URL; ?>assets/js/scriptProcessos.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/scriptClientes.js"></script>