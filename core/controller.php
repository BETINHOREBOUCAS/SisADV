<?php
class controller {

    public function loadView($viewName, $viewData = array()) {
        //Vai transformar a chave da array em uma variavel
        extract($viewData);
        require "views/$viewName.php";
    }

    public function loadTemplates($viewName, $viewData = array()) {
        require "views/template.php";
    }

    public function loadViewTemplate($viewName, $viewData = array()) {
        extract($viewData);
        require "views/$viewName.php";
    }
}