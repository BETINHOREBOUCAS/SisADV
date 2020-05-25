<?php 
require "models/Clientes.php";

$id = addslashes($_POST['id']);
$apagar = new Clientes();
$resposta = $apagar->excluir($id);

echo $resposta;