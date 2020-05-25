<?php
$dados[] = isset($_GET['nome']) && !empty($_GET['nome']) ? addslashes($_GET['nome']) : "1=1";
$dados[] = isset($_GET['cpf']) && !empty($_GET['cpf']) ? addslashes($_GET['cpf']) : "1=1";
$dados[] = isset($_GET['tipo']) && !empty($_GET['tipo']) ? addslashes($_GET['tipo']) : "1=1";
$dados[] = isset($_GET['situacao']) && !empty($_GET['situacao']) ? addslashes($_GET['situacao']) : "1=1";
$dados[] = isset($_GET['datai']) && !empty($_GET['datai']) ? addslashes($_GET['datai']) : "1=1";
$dados[] = isset($_GET['dataf']) && !empty($_GET['dataf']) ? addslashes($_GET['dataf']) : "1=1";

$pagina = isset($_GET['p']) ? addslashes($_GET['p']) : "1";

if (!isset($_GET['nome']) && !isset($_GET['cpf']) && !isset($_GET['tipo']) && !isset($_GET['situacao']) && !isset($_GET['datai']) && !isset($_GET['dataf'])) {
    $dados['acao'] = "buscar";
}
$processos = new Processos();

$tot_processos = $processos->contarProcesso($dados);

$total_pagina = ceil($tot_processos / 8);
$pa = ($pagina - 1) * 8;

$resultado = $processos->consultarProcesso($dados, $pa);

function somar($n, $total_pagina)
{
    if (($n + 1) > $total_pagina) {
        return $total_pagina;
    } else {
        return $n + 1;
    }
}

function sub($n)
{
    if ($n == 1) {
        return 1;
    } else {

        return $n - 1;
    }
}

