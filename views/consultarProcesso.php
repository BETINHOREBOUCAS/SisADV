<?php
$id = $_POST['id'];
$processos = new Processos();
$dados = $processos->localizarProcesso($id);
if($dados['rpv'] == null) {
    $dados['rpv'] = "";
}else{
    $dados['rpv'] = date("d-m-Y", strtotime($dados['rpv']));
}

if($dados['pericia'] == null) {
    $dados['pericia'] = "";
}else{
    $dados['pericia'] = date("d-m-Y", strtotime($dados['pericia']));
}
?>

<style>
    label {
        color: black;
    }
    span {
        color: brown;
    }

</style>

<label for="tipo">Tipo: <span><?php echo $dados['tipo']; ?></span></label>  <br>
<label for="situacao">Situacao: <span><?php echo  $dados['situacao']; ?></span></label>  <br>
<label for="data">Data da entrada: <span><?php echo date("d-m-Y", strtotime($dados['data_i'])); ?></span></label>  <br>
<label for="obs">Acompanhante: <span><?php echo $dados['acompanhante']; ?></span></label> <br>
<label for="rpv">Data RPV: <span><?php echo $dados['rpv'];  ?></span></label> <br>
<label for="pericia">Data pericia: <span><?php echo $dados['pericia'];  ?></span></label> <br>
<label for="obs">Obs: <span><?php echo $dados['obs']; ?></span></label>
