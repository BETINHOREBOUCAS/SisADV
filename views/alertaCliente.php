<?php 
require "models/Clientes.php";
$id = $_POST['id'];

$consultar = new Clientes();
$dados = $consultar->consultarCliente($id);


?>

<h3>Deseja realmente excluir <?php echo $dados['nome']; ?>?</h3>

<form method="post">
<input type="hidden" name="id" value="<?php echo $id; ?>">
   <input type="submit" value="EXCLUIR" class="btn btn-success"> 
</form>