?>
<div class="containner">
    <div class="box">
        <div class="form-group">
            <form method="get">
                <div class="flex">
                    <div class="w50 marge">
                        Nome: <br>
                        <input type="hidden" name="p" value="1">
                        <input type="text" name="nome" value="<?php echo isset($_GET['nome']) ? $_GET['nome'] : ""; ?>" class="form-control form-control-sm">
                    </div>

                    <div class="w50">
                        CPF: <br>
                        <input type="text" name="cpf" value="<?php echo isset($_GET['cpf']) ? $_GET['cpf'] : ""; ?>" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="flex">
                    <div class="w50 marge">
                        Tipo: <br>
                        <select name="tipo" class="form-control" size="1">
                            <option value="">Escolha uma opção</option>
                            <option <?php
                                    if (isset($_GET['tipo']) && $_GET['tipo'] == "41") {
                                        echo "selected";
                                    }
                                    ?> value="41">Aposentadoria</option>
                            <option <?php
                                    if (isset($_GET['tipo']) && $_GET['tipo'] == "31") {
                                        echo "selected";
                                    }
                                    ?> value="31">Auxílio-Doença</option>
                            <option <?php
                                    if (isset($_GET['tipo']) && $_GET['tipo'] == "21") {
                                        echo "selected";
                                    }
                                    ?> value="21">Pensão</option>
                            <option <?php
                                    if (isset($_GET['tipo']) && $_GET['tipo'] == "80") {
                                        echo "selected";
                                    }
                                    ?> value="80">Salário-Maternidade</option>

                        </select>
                    </div>
                    <div class="w50 marge">
                        Situação: <br>
                        <select name="situacao" class="form-control" size="1">
                            <option value="">Todos</option>
                            <option <?php
                                    if (isset($_GET['situacao']) && $_GET['situacao'] == "Andamento") {
                                        echo "selected";
                                    }
                                    ?> value="Andamento">Andamento</option>
                            <option <?php
                                    if (isset($_GET['situacao']) && $_GET['situacao'] == "Aprovado") {
                                        echo "selected";
                                    }
                                    ?> value="Aprovado">Aprovado</option>
                            <option <?php
                                    if (isset($_GET['situacao']) && $_GET['situacao'] == "Negado") {
                                        echo "selected";
                                    }
                                    ?> value="Negado">Negado</option>
                        </select>
                    </div>
                    <!-- <div class="w33 marge">
                        Data inicio: <br>
                        <input type="date" name="datai" class=" form-control">
                    </div>
                    
                    <div class="w33">
                        Data fim: <br>
                        <input type="date" name="dataf" class=" form-control">
                    </div> -->
                </div>
                <div class="flex">
                    <div class="marge">
                        <input type="reset" value="Apagar" id="buscar" class="btn btn-danger btn-md">
                    </div>
                    <div>
                        <input type="submit" value="Buscar" id="buscar" class="btn btn-success btn-md">
                    </div>
                </div>
            </form>
        </div>
        <div class="table-responsive-lg">
            <?php if ($resultado != 0) : ?>

                <table class="table-hover table table-striped table-bordered">
                    <thead class="table-info">
                        <tr>
                            <th style="text-align: center">Nome</th>
                            <th style="text-align: center">CPF</th>
                            <th style="text-align: center">Benefício</th>
                            <th style="text-align: center">Entrada</th>
                            <th style="text-align: center">Situação</th>
                            <th style="text-align: center">Pagamento</th>
                            <th style="text-align: center">Ação</th>
                        </tr>
                    </thead>

                    <?php foreach ($resultado as $valor) : ?>
                        <tr>
                            <td><?php echo $valor['nome']; ?></td>
                            <td><?php echo $valor['cpf']; ?></td>
                            <td style="text-align: center"><?php echo $valor['tipo']; ?></td>
                            <td style="text-align: center"><?php echo date("d-m-Y", strtotime($valor['data_i'])); ?></td>

                            <?php if ($valor['situacao'] == "andamento") : ?>
                                <td style="text-align: center"><i class="fas fas fa-walking" style="color: #FFA500" title="Andamento"></i></td>
                            <?php elseif ($valor['situacao'] == "negado") : ?>
                                <td style="text-align: center"><i class="fas fa-thumbs-down" style="color: red;" title="Negado"></td>
                            <?php elseif ($valor['situacao'] == "aprovado") : ?>
                                <td style="text-align: center"><i class="fas fa-thumbs-up" style="color: green" title="Aprovado"></i></td>
                            <?php else : ?>
                                <td>Não</td>
                            <?php endif ?>

                            <?php if ($valor['pagamento'] == 0) : ?>
                                <td style="text-align: center"><i class="fas fa-exclamation-circle" style="color: #FFA500" title="Aguardando pagamento"></i></td>
                            <?php elseif ($valor['pagamento'] == 1) : ?>
                                <td style="text-align: center"><i class="fas fa-times-circle" style="color: red;" title="Não existe pagamento"></td>
                            <?php elseif ($valor['pagamento'] == 2) : ?>
                                <td style="text-align: center"><i class="fas fa-check-circle" style="color: green" title="Pagamento realizado"></i></td>
                            <?php endif ?>
                            <td style="text-align: center">
                                <a href="javascript:;" onclick="consultarProcesso(<?php echo $valor['id_processo']; ?>)" title="Consultar processo"><i class="fas fa-search"></i></a>
                                <a href="javascript:;" onclick="alterarTrasicao(<?php echo $valor['id_processo']; ?>)" title="Alterar situacao"><i class="fas fa-gavel"></i></a>
                                <!--<a href="" title="Marcar como pago"><i class="far fa-money-bill-alt"></i></a>-->
                                <!--<a href="" title="Editar"><i class="fas fa-edit"></i></a>-->
                                <a href="javascript:;" onclick="apagarProcesso(<?php echo $valor['id_processo']; ?>)" title="Excluir"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>



                    <?php endforeach ?>
                </table>
            <?php endif ?>
        </div>
        <?php
        if ($tot_processos > 8) : ?>
            <ul class="pager ativo">
                <li><a href="?p=<?php echo sub($_GET['p']); ?>&nome=<?php echo $_GET['nome']; ?>&cpf=<?php echo $_GET['cpf']; ?>&tipo=<?php echo $_GET['tipo']; ?>&situacao=<?php echo $_GET['situacao']; ?>">Página
                        anterior</a></li>
                <strong>Página <?php echo $_GET['p'] . " de " . $total_pagina; ?></strong>
                <li><a href="?p=<?php echo somar($_GET['p'], $total_pagina); ?>&nome=<?php echo $_GET['nome']; ?>&cpf=<?php echo $_GET['cpf']; ?>&tipo=<?php echo $_GET['tipo']; ?>&situacao=<?php echo $_GET['situacao']; ?>">Proxima
                        página</a></li>
            </ul>
        <?php endif ?>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Adicionar Processo</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Modal body..
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            </div>

        </div>
    </div>
</div>




</body>

</html>