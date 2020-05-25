<?php
$id = $_POST['id'];
$processos = new Processos();
$dados = $processos->localizarProcesso($id);
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
<label for="obs">Obs: <span><?php echo $dados['obs']; ?></span></label>
