<?php
class processosController extends controller {

    public function index() {       

        
    }

    public function cadastrarProcesso() {
        $dados = array();
        $this->loadTemplates('cadastrarProcesso', $dados);
    }

    public function gerenciarProcessos() {
        $dados = array();
        $this->loadTemplates('gerenciarProcessos', $dados);
    }

    public function alterarTransicao() {
        require "views/alterarTransicao.php";
    }

    public function consultarProcesso() {
        require "views/consultarProcesso.php";
    }

}