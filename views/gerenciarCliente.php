<?php
if (isset($_GET['cpf']) || isset($_GET['nome'])) {
    $nome = addslashes($_GET['nome']);
    $cpf = addslashes($_GET['cpf']);
    $pagina = addslashes($_GET['p']);
    $cliente = new Clientes();

    $tot_busca = $cliente->contar($nome, $cpf);

    $total_pagina = ceil($tot_busca['c'] / 8);
    $pa = ($pagina - 1) * 8;

    $dados = $cliente->consultar($nome, $cpf, $pa);

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
} else {
    $paginas = 0;
}

?>
<div class="containner">
    <div class="box">
        <div class="form-group">
            <form method="get">
                <div class="flex">
                    <div class="w50 marge">
                        <input type="hidden" name="p" value="1">
                        Nome: <br>
                        <input type="text" name="nome" class="form-control form-control-sm">
                    </div>

                    <div class="w50">
                        CPF: <br>
                        <input type="text" name="cpf" class="form-control form-control-sm">
                    </div>
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
            <table class="table-hover table table-striped table-bordered">
                <?php
                if (!empty($dados) && isset($dados)) : ?>
                    <thead class="table-info">
                        <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Ações</th>
                        </tr>
                    </thead>


                    <?php
                    foreach ($dados as $pessoa) : ?>
                        <tr>
                            <td><?php echo $pessoa['nome']; ?></td>
                            <td><?php echo $pessoa['cpf']; ?></td>
                            <td>
                                <a href="javascript:;" onclick="adicionar(<?php echo $pessoa['id_cliente']; ?>)" title="Adicionar processo"><i class="fas fa-plus-circle"></i></a>
                                 <a href="javascript:;" onclick="consultar(<?php echo $pessoa['id_cliente']; ?>)" title="Consultar cadastro"><i class="fas fa-search"></i></a>
                                 <a href="javascript:;" onclick="editar(<?php echo $pessoa['id_cliente']; ?>)" title="Editar cadastro"><i class="fas fa-edit"></i></a>
                                 <a href="javascript:;" onclick="excluir(<?php echo $pessoa['id_cliente']; ?>)" title="Excluir cadastro"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?>
            </table>
        </div>

        <?php
        if (isset($tot_busca['c']) && $tot_busca['c'] > 8) : ?>
            <ul class="pager ativo">
                <li><a href="?p=<?php echo sub($_GET['p']); ?>&nome=<?php echo $_GET['nome']; ?>&cpf=<?php echo $_GET['cpf']; ?>">Página
                        anterior</a></li>
                <strong>Página <?php echo $_GET['p'] . " de " . $total_pagina; ?></strong>
                <li><a href="?p=<?php echo somar($_GET['p'], $total_pagina); ?>&nome=<?php echo $_GET['nome']; ?>&cpf=<?php echo $_GET['cpf']; ?>">Proxima
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