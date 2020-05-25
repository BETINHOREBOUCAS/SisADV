<?php
class homeController extends controller {
    
    public function index() {       

        $dados = array();
        
        //Vai chamar a função loadTemplates e enviar a palavra home e a variavel $dados
        $this->loadTemplates('home', $dados);
    }

    public function login() {
        $this->loadView('login');
    }

    public function sair() {
        $this->loadView('sair');
    }

}