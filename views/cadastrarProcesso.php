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
                    <div class="w50 marge">
                        Tipo: <br>
                        <select name="tipo" class="form-control" size="1">
                            <option value="">Escolha uma opção</option>
                            <option value="Aposentadoria">Aposentadoria</option>
                            <option value="Maternidade">Salário-Maternidade</option>
                            <option value="Doenca">Auxílio-Doença</option>
                        </select>
                    </div>
                    <div class="w50 marge">
                        Situação: <br>
                        <select name="situacao" class="form-control" size="1">
                            <option value="">Todos</option>
                            <option value="Andamento">Andamento</option>
                            <option value="Aprovado">Aprovado</option>
                            <option value="Negado">Negado</option>
                        </select>
                    </div>
                    <div class="w33 marge">
                        Data inicio: <br>
                        <input type="date" name="datai" class=" form-control">
                    </div>
                    <div class="w33">
                        Data fim: <br>
                        <input type="date" name="dataf" class=" form-control">
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
                        <th>Ação</th>
                    </tr>
                </thead>


                <tr>
                    <td>Francisco Adalberto Rebouças Filho</td>
                    <td>056.560.163-66</td>
                    <td>
                        <a href="" title="Consultar"><i class="fas fa-plus-circle"></i></a> <a href="" title="Editar"><i class="fas fa-edit"></i></a> <a href="" title="Excluir"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>Francisca Vanessa da Silva</td>
                    <td>056.560.163-66</td>
                    <td>
                        <a href="" title="Add Processo"><i class="fas fa-plus-circle"></i></a> <a href="" title="Editar"><i class="fas fa-edit"></i></a> <a href="" title="Excluir"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>






</body>

</html>