<?php
class Clientes extends model{
    
    public function cadastrar($dados = array()) {
        if (!empty($dados['nome']) && isset($dados['nome']) && !empty($dados['cpf']) && isset($dados['cpf'])) {
            
            $sql = $this->db->prepare("INSERT INTO clientes (nome, cpf, nascimento, sexo, est_civil, rg, data_emissao_rg, orgao, telefone, celular, zap, cep, endereco, numero, bairro, uf, cidade, obs, id_usuario)values(:nome, :cpf, :nascimento, :sexo, :est_civil, :rg, :data_emissao, :orgao, :telefone, :celular, :zap, :cep, :endereco, :numero, :bairro, :uf, :cidade, :obs, :id_usuario)");
            
            $sql->bindValue(":nome", $dados['nome']);
            $sql->bindValue(":cpf", $dados['cpf']);
            $sql->bindValue(":nascimento", $dados['nascimento']);
            $sql->bindValue(":sexo", $dados['sexo']);
            $sql->bindValue(":est_civil", $dados['estadoCivil']);
            $sql->bindValue(":rg", $dados['RG']);
            $sql->bindValue(":data_emissao", $dados['emissaoRG']);
            $sql->bindValue(":orgao", $dados['orgaoRG']);
            $sql->bindValue(":telefone", $dados['tel']);
            $sql->bindValue(":celular", $dados['celular']);
            $sql->bindValue(":zap", $dados['zap']);
            $sql->bindValue(":cep", $dados['CEP']);
            $sql->bindValue(":endereco", $dados['endereco']);
            $sql->bindValue(":numero", $dados['numero']);
            $sql->bindValue(":bairro", $dados['bairro']);
            $sql->bindValue(":uf", $dados['UF']);
            $sql->bindValue(":cidade", $dados['cidade']);
            $sql->bindValue(":obs", $dados['obs']);
            $sql->bindValue(":id_usuario", 1);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                return array(
                    "codigo" => "alert-success",
                    "resposta" => "Cadastro realizado com sucesso!"
                );
            } else {
                return array(
                    "codigo" => "alert-danger",
                    "resposta" => "Error! Algo deu errado!"
                );
            }
            
        }else {
            return array(
                "codigo" => "alert-danger",
                "resposta" => "Nome e CPF são campos obrigatórios."
            );
            
        }
    }

    public function atualizar($dados) {
        if (!empty($dados['cpf']) && !empty($dados['nome'])) {
            $sql = $this->db->prepare("UPDATE clientes set nome = :nome, cpf = :cpf, nascimento = :nascimento, sexo = :sexo, est_civil = :est_civil, rg = :rg, data_emissao_rg = :data_emissao, orgao = :orgao, telefone = :telefone, celular = :celular, zap = :zap, cep = :cep, endereco = :endereco, numero = :numero, bairro = :bairro, uf = :uf, cidade = :cidade, obs = :obs, id_usuario = :id_usuario where id_cliente = :id_cliente");

            $sql->bindValue(":id_cliente", $dados['id']);
            $sql->bindValue(":nome", $dados['nome']);
            $sql->bindValue(":cpf", $dados['cpf']);
            $sql->bindValue(":nascimento", $dados['nascimento']);
            $sql->bindValue(":sexo", $dados['sexo']);
            $sql->bindValue(":est_civil", $dados['estadoCivil']);
            $sql->bindValue(":rg", $dados['rg']);
            $sql->bindValue(":data_emissao", $dados['emissaoRG']);
            $sql->bindValue(":orgao", $dados['orgaoRG']);
            $sql->bindValue(":telefone", $dados['tel']);
            $sql->bindValue(":celular", $dados['celular']);
            $sql->bindValue(":zap", $dados['zap']);
            $sql->bindValue(":cep", $dados['cep']);
            $sql->bindValue(":endereco", $dados['endereco']);
            $sql->bindValue(":numero", $dados['numero']);
            $sql->bindValue(":bairro", $dados['bairro']);
            $sql->bindValue(":uf", $dados['uf']);
            $sql->bindValue(":cidade", $dados['cidade']);
            $sql->bindValue(":obs", $dados['obs']);
            $sql->bindValue(":id_usuario", 1);
            $sql->execute();

            
        }
    }

    public function consultar($nome, $cpf, $pagina) {
        if (empty($nome) && empty($cpf)) {
            $sql = $this->db->query("SELECT *, (select count(*) as c from clientes) as c FROM clientes ORDER BY nome asc limit $pagina, 8");
            
            if ($sql->rowCount() > 0) {
                return $sql->fetchAll();
            }
        }else if (!empty($nome) && empty($cpf)) {
            $sql = "SELECT *, (select count(*) as c from clientes where nome like :nome) as c FROM clientes WHERE nome like :nome order by nome asc limit $pagina, 8";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":nome", "%$nome%");
            $sql->execute();

            if ($sql->rowCount() > 0) {
                return $sql->fetchAll();
            }
        }else if (!empty($cpf) && empty($nome)) {
            $sql = "SELECT *, (select count(*) as c from clientes where cpf = :cpf) as c FROM clientes WHERE cpf = :cpf";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":cpf", $cpf);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                return $sql->fetchAll();
            }
        }else if (!empty($cpf) && !empty($nome)) {
            $sql = "SELECT *, (select count(*) as c from clientes WHERE nome like :nome and cpf = :cpf) as c FROM clientes WHERE nome like :nome and cpf = :cpf";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":nome", "%$nome%");
            $sql->bindValue(":cpf", $cpf);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                return $sql->fetchAll();
            }
        }       
    }

    public function contar($nome, $cpf) {
        if (empty($nome) && empty($cpf)) {
            $sql = $this->db->query("SELECT count(*) as c from clientes");
            
            if ($sql->rowCount() > 0) {
                return $sql->fetch();
            }
        }else if (!empty($nome) && empty($cpf)) {
            $sql = "SELECT count(*) as c from clientes where nome like :nome";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":nome", "%$nome%");
            $sql->execute();

            if ($sql->rowCount() > 0) {
                return $sql->fetch();
            }
        }else if (!empty($cpf) && empty($nome)) {
            $sql = "SELECT count(*) as c from clientes where cpf = :cpf";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":cpf", $cpf);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                return $sql->fetch();
            }
        }else if (!empty($cpf) && !empty($nome)) {
            $sql = "SELECT count(*) as c from clientes WHERE nome like :nome and cpf = :cpf";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":nome", "%$nome%");
            $sql->bindValue(":cpf", $cpf);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                return $sql->fetch();
            }
        }
    }

    public function buscarCliente($id) {
        $sql = $this->db->prepare("SELECT * FROM clientes WHERE id_cliente = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        $sql = $sql->fetch();
        return $sql;
    }

    public function excluir($id) {
        $sql = "DELETE FROM clientes WHERE id_cliente = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return 1;
        }else {
            return 2;
        }
        
    }

    public function consultarCliente($id) {
        $sql = $this->db->query("SELECT * FROM clientes WHERE id_cliente = $id");

        return $sql->fetch();
    }

    public function logar($nome, $senha) {
        $sql = $this->db->prepare("SELECT id, nome, senha from usuarios WHERE nome = :nome and senha = :senha");
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":senha", md5($senha));
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            return $sql['id'];
        }else {
            return false;
        }
    }
}