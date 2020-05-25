<h1><?php echo $viewData['titulo']; ?></h1>
<div class="containner">
    <div class="box">
        <div class="form-group">
            <form method="get">
                <div class="flex">
                    <div class="w50 marge">
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
                <thead class="table-info">
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                

                <tr>
                    <td>Francisco Adalberto Rebouças Filho</td>
                    <td>056.560.163-66</td>
                    <td>
                        <a href="<?php echo BASE_URL."documentos/".$viewData['doc']."/2"; ?>" title="Visualizar Declaração"><i class="fas fa-eye"></i></a> <a href="" title="Baixar Declaração"><i class="fas fa-file-download"></i></a> <a href="" title="Todas declarações"><i class="fas fa-folder-open"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>Francisca Vanessa da Silva</td>
                    <td>056.560.163-66</td>
                    <td>
                    <a href="<?php echo BASE_URL."documentos/".$viewData['doc']."/1"; ?>" title="Visualizar Declaração"><i class="fas fa-eye"></i></a> <a href="" title="Baixar Declaração"><i class="fas fa-file-download"></i></a> <a href="" title="Todas declarações"><i class="fas fa-folder-open"></i></a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>






</body>

</html>

<?php print_r($viewData) ?>