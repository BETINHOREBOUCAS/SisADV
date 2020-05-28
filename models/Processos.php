<?php
class Processos extends model
{

    public function salvar($id, $tipo, $datai = "", $acompanhante = "")
    {
        
        if (!isset($datai) || empty($datai)) {
            $sql = $this->db->prepare("INSERT into processos(tipo, situacao, data_i, id_cliente, acompanhante)value(:tipo, 'andamento', now(), :id, :acompanhante)");
            $sql->bindValue(":tipo", $tipo);
            $sql->bindValue(":id", $id);
            $sql->bindValue(":acompanhante", $acompanhante);
            $sql->execute();
        }else {
            $sql = $this->db->prepare("INSERT into processos(tipo, situacao, data_i, id_cliente, acompanhante)value(:tipo, 'andamento', :datai, :id, :acompanhante)");
            $sql->bindValue(":tipo", $tipo);
            $sql->bindValue(":datai", $datai);
            $sql->bindValue(":id", $id);
            $sql->bindValue(":acompanhante", $acompanhante);
            $sql->execute();
        }
        
    }

    public function consultarProcesso($dados, $pa)
    {
        if (!in_array("buscar", $dados)) {

            $query = array("1=1");
            if ($dados[0] != "1=1") {
                $query[] = "clientes.nome like :nome";
            }
            if ($dados[1] != "1=1") {
                $query[] = "clientes.cpf = :cpf";
            }
            if ($dados[2] != "1=1") {
                $query[] = "processos.tipo = :tipo";
            }
            if ($dados[3] != "1=1") {
                $query[] = "processos.situacao = :situacao";
            }
            if ($dados[4] != "1=1") {
                $query[] = "processos.data_i = :datai";
            }
            if ($dados[5] != "1=1") {
                $query[] = "processos.data_f = :dataf";
            }

            $sql = $this->db->prepare("SELECT processos.id_processo, clientes.nome, clientes.cpf, processos.tipo, processos.situacao, processos.data_i, processos.data_f, processos.situacao, processos.pagamento FROM clientes, processos where " . implode(' AND ', $query) . " AND clientes.id_cliente = processos.id_cliente ORDER BY processos.data_i asc limit $pa, 8");

            if ($dados[0] != "1=1") {
                $sql->bindValue(":nome", "%$dados[0]%");
            }
            if ($dados[1] != "1=1") {
                $sql->bindValue(":cpf", $dados[1]);
            }
            if ($dados[2] != "1=1") {
                $sql->bindValue(":tipo", $dados[2]);
            }
            if ($dados[3] != "1=1") {
                $sql->bindValue(":situacao", $dados[3]);
            }
            if ($dados[4] != "1=1") {
                $sql->bindValue(":datai", $dados[4]);
            }
            if ($dados[5] != "1=1") {
                $sql->bindValue(":dataf", $dados[5]);
            }

            $sql->execute();

            if ($sql->rowCount() > 0) {
                $sql = $sql->fetchAll();
                return $sql;
            } else {
                return $sql->rowCount();
            }
        }
    }

    public function contarProcesso($dados)
    {
        if (!in_array("buscar", $dados)) {

            $query = array("1=1");
            if ($dados[0] != "1=1") {
                $query[] = "clientes.nome like :nome";
            }
            if ($dados[1] != "1=1") {
                $query[] = "clientes.cpf = :cpf";
            }
            if ($dados[2] != "1=1") {
                $query[] = "processos.tipo = :tipo";
            }
            if ($dados[3] != "1=1") {
                $query[] = "processos.situacao = :situacao";
            }
            if ($dados[4] != "1=1") {
                $query[] = "processos.data_i = :datai";
            }
            if ($dados[5] != "1=1") {
                $query[] = "processos.data_f = :dataf";
            }

            $sql = $this->db->prepare("SELECT clientes.nome, clientes.cpf, processos.tipo, processos.situacao, processos.data_i, processos.data_f, processos.situacao, processos.pagamento FROM clientes, processos where " . implode(' AND ', $query) . " AND clientes.id_cliente = processos.id_cliente");

            if ($dados[0] != "1=1") {
                $sql->bindValue(":nome", "%$dados[0]%");
            }
            if ($dados[1] != "1=1") {
                $sql->bindValue(":cpf", $dados[1]);
            }
            if ($dados[2] != "1=1") {
                $sql->bindValue(":tipo", $dados[2]);
            }
            if ($dados[3] != "1=1") {
                $sql->bindValue(":situacao", $dados[3]);
            }
            if ($dados[4] != "1=1") {
                $sql->bindValue(":datai", $dados[4]);
            }
            if ($dados[5] != "1=1") {
                $sql->bindValue(":dataf", $dados[5]);
            }

            $sql->execute();

            return $sql->rowCount();
        }
    }

    public function atualizarProcesso($id, $pagamento, $situacao, $pericia, $rpv, $obs)
    {

        $query = array();
        if ($pagamento === "1" || $pagamento === "2") {
            $query[] = "processos.pagamento = :pagamento";
        }
        if ($situacao === "andamento" || $situacao === "aprovado" || $situacao === "negado") {
            $query[] = "processos.situacao = :situacao";
        }
        if (!empty($obs) && isset($obs)) {
            $query[] = "processos.obs = :obs";
        }
        if (!empty($pericia) && isset($pericia)) {
            $query[] = "processos.pericia = :pericia";
        }
        if (!empty($rpv) && isset($rpv)) {
            $query[] = "processos.rpv = :rpv";
        }



        $sql = $this->db->prepare("UPDATE processos set " . implode(" , ", $query) . " WHERE id_processo = $id");

        if ($pagamento === "1" || $pagamento === "2") {
            $sql->bindValue(":pagamento", $pagamento);
        }
        if ($situacao === "andamento" || $situacao === "aprovado" || $situacao === "negado") {
            $sql->bindValue(":situacao", $situacao);
        }
        if (!empty($obs) && isset($obs)) {
            $sql->bindValue(":obs", $obs);
        }
        if (!empty($pericia) && isset($pericia)) {
            $sql->bindValue(":pericia", $pericia);
        }
        if (!empty($rpv) && isset($rpv)) {
            $sql->bindValue(":rpv", $rpv);
        }

        $sql->execute();
    }

    public function buscarCliente($id)
    {
        $sql = $this->db->prepare("SELECT clientes.nome FROM processos, clientes WHERE processos.id_processo = :id and processos.id_cliente = clientes.id_cliente");
        $sql->bindValue(":id", $id);
        $sql->execute();

        $sql = $sql->fetch();
        return $sql;
    }

    public function excluirProcesso($id)
    {
        $sql = $this->db->query("DELETE FROM processos WHERE id_processo = $id");
    }

    public function localizarProcesso($id) {
        $sql = $this->db->query("SELECT * FROM processos where id_processo = $id");
        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            return $sql;
        }
    }
}
