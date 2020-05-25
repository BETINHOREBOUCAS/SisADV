<?php
$id = $_POST['id'];

$pagamento = isset($_POST['pagamento']) ? addslashes($_POST['pagamento']) : "1=1";
$situacao = isset($_POST['situacao']) ? addslashes($_POST['situacao']) : "1=1";
$obs = isset($_POST['obs']) ? addslashes($_POST['obs']) : "1=1";

if (!empty($pagamento) || !empty($situacao) || !empty($obs)) {
    
    $atualizar = new Processos();
    $atualizar->atualizarProcesso($id, $pagamento, $situacao, $obs);
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
                Obs: <br>
                <textarea class="form-control" name="obs" cols="73" rows="3"></textarea>

                <br>
                <input type="submit" value="Salvar Alteração" class="btn btn-success btn-block btn-md">
            </div>
        </form>
    </div>
</div>