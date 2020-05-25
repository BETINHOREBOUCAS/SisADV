<?php
require "models/Clientes.php";
require "views/cabecalho.php";
$id = $_POST['id'];
$buscar = new Clientes();
$dados = $buscar->buscarCliente($id);

?>

<body>
    <div class="containner">
        <div class="box">
            <form method="post">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    CPF: <br>
                    <input type="text" name="cpf" value="<?php echo $dados['cpf']; ?>" class="form-control form-control-sm" disabled> <br>

                    Nome: <br>
                    <input type="text" name="nome" value="<?php echo $dados['nome']; ?>" class="form-control form-control-sm" disabled> <br>

                    <div>
                        Tipo do processo: <br>
                        <select name="tipo" class="form-control" size="1">
                            <option value="">Escolha uma opção</option>
                            <option value="41">Aposentadoria</option>                            
                            <option value="31">Auxílio-Doença</option>
                            <option value="21">Pensão</option>
                            <option value="80">Salário-Maternidade</option>
                        </select>
                    </div>
                    <br>

                    <div>
                        Data de entrada: <br>
                        <input type="date" name="datai" class="form-control">
                    </div>
                    
                </div>
                <input id="ativar" type="submit" value="Adicionar Processo" class="btn btn-success btn-block btn-md">
            </form>
        </div>
    </div>
    
    <?php
    if (isset($_GET['tipo']) && !empty($_GET['tipo'])) {
        require "models/Processos.php";
        $proceso = new Processos();
        $valor = $proceso->salvar($_GET['id'], $_GET['tipo'], $_GET['datai']);
    }
    ?>
    <script src="<?php echo BASE_URL; ?>assets/js/scriptProcessos.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/scriptClientes.js"></script>
</body>

</html>