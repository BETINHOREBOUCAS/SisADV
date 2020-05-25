<?php
class documentosController extends controller {

    public function index() {       

        
    }

    public function autoDeclaracao($id_cliente = "") {
        $dados = array(
            "doc" => "autoDeclaracao",
            "titulo" => "Auto Declaração"
        );
        $dados['id_cliente'] = $id_cliente;
        $this->loadTemplates('documentos', $dados);
    }

    public function requerimento($id_cliente = "") {
        $dados = array(
            "doc" => "requerimento",
            "titulo" => "Requerimento INSS"
        );
        $dados['id_cliente'] = $id_cliente;
        $this->loadTemplates('documentos', $dados);
    }

    public function procuracaoInss($id_cliente = "") {
        $dados = array(
            "doc" => "procuracaoInss",
            "titulo" => "Procuração INSS"
        );
        $dados['id_cliente'] = $id_cliente;
        $this->loadTemplates('documentos', $dados);
    }

    public function contrato($id_cliente = "") {
        $dados = array(
            "doc" => "contrato",
            "titulo" => "Contrato de Honorários"
        );
        $dados['id_cliente'] = $id_cliente;
        $this->loadTemplates('documentos', $dados);
    }

    public function procuracaoJustica($id_cliente = "") {
        $dados = array(
            "doc" => "procuracaoJustica",
            "titulo" => "Procuração Justiça"
        );
        $dados['id_cliente'] = $id_cliente;
        $this->loadTemplates('documentos', $dados);
    }

    public function declaracaoResidencia($id_cliente = "") {
        $dados = array(
            "doc" => "declaracaoResidencia",
            "titulo" => "Declaração de Residência"
        );
        $dados['id_cliente'] = $id_cliente;
        $this->loadTemplates('documentos', $dados);
    }
}