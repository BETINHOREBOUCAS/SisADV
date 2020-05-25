<?php
$acao = isset($_POST['acao'])? addslashes($_POST['acao']) : "";
$id = $_POST['id'];
$processos = new Processos();
$resultado = $processos->buscarCliente($id);

if ($acao == 1) {
    $processos->excluirProcesso($id);
}

?>
<h4>Deseja realmente excluir o processo de <?php echo $resultado['nome']; ?>?</h4>
<form method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="submit" value="Excluir processo!" class="btn btn-success btn-md">
</form>