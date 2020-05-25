<?php
class galeriaController extends controller {

   public function index() {
        $dados = array(
            'qtd' => 129
        );

        $this->loadTemplates('galeria', $dados);
    }

}