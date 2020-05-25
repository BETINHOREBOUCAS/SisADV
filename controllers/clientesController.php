<?php
class clientesController extends controller {

    public function index() {       
        
        
    }

    public function cadastrarCliente() {
        $dados = array();
        $this->loadTemplates('cadastrarCliente', $dados);
    }

    public function consultarCliente() {
        $dados = array();
        $this->loadViewTemplate('consultarCliente', $dados);
    }

    public function gerenciarCliente() {
        $dados = array();
        $this->loadTemplates('gerenciarCliente', $dados);
    }

    public function addProcesso() {
        require "views/addProcesso.php";
    }

    public function editarCliente() {
        require "views/editarCliente.php";
    }

    public function alertaCliente() {
        require "views/alertaCliente.php";
    }

    public function excluirCliente() {
        require "views/excluirCliente.php";
    }

    public function addP() {
        require "views/addP.php";
    }
}